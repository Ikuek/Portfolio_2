<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SAVE THE ANIMALS</title>
<link rel="stylesheet" href="style.css">
<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
</head>
<body>

<!-- ヘッダー -->
<div id="header">
    <div class="inner">
        <div class="logo">
            <a href="shop_list.php">SAVE THE ANIMALS!<br></a>
        <h1>保護動物募金サイトへようこそ</h1>
        </div>

    <!-- メインナビ -->
    <nav id="mainNav">
        <a class="menu" id="menu"><span>MENU</span></a>
        <div class="panel">
            <ul>
                <li><span><i class="fas fa-shopping-cart cart"></i><a href="shop_cartlook.php"> カート</a></span></li>
                <li><span><i class="fas fa-user login"></i> <?php checkmember(); ?></span></li>
            </ul>
        </div>
    <!-- END メインナビ -->
    </div>
</div>
<!-- END ヘッダー -->
<div id="mainBanner">
    <div class="inner">
    </div>
</div>
<div id="wrapper">
    <div class="content">
        <h2>ご登録情報</h2>

        <!-- テーブル -->
        <table style="table-layout:fixed;">
            <tr>
                <th><span class="under">お名前</th>
                <th><span class="under">郵便番号</th>
                <th><span class="under">住所</th>
                <th><span class="under">電話番号</th>
                <th><span class="under">メールアドレス</th>
            </tr>
            <tr>
                <td><?php echo $name ?></td>
                <td><?php echo $zip1 ?> - <?php echo $zip2 ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $tel ?></td>
                <td><?php echo $email ?></td>
            </tr>
        </table>
        <br>
        <form method="post" action="shop_quick_done.php">
            <input type="hidden" name="name" value="<?php echo $name ?>">
            <input type="hidden" name="email" value="<?php echo $email ?>">
            <input type="hidden" name="zip1" value="<?php echo $zip1 ?>">
            <input type="hidden" name="zip2" value="<?php echo $zip2 ?>">
            <input type="hidden" name="address" value="<?php echo $address?>">
            <input type="hidden" name="tel" value="<?php echo $tel ?>">
            <input type="submit" value="確定" class="btn" style="width:100px;height:30px;font-size:15px">
        </form>
        <br><br>
        <a href="shop_list.php" class="btn">トップページ</a><br><br>
    </div>
</div>

</body>