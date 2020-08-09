<?php
session_start();
session_regenerate_id(true);

try {

    require_once ('../common/common.php');

    $post = sanitize($_POST);

    $name = $post['name'];
    $email = $post['email'];
    $zip1 = $post['zip1'];
    $zip2 = $post['zip2'];
    $address = $post['address'];
    $tel = $post['tel'];
    $order = $post['order'];
    $pass = $post['pass'];
    $sex = $post['sex'];
    $year = $post['year'];
    $month = $post['month'];
    $day = $post['day'];


    $cart = $_SESSION['cart'];
    $quantity = $_SESSION['quantity'];
    $max = count($cart);

    $dbh = connect();
    $dbh->query('SET NAMES utf8');

    for($i=0; $i<$max; $i++){
        //価格の取得
        $sql = 'SELECT name, price FROM mst_product WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[0] = $cart[$i];
        $stmt->execute($data);
        
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        $product_name = $rec['name'];
        $price = $rec['price'];
        $kakaku[] = $price;
        $amount = $quantity[$i];
        $subtotal = $price * $amount;
    }

    $sql='LOCK TABLES sales WRITE,product_sales WRITE,member WRITE';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();

    $lastmembercode = 0;

    //データベースへ登録情報をINSERT
    if ($order === 'register') {
        $sql = 'INSERT INTO member (pass, name, email, zip1, zip2, address, tel, sex, year, month, day)VALUES(?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $dbh->prepare($sql);
        $data = array();
        $data[] = md5($pass);
        $data[] = $name;
        $data[] = $email;
        $data[] = $zip1;
        $data[] = $zip2;
        $data[] = $address;
        $data[] = $tel;
        if($sex==='1') {
            $data[] = 1;
        } elseif($sex==='2') {
            $data[] = 2;
        } else {
            $data[] = 3;
        }
        $data[] = $year;
        $data[] = $month;
        $data[] = $day;
        $stmt->execute($data);

        $sql = 'SELECT LAST_INSERT_ID()';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastmembercode = $rec['LAST_INSERT_ID()'];
    }

    //購入者情報をデータベースへ
    $sql = 'INSERT INTO sales (code_member, name, email, zip1, zip2, address, tel)VALUES(?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data = array();
    $data[] = $lastmembercode;
    $data[] = $name;
    $data[] = $email;
    $data[] = $zip1;
    $data[] = $zip2;
    $data[] = $address;
    $data[] = $tel;
    $stmt->execute($data);

    $sql = 'SELECT LAST_INSERT_ID()';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $lastcode = $rec['LAST_INSERT_ID()'];

    //売上Product情報
    for ($i=0; $i<$max; $i++) {
        $sql = 'INSERT INTO product_sales(sales_code,product_code,price,quantity)VALUES(?,?,?,?)';
        $stmt = $dbh->prepare($sql);
        $data = array();
        $data[] = $lastcode;
        $data[] = $cart[$i];
        $data[] = $kakaku[$i];
        $data[] = $quantity[$i];
        $stmt->execute($data);
    }
    $sql='UNLOCK TABLES';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    session_unset();
    $dbh = null;

    //会員登録した場合
    if ($order === 'register') {
        $message = '◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇</br>';
        $message .= '会員登録が完了しました。<br/>';
        $message .= '次回からメールアドレスとパスワードでログインできます。</br>';
        $message .= '◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇◆◇<br/><br/>';
    }
    }

catch (Exception $e) {
    echo 'ただいま障害によりご迷惑をおかけしています。';
    exit();
}

require 't_shop_form_done.php';
?>
