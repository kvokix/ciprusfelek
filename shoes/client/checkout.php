<div class="container">
    <div class="row">
        <div class="col">
            <form action="">
               <textarea name="cim" id="cim" placeholder="Cím" cols="50" rows="2" required></textarea>
               <br>
               <input type="tel" class="mb-2" id="phone" name="phone" placeholder="Telefonszám" required>
               <br>
               <textarea name="megj" id="megj" maxlength="200" placeholder="Megjegyzés... Max. 200 betű." cols="50" rows="3" required></textarea>
            </form>
        </div>
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <th>Termék neve</th>
                    <th>Darabszám</th>
                    <th>Összeg</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        
    </div>
    <div class="row">
            <div class="col"></div>
            <div class="col">
            <div class="report"></div>
            <hr color="black">
            <button class="btn btn-success float-right" onclick="megrendel(this)">Megrendel</button>
            <script>
    fetch(`../server/checkout.php`)
            .then(response => response.json())
            .then(data => {
               // document.querySelector('tbody').innerHTML=data
               render(data)
             })

             function megrendel(obj){
                const formData=new FormData(document.querySelector('form'))
                let cim = document.getElementById('cim').value
                let telefonszam = document.getElementById('phone').value
                let megjegyzes = document.getElementById('megj').value
                if(cim.length==0 || telefonszam.length==0){
                    document.querySelector('.report').innerHTML='
                    <div class="alert alert-danger align-middle">Először töltse ki a cím és a telefonszám menüt!</div>'
                }else{
                    document.querySelector('.report').innerHTML=`<div class="alert alert-success">A rendelés sikeres volt!</div>`
                formData.set('cim',cim)
                formData.set('telefonszam',telefonszam)
                formData.set('megjegyzes',megjegyzes)
                obj.disabled=true
                fetch(`../server/rendel.php`,{method:"POST",body:formData})
            .then(response => response.text())
            .then(data => {})
             setTimeout(() => { window.location.href='index.php?program=home.php'; }, 4000);
                }
             }
</script>
            <div>Végösszeg: <p class="text-success" id="vegosszeg"></p></div>
            </div>
        </div>
</div>
<script>
function render(data) {
            let tbl = "";
            let total=0;
            for (let obj of data){
                total+=parseInt(obj.quantity)*parseInt(obj.price);
                tbl += `
        <tr><td>${obj.name}</td><td>${obj.quantity}</td><td>${parseInt(obj.quantity)*parseInt(obj.price)}</td></tr>
                `;
            }
            document.querySelector("tbody").innerHTML = tbl;
            document.getElementById("vegosszeg").innerHTML = total+"Ft";
        }
        
</script>
