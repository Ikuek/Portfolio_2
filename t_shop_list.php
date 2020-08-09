<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SAVE THE ANIMALS</title>
<link rel="stylesheet" href="style.css">
<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="shop_list.js"></script>
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
                <li><span><i class="fas fa-shopping-cart cart"></i><a href="shop_cartlook.php"> カート</a></span></li>
                <li><span><form id="search" action="shop_search.php" method="get">
                        <input id="box" type="text" name="search" placeholder="動物の検索..">
                        <button id="button" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </span>
                </li>
            </ul>
        </div>
    <!-- END メインナビ -->
    </div>
</div>
<!-- END ヘッダー -->

<!-- メインイメージ -->
<div id="mainBanner" class="mainImg">
    <div class="inner">
        <img src="images/mainImg.jpg" alt="" width="940" height="300">
        <div class="slogan">
            <h2>保護した動物たちの募金を随時募っています</h2>
        </div>
    </div>
</div>
<!-- END メインイメージ -->

<div id="wrapper">
<!-- テーブル -->
    <div class="content">
    <h2><i class="fas fa-paw paw"></i> 保護動物一覧</h2>
    <table>
    <tr>
        <th><span class="under"><b>動物</b></span></th>
        <th><span class="under"><b>募金金額 / 1口</b></span></th>
        <th><span class="under"><b>写真</b></span></th>
    </tr>
    <?php foreach ($stmt as $key): ?>
           <div><?php echo '<tr class="row_'.$key['code'].'">' ?>
                <td style="font-size : 20px;"><?php echo $key['name']; ?></td>
                <td><?php echo number_format($key['price']) ?> 円</td>
                <td><?php echo '<img class="pics" src="../product/pic/'.$key['pic'].'">' ?></td>
            </tr></div>
    <?php endforeach; ?>
    </table>
    </div>
</div>

</body>
</html>