<style>
    li {
    list-style-type: none;
}

#filter {
    border: 1px solid black;
    margin-bottom: 10px;
    padding: 15px;
}
#max #min{
    max-height: 10px;
}
</style>
<h3>Szűrő</h3>
<div id="filter" class="container">
    <div class="row">
        <div class="col">
            <ul>
                <li class="m-2"><input type="checkbox" class="mr-1" checked id="M" onchange="filter(this)">Férfi</li>
                <li class="m-2"><input type="checkbox" class="mr-1" checked id="W" onchange="filter(this)">Női</li>
                <li class="m-2"><input type="checkbox" class="mr-1" checked id="B" onchange="filter(this)">Fiú</li>
                <li class="m-2"><input type="checkbox" class="mr-1" checked id="G" onchange="filter(this)">Lány</li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li>Max. ár: <br> <input type="number" id="max" value="40000" min="0" max="40000" step="1000" oninput="ar()">Ft</li>
                <br>
                <li>Min. ár: <br> <input type="number" id="min" value="0" min="0" max="40000" step="1000" oninput="ar()">Ft</li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li>Név: <input type="textarea" id="nev" oninput="filter(this)"></li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li class="m-2"><input type="checkbox" checked id="adidas" class="mr-1" onchange="filter(this)">adidas</li>
                <li class="m-2"><input type="checkbox" checked id="nike" class="mr-1" onchange="filter(this)">Nike</li>
                <li class="m-2"><input type="checkbox" checked id="puma" class="mr-1" onchange="filter(this)">PUMA</li>
                <li class="m-2"><input type="checkbox" checked id="fila" class="mr-1" onchange="filter(this)">FILA</li>
            </ul>
        </div>
    </div>


</div>

<script>
let ma=100
let mi=0
let nike='Nike'
let adidas='adidas'
let puma='PUMA'
let fila='FILA'
let m='M'
let w='W'
let g='G'
let b='B'

    function filter(obj) {
        let maxAr=document.getElementById('max').value
        let minAr=document.getElementById('min').value
        let nev=document.getElementById('nev').value
        ma=maxAr
        mi=minAr

            if (obj.checked && obj.id=='M') {
                m='M'
            }else if(!obj.checked && obj.id=='M'){
                m=''
            }
            if (obj.checked && obj.id=='W') {
                w='W'
            }else if(!obj.checked && obj.id=='W'){
                w=''
            }
            if (obj.checked && obj.id=='G') {
                g='G'
            } else if(!obj.checked && obj.id=='G'){
                g=''
            }
            if (obj.checked && obj.id=='B') {
                b='B'
            }else if(!obj.checked && obj.id=='B'){
                b=''
            }

            if (obj.checked && obj.id=='nike') {
                nike='Nike'
            }else if(!obj.checked && obj.id=='nike'){
                nike=''
            }
            if (obj.checked && obj.id=='adidas') {
                adidas='adidas'
            }else if(!obj.checked && obj.id=='adidas'){
                adidas=''
            }
            if (obj.checked && obj.id=='puma') {
                puma='PUMA'
            } else if(!obj.checked && obj.id=='puma'){
                puma=''
            }
            if (obj.checked && obj.id=='fila') {
                fila='FILA'
            }else if(!obj.checked && obj.id=='fila'){
                fila=''
            }   
              fetch(`../server/filterShoes.php?w=${w}&g=${g}&b=${b}&m=${m}&max=${ma}&min=${mi}&title=${nev}&nike=${nike}&adidas=${adidas}&fila=${fila}&puma=${puma}`)
                .then((response) => response.json())
                .then((data) => render(data)); 
        }

        function ar(){
            let maxAr=document.getElementById('max').value
            let minAr=document.getElementById('min').value
            let nev=document.getElementById('nev').value
            fetch(`../server/filterShoes.php?w=${w}&g=${g}&b=${b}&m=${m}&max=${maxAr}&min=${minAr}&title=${nev}&nike=${nike}&adidas=${adidas}&fila=${fila}&puma=${puma}`)
                .then((response) => response.json())
                .then((data) => render(data));  
        }
</script>