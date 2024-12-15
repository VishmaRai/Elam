<!doctype html>
<html lang="en">
  <head>
    <meta charset="utaliceblue;-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/images/faviconn.ico">
    <style>
      nav-link:hover{
    text-decoration: underline;
    
}
.nav-cart:hover{
    font-size: xx-large;
   
}
a{
    text-decoration: none;
}
.overly{
    position: fixed;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.3);
    z-index:1;
    display: none;
    opacity: 1;

}
form{
    width: 95%;
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    margin-top: 15px;
}
.btn-primary{
    width: 100%;
    border: none;
    background-color: #747372;
}
.form-control{
    border: none;
    color: black;
    border-bottom-color:black;
    border-bottom: 1px solid;
    border-radius: 0px;
}
@media only screen and (max-width: 600px){
    form{
        width:100% !important;
    }
    .popup{
        width: 100% !important;
    }
    .container{
        width: 100% !important;
    }
    .popup1{
        width: 100% !important;
    }
}
.popup1{
    z-index: 1;
    position: absolute !important;
    width:35%;
    background:#fff;
    position:absolute;
    top:40%;
    left:50%;
    transform: translate(-50%, -50%) !important;
    border-radius: 10px;
    box-shadow: 5px 5px 15px 5px grey;
}
    </style>
  </head>
  <!-- here 'overflow' helps to freez website when you click login button through the help of JS -->
  <body style="background-color: #EEEDEB;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="popup1" id="popup1">
  <form class="mx-auto" onsubmit="return validatePasswords()" method="post" action="register_submit.php">
  <h1 class="text-center" style="font-size: 30px;">Create Account</h1>
  <div class="form-group row">
    <input type="text" class="form-control mt-2 col" id="name" name="name"  placeholder="FullName" required>
    <input type="text" maxlength="10" onkeypress="return event.charCode >=48 && event.charCode<=57" class="form-control mt-2 ms-3 col" id="mobile" name="mobile" placeholder="PhoneNumber">
  </div>
  <div class="from-group row">
      <input type="email" class="form-control mt-2" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" required>
  </div>
  <div class="form-group row">
      <input type="password" class="form-control mt-2" name="password" id="password" placeholder="Create Password" maxlength="8" required>
  </div>
  <div class="form-group row">
      <input type="password" class="form-control mt-2" id="confirmPassword" placeholder="Re-type Password" required>
  </div>
  <div id="passwordError" style='color: red;'></div>
    <button type="submit" class="btn btn-primary mt-4">Create account</button>
    <br><br>
    <footer style="text-align: center;">
      <a href="index.php" style="padding-right: 10px; color: black;">Already have an account?</a>
      </footer>
    </form>
</div>
  
    </div>
<script>
  function validatePasswords() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            if (password !== confirmPassword) {
                document.getElementById("passwordError").textContent = "Passwords do not match.";
                return false;
            } else {
                document.getElementById("passwordError").textContent = "";
                return true;
            }
        }
</script>
  </body>
  </html>
