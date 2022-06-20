<?php
@include ('config.php');


    if(isset($_POST['submit'])){
    $alumniName = $_POST['alumniName'];
    $enrolmentYear = $_POST['enrolmentYear'];
    $graduationYear = $_POST['graduationYear'];
    $headenrol = $_POST['headenrol'];
    $headgrad = $_POST['headgrad'];
    $famousTeacher = $_POST['famousTeacher'];
    $results = $_POST['results'];
    $occupation = $_POST['occupation'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
   
    $select = " SELECT * FROM alumnus WHERE email = '$email' ";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){

        $error[] = 'user exists!';
  
     }else{
        $insert = "INSERT INTO alumnus(alumniName, enrolmentYear, graduationYear, headenrol, headgrad, famousTeacher, results, occupation, email, address, mobile) VALUES('$alumniName', '$enrolmentYear', '$graduationYear', '$headenrol', '$headgrad', '$famousTeacher', '$results', '$occupation', '$email', '$address', '$mobile')";
        mysqli_query($conn, $insert);
        $success[] = 'Alumni  registration successfully';
    };    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni-Page</title>
    <link rel="icon" href="alumni.png" type="image/x-icon">
    <link rel="stylesheet" href="alumni.css">
</head>
<body>
<div class="navigation">
        <nav>
            <a href="Home.html">Home</a>
            <a href="About.html">About</a>
            <a  class="active" href="Alumni.php">Alumni</a>
            <a href="Staff.html">Staff</a>
            <a href="Contact.html">Contacts</a>
        </nav>
    </div>
    <center>
    <h3>Registered Alumni</h3>
    </center>
    <div class="container">
        <div class="table-form">
            <table class="Table-1" align="center">
                <form action="alumni.php" method="post">
                <tr>
                    <th>Alumni Name</th><td>:</td>
                    <td><input type="text" id="alumniName" placeholder="eg.Juma Ali '2018" name="alumniName" required></td>
                </tr>
                <tr>
                    <th>Year of Enrollment</th><td>:</td>
                    <td><input type="date" id="enrolmentYear" name="enrolmentYear" required></td>
                </tr>
                <tr>
                    <th>Year of Graduation</th><td>:</td>
                    <td><input type="date" id="graduationYear" name="graduationYear" required></td>
                </tr>
                <tr>
                    <th>Headmaster At Enrollment</th><td>:</td>
                    <td><input type="text" id="headenrol" placeholder="eg.Mr.Mziray" name="headenrol" required></td>
                </tr>
                <tr>
                    <th>Headmaster At Graduation</th><td>:</td>
                    <td><input type="text" id="headgrad" placeholder="eg.Mr.Stanley Mjema" name="headgrad" required></td>
                </tr>
                <tr>
                    <th>Famous Teacher</th><td>:</td>
                    <td><input type="text" id="famousTeacher" placeholder="eg.Mr.Hemedi Omari" name="famousTeacher" required></td>
                </tr>
                <tr>
                    <th>Summary of Results</th><td>:</td>
                    <td>
                    <select id="results" name="results">
                    <option value="empty">--Enter Your Division --</option>
                    <option value="I">ONE</option>
                    <option value="II">TWO</option>
                    <option value="III">THREE</option>
                    <option value="IV">FOUR</option>
                    <option value="0">ZERO</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th>Current Occupation</th><td>:</td>
                    <td><input type="text" id="occupation" placeholder="eg. MedicalDoctor" name="occupation" required></td>
                </tr>
                <tr>
                    <th>Email</th><td>:</td>
                    <td><input type="email" id="email" placeholder="example@gmail.com" name="email" onkeydown="ValidateEmail()" required><br><span id="text"></span></td>
                </tr>
                <tr>
                    <th>Address</th><td>:</td>
                    <td><input type="address" id="address" placeholder="eg.Tanga, Sahare" name="address" required></td>
                </tr>
                <tr>
                    <th>Mobile</th><td>:</td>
                    <td><input type="tel" id="mobile" placeholder="+255xxxxxxxxx" name="mobile" required></td>
                </tr>
                <tr>
                    <th><button class="btn-1" type="submit" name="submit" onclick="ValidateEmail(document.form.text)" >REGISTER</th>
                </tr>
            </form>    
            </table>
            <script>
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
        </div>
    </div>
    <br>
        <h3 style="text-align:center;">LIST OF ALL REGISTERED ALUMNI OF THE SCHOOL</h3>
            <table class="Table">
                <tr>
                    <th>S/N</th>
                    <th>Alumni Name</th>
                    <th>Year of Enrollment</th>
                    <th>Year Of Graduation</th>
                    <th>Headmaster At Enrollment</th>
                    <th>Headmaster At Graduation</th>
                    <th>Famous Teacher</th>
                    <th>Summary of Results</th>
                    <th>Occupation</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Mobile</th>
                </tr>  
                <?php
                $conn=mysqli_connect("localhost","root","","alumni");
                $sql = "SELECT* FROM alumnus";
                $result = $conn->query($sql);

                if($result->num_rows>0)
                {
                while($row=$result->fetch_assoc()) 
                {
                echo "<tr><td>".$row["enrolNo"]."</td><td>".$row["alumniName"]."</td><td>".$row["enrolmentYear"]."</td><td>".$row["graduationYear"]."</td><td>".$row["headenrol"]."</td><td>".$row["headgrad"]."</td><td>".$row["famousTeacher"]."</td><td>".$row["results"]."</td><td>".$row["occupation"]."</td><td>".$row["email"]."</td><td>".$row["address"]."</td><td>".$row["mobile"]."</td>
                </tr>";
                }
                }else{
                echo "There is no result";
                }
                $conn->close();
                ?>
            </table>
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
                <p>CONTACT US <img src="contact.png" alt="Contact-logo" >
                    <br><u>Via Telephone</u>&colon;<br>Deputy Head of School [ +255655422209 ]
                    <br>Administration Office [ +255716805676 ]
                </p>
                
            </div>
            <div class="copyright">
                <p>&copy; Copyright 2022 Mkwakwani School, developed by Hassan A. Samma</p>
            </div>
        </div>
    </footer>



</body>
</html>