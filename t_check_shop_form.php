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
        <h2>ご登録情報のご確認</h2>
        <ul>
            <li>名前</li>
            <li><?php echo $name ?></li>
        </ul><br>
        <ul>
            <li>メールアドレス</li>
            <li><?php echo $email ?></li>
        </ul><br>
        <ul>
            <li>郵便番号</li>
            <li><?php echo $zip1. ' - ' .$zip2 ?></li>
        </ul><br>
        <ul>
            <li>住所</li>
            <li><?php echo $address ?></li>
        </ul><br>
        <ul>
            <li>電話番号</li>
            <li><?php echo $tel ?></li>
        </ul><br>
        <ul>
            <li>性別</li>
            <?php if ($sex === '1') : ?>
            <li>男性</li>
            <?php elseif ($sex === '2') : ?>
            <li>女性</li>
            <?php else : ?>
            <li>その他</li>
            <?php endif ; ?>
        </ul><br>
        <ul>
            <li>生年月日</li>
            <li><?php echo $year. ' 年 '. $month. ' 月 '. $day. ' 日 ' ?></li>
        </ul>

        <form method="post" action="shop_form_done.php">
        <input type="hidden" name="name" value="<?php echo $name ?>">
        <input type="hidden" name="email" value="<?php echo $email ?>">
        <input type="hidden" name="zip1" value="<?php echo $zip1 ?>">
        <input type="hidden" name="zip2" value="<?php echo $zip2 ?>">
        <input type="hidden" name="address" value="<?php echo $address ?>">
        <input type="hidden" name="tel" value="<?php echo $tel ?>">
        <input type="hidden" name="order" value="<?php echo $order ?>">
        <input type="hidden" name="pass" value="<?php echo $pass ?>">
        <input type="hidden" name="sex" value="<?php echo $sex ?>">
        <input type="hidden" name="year" value="<?php echo $year ?>">
        <input type="hidden" name="month" value="<?php echo $month ?>">
        <input type="hidden" name="day" value="<?php echo $day ?>">

        <br><input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="確定">
        </form>

    <br><br>
    </div>
</div>
</body>