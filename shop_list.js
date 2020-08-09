$(document).ready(function() {
    $('tr[class^="row_"]').click(function(e){
        const code = e.currentTarget.className.replace('row_','');
        location = 'shop_product.php?procode=' + code;
        });
  });