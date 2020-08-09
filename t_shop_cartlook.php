<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SAVE THE ANIMAL</title>
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
<h2>カート</h2>

<p style="line-height : 200%;">
	<?php if (isset($message)): ?>
		<?php echo $message ?>
		<a href="shop_list.php" class="btn">一覧へ戻る</a>
</p>
	<?php else: ?>

<!-- テーブル -->
<table style="table-layout:fixed;">
    <tr>
        <th><span class="under">動物</th>
        <th><span class="under">画像</th>
        <th><span class="under">金額</th>
        <th><span class="under">口数</th>
        <th><span class="under">小計</th>
        <th><span class="under">削除</th>
    </tr>
    <form method="post" action="change_qty.php">
    <?php for ($i=0; $i<$max; $i++) : ?>
    <tr>
        <td><?php echo $pro_name[$i]; ?></td>
        <td><img class="pics" <?php echo $pro_pic[$i]; ?></td>
        <td><?php echo number_format($pro_price[$i]); ?> 円</td>
        <td><input type="text" name="quantity<?php echo $i; ?>" value="<?php echo $quantity[$i]; ?>" style="width:30px;"><input type="submit" value="更新"><br/></td>
        <td><?php echo number_format($pro_price[$i]*$quantity[$i]); ?>円</td>
        <td><input type="submit" name="delete<?php echo $i; ?>" value="削除"></td>
    </tr>
    <?php endfor; ?>
    <tr bgcolor="#faf6f6">
    <td style="text-align:right;" colspan="5">合計</td>
        <td><font color="red"><?php echo number_format($total) ;?> 円</font></td>
    </tr>
</table>
<input type="hidden" name="max" value="<?php echo $max; ?>">

</form>
<br>

<p>
	<a href="shop_list.php" class="btn">一覧へ戻る</a>
	<span class="right">
		<?php if (isset($_SESSION["member_login"])=== true) : ?>
			<a href="shop_quick_check.php" class="btn">お支払手続きへ進む</a> <!-- ←会員の場合　-->
		<?php else : ?>
	    	<a style="text-align:right" href="shop_form.html" class="btn">お支払手続きへ進む</a> <!-- ←新規の場合　-->
		<?php endif; ?>
	</span>
</p>
	<br>
	<?php endif; ?>
    </div>
</div>

</body>
</html>