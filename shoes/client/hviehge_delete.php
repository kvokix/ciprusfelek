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
  }
</style>
<div id="shoeID" class="d-none">
  <?= $_GET["id"] ?>
</div>
<div id="sor">

</div>
<script>
  let id = document.querySelector('#shoeID').textContent
  fetch(`../server/detailed.php?id=${id}`)
    .then(response => response.json())
    .then(data => {
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
    <h2><div id="category">${data[0].category}</div></h2>
    <h2><div  id="brand">${data[0].brand}</div></h2>

    <button class="d-inline" id="${id}" onclick="deleteId(this)">Törlés</button>
   
</div>

</div>
  </div>
`
    })
let msize;
  
  function deleteId(obj){
    const formData = new FormData();
    let id = obj.id;
            fetch(`../server/delete.php?id=${id}`)
        .then(response=>response.text())
            .then(data=>console.log(data))
           window.location.reload()
            }

function meret(obj){
  msize=obj.value;
  document.getElementById('meret').innerHTML=`Méret: ${msize}`
}


</script>