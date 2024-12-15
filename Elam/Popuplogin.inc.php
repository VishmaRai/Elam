
 <!-- popup Form -->
 <div class="popup" id="popup">
    <form class="mx-auto" method="post" action="login_submit.php">
    <h1 class="text-center" style="font-size: 30px;">Welcome to Elam</h1>
    <div class="form-group">
      <input type="email" class="form-control mt-2" id="login_email" name="login_email" placeholder="Email" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control mt-2" id="login_password" name="login_password" placeholder="Password" required>
    </div>
      <button type="submit" class="btn btn-primary mt-4">Sign in</button>
      <br><br>
      <footer style="text-align: center;">
        <a href="#" style="color: black;" onclick="OpenRegister()">Create account</a>
      </footer>
  </form>
</div>

<!-- Javascript for popup -->
<script>
function OpenPopup() {
// After you click the login, login form will popup, overly(background behind form) appier and scrool will hide.
  document.getElementById("popup").style.display = "block";
  document.getElementById("overly").style.display = "block";
  document.getElementsByTagName("body")[0].style.overflow = "hidden";
}
function ClosePopup() {
  //After you click the overly, it will return its normal form
  document.getElementById("popup").style.display = "none";
  document.getElementById("popup1").style.display = "none";
  document.getElementById("overly").style.display = "none";
  document.getElementsByTagName("body")[0].style.overflow = "visible";
  }

  // To open the registration
  function OpenRegister() {
    document.getElementById("popup").style.display = "none";
    document.getElementById("popup1").style.display = "block";
  document.getElementById("overly").style.display = "block";
  document.getElementsByTagName("body")[0].style.overflow = "hidden";
  }

  function goBack() {
// After you click the 'Already have an account? Sign in', your create account will close and login form will open.
  document.getElementById("popup").style.display = "block";
  document.getElementById("popup1").style.display = "none";
}

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
  
<!-- Register form -->
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
      <input type="password" class="form-control mt-2" name="password" id="password" placeholder="Create Password" required>
  </div>
  <div class="form-group row">
      <input type="password" class="form-control mt-2" id="confirmPassword" placeholder="Re-type Password" required>
  </div>
  <div id="passwordError" style='color: red;'></div>
    <button type="submit" class="btn btn-primary mt-4">Create account</button>
    <br><br>
    <footer style="text-align: center;">
      <a href="#" style="padding-right: 10px; color: black;" onclick="goBack()">Already have an account? Sign in</a>
      </footer>
    </form>
</div>
  
    </div>