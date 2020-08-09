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
        <p>
            <?php echo $name ?> 様<br><br>
            募金いただきありがとうございました。<br> 募金は、動物たちのために使われます。<br><br>
        </p>
        <p>
            <?php if (isset($message)): ?>
            <?php echo $message ?>
            <?php endif ; ?>
        </p>
    </div>
        <a href="shop_list.php" class="btn">トップページへ戻る</a>
    <br><br>
</div>
</body>
</html>