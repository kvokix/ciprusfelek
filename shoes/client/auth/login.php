
<section class="vh-100">
<link rel="stylesheet" href="auth/login.css">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-4 text-center">
            
<form action="">
  
            <h3 class="mb-3">Belépés</h3>
<div class="msg"></div>
            <div class="form-outline mb-4">
              <input type="text" id="username" class="form-control form-control-lg" name="username"/>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
              <label class="form-label" for="username">Felhasználónév</label>
            </div>

            <div class="form-outline mb-4">
              <input type="email" id="email" class="form-control form-control-lg" name="email"/>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
    </svg>
              <label class="form-label" for="email">Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="password" class="form-control form-control-lg" name="password"/>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>
              <label class="form-label" for="password">Jelszó</label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="button" value="Register" onclick="loginJS()">Belépés</button>
</form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
     function loginJS(){
        const formData=new FormData(document.querySelector('form'))
        formData.set('type','login')
        let password =document.getElementById('password').value
      let username =document.getElementById('username').value
      let email =document.getElementById('email').value
      formData.set('username',username);
        formData.set('email',email);
        formData.set('password',password);
        for(let obj of formData)
        console.log(obj)
        fetch('../server/auth.php',{method:"POST",body:formData})
            .then(res=>res.text())
            .then(data=>{
              console.log(data)
              if(data){
                 location.href="index.php"
              }else{
                  document.querySelector('.msg').innerHTML='<div class="alert alert-danger">Sikertelen bejelentkezés!</div>'
              }
              })
    }
</script>