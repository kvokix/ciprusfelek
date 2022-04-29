<?php include "filter.php"; ?>
<div class="row row-pb-md" id="products">
<script>
fetch("../server/view.php")
    .then((response) => response.json())
    .then((data) => render(data));

function render(data) {
    let tbl = "";
    for (let obj of data)
        tbl += `<div class="col-lg-3 mb-4 col-sm-6 col-md-4 text-center">
                <div class="product-entry border product-size">
                <a href="index.php?program=hviehge_delete.php&id=${obj.id}&category=${obj.category}">
                <img src="img/${obj.title}_1.jpg">
                <div class="desc">
                <h2>${obj.title}</h2>
                <span class="price">${obj.price} Ft</span>
                </a>
                </div>
                </div>
                </div>  
                `;

    document.getElementById("products").innerHTML = tbl;
}
    
</script>
</div>