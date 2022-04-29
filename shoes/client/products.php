<?php include "filter.php"; ?>
<div class="row row-pb-md" id="products">
    <script>
        let cat = window.location.search.slice(-1)
        
        if(cat=='W'){
            document.getElementById('G').checked=false
            g=''
            document.getElementById('M').checked=false
            m=''
            document.getElementById('B').checked=false
            b=''
            fetch("../server/category.php?category=W")
            .then((response) => response.json())
            .then((data) => render(data));
        }
        else if(cat=='M'){
            document.getElementById('G').checked=false
            g=''
            document.getElementById('B').checked=false
            b=''
            document.getElementById('W').checked=false
            w=''
            fetch("../server/category.php?category=M")
            .then((response) => response.json())
            .then((data) => render(data));
        }
        else if(cat=='G'){
            document.getElementById('B').checked=false
            b=''
            document.getElementById('M').checked=false
            m=''
            document.getElementById('W').checked=false
            w=''
            fetch("../server/category.php?category=G")
            .then((response) => response.json())
            .then((data) => render(data));
        }
       else if(cat=='B'){
            document.getElementById('G').checked=false
            g=''
            document.getElementById('M').checked=false
            m=''
            document.getElementById('W').checked=false
            w=''
            fetch("../server/category.php?category=B")
            .then((response) => response.json())
            .then((data) => render(data));
        }
        else if(cat=='C'){
            document.getElementById('M').checked=false
            m=''
            document.getElementById('W').checked=false
            w=''
            fetch("../server/category.php?category=C")
            .then((response) => response.json())
            .then((data) => render(data));
        }else{
            fetch("../server/view.php")
            .then((response) => response.json())
            .then((data) => render(data));
        }

        function render(data) {
            let tbl = "";
            
            for (let obj of data)
                tbl += `
        <div class="col-lg-3 mb-4 col-sm-6 col-md-4 text-center">
                <div class="product-entry border product-size"">
                <a href="index.php?program=hviehge.php&id=${obj.id}&category=${obj.category}">
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