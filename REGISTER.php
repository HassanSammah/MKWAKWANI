
<?php

@include 'config1.php';

if(isset($_POST['submit'])){

   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
   $surname = mysqli_real_escape_string($conn, $_POST['surname']);
   $dob = mysqli_real_escape_string($conn, $_POST['dob']);
   $pass = $_POST['password'];
   $cpass = $_POST['password2'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
   $twiter= mysqli_real_escape_string($conn, $_POST['twiter']);
   $instagram= mysqli_real_escape_string($conn, $_POST['instagram']);
  
   $select = " SELECT * FROM user_form WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(firstname, middlename,surname, dob,pass,email,phone,facebook,twiter,instagram) VALUES('$firstname', '$middlename','$surname',' $dob','$pass','$email','$phone','$facebook','$twiter','$instagram')";
         mysqli_query($conn, $insert);
         header('location:index.php');
      }
   }

};


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register At Mkwakwani</title>
    <link rel="stylesheet" href="REG.css" type="text/css">
 <script src="webi.js"></script>
 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <style>
    .input
    {
        position: relative;
    }
    .input input[type=checkbox]
    {
        position: absolute;
            top: 45px;
            right: 20px;
    }
    .error-msg{
        text-align:center;
        font-size:20px;
        color:crimson;
    }
    #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: &#10004;;
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: &#10006; ;
}
 </style>
</head>
<body>
    <div class="header">
    <div class="heading-1">
        <h1>MKWAKWANI SECONDARY SCHOOL</h1>
        </div><br>
        <p><i>Please Register to access some Pages</i><br>NOTE:<br>
        This Register Page is especially for The Official Students of the Secondary School
        </p>

    </div>
  
  <!-- Use any element to open/show the overlay navigation menu -->
    <div class="my-form">
    <form name="myForm" action="" method="post"  >
        <hr>
        <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
        <div class="container">
     
            <div class="left">
                <fieldset>
                <legend>
                <label for="fname"><b>First Name </b></label>
                </legend>
                <input type="text" placeholder="Enter First Name" name="firstname" >
                </fieldset>
                <fieldset>
                <legend>
                <label for="mname"><b>Middle Name </b></label>
                </legend>
                <input type="text" placeholder="Enter Middle Name" name="middlename" required>
                </fieldset>
                <fieldset>
                <legend>
                <label for="surname"><b>SurName </b></label>
                </legend>
                <input type="text" placeholder="Enter SurName " name="surname" required>
                </fieldset>
                <fieldset>
                <legend>
                <label for="dob"><b>Date Of Birth </b></label>
                </legend>
                <input type="date" placeholder="Enter Date Of Birth " name="dob" required>
                </fieldset>
                <fieldset>
                <div class="input-control">
                <legend>
                    <label for="password"><b>Password</b></label>
                </legend>
                    <input type="password" placeholder="Enter Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <input type="checkbox" onclick="showPass()">
                    <div class="error"></div>
                </div>
                </fieldset> 
                <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<br>
               <fieldset>
                <div class="input-control">
                <legend>
                <label for="password2"><b>Repeat Password</b></label>
                </legend>
                    <input type="password" placeholder="Repeat Password" id="password2" name="password2" oninput="check(this)" required>
                   <input type="checkbox" onclick="showPass1()">
          
                </div>
               </fieldset>

            <div class="right">
            <fieldset>
            <div class="input-control">
            <legend>
            <label for="email"><b>Email</b></label>
              </legend>
                  <input type="email" placeholder="Enter Email" name="email" onkeydown="ValidateEmail()" id="email" required>
                  <br>
                  <span id="text"></span>
                  <br>
            </div>
            </fieldset>
  <br>
                <fieldset>
                <legend>
                <label for="phone"><b>Phone Number </b></label>
    </legend>
                <input type="text" placeholder="Enter Phone Number " name="phone" required>
                </fieldset>
                <fieldset>
                <legend>
                <label for="facebook"><b>Facebook </b></label>
                </legend>
                <input type="text" placeholder="Enter Facebook Account Name" name="facebook">
                </fieldset>
                <fieldset>
                <legend>
                <label for="twiter"><b>Twitter </b></label>
                </legend>
                <input type="text" placeholder="Enter Twitter Account Name " name="twiter" >
                </fieldset>
                <fieldset>
                <legend>
                <label for="instagram"><b>Instagram </b></label>
                </legend>
                <input type="text" placeholder="Enter Instagram Account Name " name="instagram" >
                </fieldset>
                <fieldset>
                <legend>
                <label for="file">Please Attach your CV here</label>
                </legend><br>
                <input type="file" name="file" id="file" required>
                </fieldset>
                <hr>
            </div>
        
        <button type="reset" class="resetbtn"><b>Reset</b></button>
        <button type="submit" class="registerbtn" name="submit" onclick="ValidateEmail(document.form.text)"><b>Register</b></button>
        <h3>already have an account? <a href="index.php" style="text-decoration:none;color:crimson;">Login here</a></h3>
      </form> 
    </div>
    </div> 

    <footer>
        <div class="footer-content">
            <div class="social-platforms">
                <fieldset>
                    <legend>Visit Social Platforms - &#64 Mkwakwani Sec. School</legend>
                    <a href="https://web.facebook.com/Mkwakwani-Secondary-School-1080834021967913/?_rdc=1&_rdr" target="_blank"><img src="facebook.png" alt="facebook" class="socialapps"></a>&nbsp;&nbsp;
                    <a href="https://www.instagram.com" target="_blank"><img src="instagram.png" alt="Instagram" class="socialapps"></a>&nbsp;&nbsp;
                    <a href="https://www.twitter.com" target="_blank">
                    <img src="twitter.png" alt="twitter" class="socialapps"></a>&nbsp;&nbsp;
                    <a href="https://web.whatsapp.com" target="_blank"><img src="whatsapp.png" alt="whatsapp" class="socialapps"></a>&nbsp;&nbsp;
                    <a href="https://web.telegram.com" target="_blank"><img src="telegram.png" alt="telegram" class="socialapps"></a>
                </fieldset>
            </div>
            <div class="inquiries">
            <p>
                <address>
                    Visit us at:<br>
                    <a href="mailto:hassansammah64@gmail.com" target="_blank"><b>Send An Email</b></a><br>
                    P.O.BOX 5847<br>
                    Bombo,Tanga<br>
                    Tanzania
                </address>
                CONTACT US <img src="contact.png" alt="Contact-logo" >
                <br><u>Via Telephone</u>&colon;<br>Deputy Head of School [ +255655422209 ]
                <br>Administration Office [ +255716805676 ]
            </p>
            
        </div>
        <div class="copyright">
            <p>&copy; Copyright 2022 Mkwakwani School, All Rights Reserved.</p>
        </div>
        </div>
    </footer>

<script>
    var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
function ValidateEmail()
{
    var emailError = document.getElementById("email").value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var textError = document.getElementById("text");
    if(emailError.match(mailformat))
    {
    textError.innerHTML = "Valid Email Address";
    textError.style.color = "#0000ff";
    return true;
    }
    else
    {
    textError.innerHTML = "Invalid Email Address";
    textError.style.color = "#ff0000";
    return false;
    }
}
</script>
</body>
</html>