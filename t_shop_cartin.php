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

<?php echo $message ; ?>
<br>
<br>
<span class="space">
<a href="shop_list.php" class="btn">一覧へ戻る</a>
</span>
<i class="fas fa-shopping-cart cart"></i><u><a href="shop_cartlook.php"> カートを見る</a></u>
<br><br>
</div>
</div>
</body>
</html>