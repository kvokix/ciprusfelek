    <div class="container">
        <input type="text" id="title" class="form-control" placeholder="Név"><br>
        <input type="text" id="category" class="form-control" placeholder="Kategória"><br>
        <input type="number" step="1000" id="price" class="form-control" placeholder="Ár"><br>
        <input type="text" id="brand" class="form-control" placeholder="Márka"><br>
        <input class="btn btn-primary" onclick="insert()" type="button" value="mentés"> 
    </div>
    

<script>
    function insert(){
        let title=document.getElementById('title').value
        let category=document.getElementById('category').value
        let price=document.getElementById('price').value
        let brand=document.getElementById('brand').value
        fetch(`../server/insert.php?title=${title}&category=${category}&price=${price}&brand=${brand}`)
        .then(response=>response.text())
            .then((data) => console.log(data ? "sikeres" : "hiba"))
            window.location.reload()
    }
</script>