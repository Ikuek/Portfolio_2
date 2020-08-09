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

<div id="wrapper">
<div class="content">
<table style="table-layout:fixed;">
    <tr>
        <th><span class="under"><b>管理コード</b></span></th>
        <th><span class="under"><b>動物名</b></span></th>
        <th><span class="under"><b>募金金額</b></span></th>
        <th><span class="under"><b>写真</b></span></th>
        <th><span class="under"><b>コメント</b></span></th>
    </tr>
    <tr>
        <td><?php echo $pro_code;?></td>
        <td><?php echo $pro_name; ?></td>
        <td>1口 <?php echo number_format($pro_price); ?> 円</td>
        <td><?php echo '<img class="pics" src="../product/pic/'.$pro_pic_name.'">' ?></td>
        <td><?php echo $pro_comment;?></td>
    </tr>
</table>
<br>
<span>
    <a href="shop_list.php" class="btn">一覧へ戻る</a>
</span>
<span class="right">
    <i class="fas fa-cart-arrow-down fa-lg cartin"></i>
    <?php echo '<a href="shop_cartin.php?procode='.$pro_code.'">';?> 寄付する</a>
</span>
</div>          
<br/><br/><br/>
</div>
</body>
</html>