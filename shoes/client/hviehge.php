<style>
  .icons {
    width: 100%;
    display: table;
  }

  .padding10 {
    padding: 10px;
  }

  .paddingtop03rem {
    padding-top: 0.3rem;
  }

  .icon-img {
    vertical-align: middle;
    display: table-cell;
    margin-right: 3px;
  }

  .icon-img img {
    max-width: 100%;
    max-height: 105px;
    padding: 2px;
  }

  .bal {
    vertical-align: middle;
    display: table-cell;
    margin-right: 3px;
  }

  .bal img {
    max-width: 100%;
    max-height: 105px;
    padding: 2px;
  }

  .nagy-img {
    padding: 0px 5px 0px 0px;
    display: block;
    max-width: 100%;
    max-height: 100%;
    margin-left: auto;
    margin-right: auto;
    width: auto;
    height: auto;
  }
  .report {
  padding: 70px 0;
  text-align: center;
}





</style>
<div id="shoeID" class="d-none">
  <?= $_GET["id"] ?>
</div>
<div id="sor">

</div>
<script>
  let id = document.querySelector('#shoeID').textContent
  let cat = window.location.search.slice(-1)
    fetch(`../server/detailed.php?id=${id}`)
    .then(response => response.json())
    .then(data => {
      if(data[0].category=='C' || data[0].category=='B' || data[0].category=='G'){
      document.getElementById('sor').innerHTML = `
        <div class="container padding10 border">
  <div class="row row-cols-2">
    <div class="col sm-col-6">
    <div class="slider-container">
  <div class="slider">
    <div class="slides">
      <div id="slides__1" class="slide">
        <a class="slide__prev" href="#slides__3" title="Next"></a>
        <img class="img-sizer" id="image" src="img/${data[0].title}_1.jpg">
        <a class="slide__next" href="#slides__2" title="Next"></a>
      </div>
      <div id="slides__2" class="slide">
        <a class="slide__prev" href="#slides__1" title="Prev"></a>
        <img class="img-sizer" src="img/${data[0].title}_2.jpg">
        <a class="slide__next" href="#slides__3" title="Next"></a>
      </div>
      <div id="slides__3" class="slide">
        <a class="slide__prev" href="#slides__2" title="Prev"></a>
        <img class="img-sizer" src="img/${data[0].title}_3.jpg">
        <a class="slide__next" href="#slides__1" title="Next"></a>
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="col paddingtop05rem">
    <h1><div id="title">${data[0].title}</div></h1>
    <h2><div id="price" class="text-success">${data[0].price} Ft</div></h2>
    <div class="dropdown">
  <button id="meret" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Méret:
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" ><div>
    <option class="text-center" onClick="meret(this)" value="27">27</option>
    <option class="text-center" onClick="meret(this)" value="28">28</option>
    <option class="text-center" onClick="meret(this)" value="29">29</option>
    <option class="text-center" onClick="meret(this)" value="30">30</option>
    <option class="text-center" onClick="meret(this)" value="31">31</option>
    <option class="text-center" onClick="meret(this)" value="32">32</option>
    <option class="text-center" onClick="meret(this)" value="33">33</option>
    <option class="text-center" onClick="meret(this)" value="34">34</option>
    <option class="text-center" onClick="meret(this)" value="35">35</option>
    </div>
    </div>
    <?php
  if(isset($_SESSION['role'])): 
    ?>
    <button class="d-inline btn btn-success" id="${id}" onclick="addToCart(this)">Kosárba rak</button>
    <?php
    else:
  ?>
  <p>Jelentkezz be a vásárláshoz</p>
<?php
  endif
?>
    </div>
</div>
</div>
<div class="row row-cols-2">
    <div class="col">
    <div class="report" class="text-center align-middle">
    
    </div>
    </div>
  </div>
  </div>
`
}else{
      document.getElementById('sor').innerHTML = `
        <div class="container padding10 border">
  <div class="row row-cols-2">
    <div class="col sm-col-6">
    <div class="slider-container">
  <div class="slider">
    <div class="slides">
      <div id="slides__1" class="slide">
        <a class="slide__prev" href="#slides__3" title="Next"></a>
        <img class="img-sizer" id="image" src="img/${data[0].title}_1.jpg">
        <a class="slide__next" href="#slides__2" title="Next"></a>
      </div>
      <div id="slides__2" class="slide">
        <a class="slide__prev" href="#slides__1" title="Prev"></a>
        <img class="img-sizer" src="img/${data[0].title}_2.jpg">
        <a class="slide__next" href="#slides__3" title="Next"></a>
      </div>
      <div id="slides__3" class="slide">
        <a class="slide__prev" href="#slides__2" title="Prev"></a>
        <img class="img-sizer" src="img/${data[0].title}_3.jpg">
        <a class="slide__next" href="#slides__1" title="Next"></a>
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="col paddingtop05rem">
    <h1><div id="title">${data[0].title}</div></h1>
    <h2><div id="price" class="text-success">${data[0].price} Ft</div></h2>
    <div class="dropdown">
  <button id="meret" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Méret:
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" ><div>
    <option class="text-center" onClick="meret(this)" value="36">36</option>
    <option class="text-center" onClick="meret(this)" value="37">37</option>
    <option class="text-center" onClick="meret(this)" value="38">38</option>
    <option class="text-center" onClick="meret(this)" value="39">39</option>
    <option class="text-center" onClick="meret(this)" value="40">40</option>
    <option class="text-center" onClick="meret(this)" value="41">41</option>
    <option class="text-center" onClick="meret(this)" value="42">42</option>
    <option class="text-center" onClick="meret(this)" value="43">43</option>
    <option class="text-center" onClick="meret(this)" value="44">44</option>
    </div>
    </div>
    <?php
  if(isset($_SESSION['role'])): 
    ?>
    <button class="d-inline btn btn-success" id="${id}" onclick="addToCart(this)">Kosárba rak</button>
    <?php
    else:
  ?>
  <p>Jelentkezz be a vásárláshoz</p>
<?php
  endif
?>
    </div>
</div>

</div>
<div class="row row-cols-2">
    <div class="col">
    <div class="report" class="text-center align-middle">
    
    </div>
    </div>
  </div>
  </div>
`
        }
      })

  
  
let msize;
  function addToCart(obj) {
    const formData = new FormData();
    let id = obj.id;
    let title = document.getElementById('title').textContent;
    let price = document.getElementById('price').textContent;
    let image = document.getElementById('image').src;
    let size = msize;
    let product = {
      title: title,
      id: id,
      price: price,
      image: image,
      size : size
    };

    if(size==undefined){
      document.querySelector('.report').innerHTML='<div class="alert alert-danger align-middle">Válasszon méretet!</div>'
    }else{
      for (let i in product)
      formData.append(i, product[i]);

    fetch(`../server/addToCart.php`, {
        method: "POST",
        body: formData
      })
      .then(res => res.text())
      .then(data => {
        document.querySelector('#qty').innerHTML = data
      });
      document.querySelector('.report').innerHTML=`<div class="alert alert-success">${size} méretű ${title} a kosárba került!</div>`
    }
  }

function meret(obj){
  msize=obj.value;
  document.getElementById('meret').innerHTML=`Méret: ${msize}`
}

</script>