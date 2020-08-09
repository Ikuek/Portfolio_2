<!DOCTYPE html>
<html>
<head>
<title>検索結果</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
</head>
<body>
<!-- ヘッダー -->
<div id="header">
    <div class="inner">
        <div class="logo">
            <a href="shop_list.php">SAVE THE ANIMALS!<br></a>
            <h2>検索結果</h2>
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

  </p><?php echo'該当は、'.$result.' 件です。'; ?></p>
  <br>

  <?php if ($result !== 0) : ?>
  <table style="table-layout:fixed;">
    <tr>
      <th>動物</th>
      <th>募金金額/１口</th>
      <th>写真</th>
    </tr>
    <?php foreach ($stmt as $key): ?>
    <tr>
      <td><?php echo '<a href="shop_product.php?procode='.$key['code'].'">';
                echo $key['name'].'</a>'; ?></td>
      <td><?php echo number_format($key['price']) ?> 円</td>
      <td><?php echo '<img class="pics" src="../product/pic/'.$key['pic'].'">' ?></td>
    </tr>
    <?php endforeach; ?>
  <?php endif; ?>

</table>
<br/>
<a href="shop_list.php" class="btn">一覧へ戻る</a>
<br><br>
</body>
</html>