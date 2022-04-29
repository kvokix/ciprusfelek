<?php
 $tbl = '';
if (!empty($_SESSION['cart'])) {
    $total = 0;
    foreach ($_SESSION['cart'] as $keys => $values) {
        extract($values);
        $tot = intval($quantity) * intval($price);
        $tbl .= "<tr>
            <td>{$name}</td>
            <td>{$price}</td>
            <td><img class='cart-img' src='img/{$name}_1.jpg'></td>
            <td>{$size}</td>
            <td><input id='{$id}' class='form-control' type='number' value='{$quantity}' min='0' onchange='updateQty(this)'/></td>
            <td>{$tot} Ft</td>
            <td><a href='../server/deleteProduct.php?id={$id}&size={$size}&quantity={$quantity}'><span class='btn btn-danger'>Töröl</span></a></td>
          </tr>";
    }
}
?>
<?php
     if (empty($_SESSION['cart'])) :
         ?>
         <h1>A kosár tartalma üres</h1>
         <?php
              else :
                 ?>
                 <h1>A kosár tartalma</h1>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Név</th>
            <th>Ár</th>
            <th>Kép</th>
            <th>Méret</th>
            <th>Mennyiség</th>
            <th>Összeg</th>
            <th>Törlés</th>
        </tr>
    </thead>
    <tbody class="cart-img"><?= $tbl ?></tbody>
</table>
<a href="index.php?program=checkout.php" class="btn btn-success">Véglegesítés</a>
<?php
           endif;
                        ?>
<script>
    function updateQty(obj) {
        let id = obj.id
        let quantity=obj.value
        let size=obj.parentElement.previousElementSibling.textContent
        fetch(`../server/updateQty.php?id=${id}&quantity=${quantity}&size=${size}`)
            .then(response => response.text())
            .then(data => {
                    console.log(data,"DATA")
                    if(data==0){
                        location.href='index.php?program=products.php'
                    }else
                location.href='index.php?program=cart.php'
                })
            }
</script>