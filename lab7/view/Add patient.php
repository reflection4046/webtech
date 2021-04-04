<!DOCTYPE html>
<html>
<head>
</head>
 <style>
body {
  background-image: url('img/p1.PNG');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style> 

<body>



<?php
$flag=1;
$nameErr = $emailErr= $genderErr =  $AgeErr=  $phoneNoErr= $datewErr= $medicalErr = $name = $email= $phoneNo = $Age=  $date=  $medical = $gender = "";
$message = '';  
$error = ''; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $flag=0;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$name)) {
      $nameErr = "Only letters white space, period & dash allowed";
      $name ="";
      $flag=0;
    }
    else if (str_word_count($name)<2) {
      $nameErr = "At least two words needed";
      $name ="";
      $flag=0;
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $flag=0;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email ="";
      $flag=0;
    }
  }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $flag=0;
  } else {
    $gender = test_input($_POST["gender"]);
  }

if (empty($_POST["phoneNo"])) {
    $phoneNoErr = "phoneNo is required";
    $flag=0;
  } else {
    $phoneNo = test_input($_POST["phoneNo"]);
  }
  

  

if (empty($_POST["Age"])) {
    $AgeErr = "Age is required";
    $flag=0;
  } else {
    $Age = test_input($_POST["Age"]);
  }

if (empty($_POST["Date"])) {
    $dateErr = "Date is required";
    $flag=0;
  } else {
    $date = test_input($_POST["Date"]);
  }

if (empty($_POST["Medical"])) {
    $medicalErr = "Medical is required";
    $flag=0;
  } else {
    $medical = test_input($_POST["Medical"]);
  }



 if ($flag==1) {
  if(isset($_POST["submit"]))  
    {
  if(file_exists('Patient.json'))
    {
      $current_data = file_get_contents('Patient.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array(  
                 'name'               =>     $_POST['name'],
                 'email'          =>     $_POST["email"],
                 'gender'          =>     $_POST["gender"],
                 'phoneNo'       =>      $_POST["phoneNo"],
                 'Age'        =>     $_POST["Age"],
                 'Date'        =>     $_POST["Date"],
                 'Medical'        =>     $_POST["Medical"]

                 
                 );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('patient.json', $final_data))  
            {  
                 $message = "<h2>saved Successfully</h2>";  
            }  
        }  
        else  
        {  
           $error = 'JSON File not exits';  
        }  
    }
 }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
    <legend align="center" style="font-size: 3.0em">Add patient</legend>

   Patient Name: <input type="text" name="name">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><hr>
   E-mail: <input type="text" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><hr>
   Phone No:<input type="text" name="phoneNo">
   <span class="error">*<?php echo $phoneNoErr;?></span>
   <br><hr>
   Gender:
 
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <hr>
  <fieldset>
  Age: 
  <input type="text" name="Age">
  <span class="error">*<?php echo $AgeErr;?></span>
  <br><br>

  Appointment Time:
  <input type="Date" name="Date">
  <span class="error">* <?php echo $datewErr;?></span>
  <br><br>
  Medical History:
  <input type="text" name="Medical">
  <span class="error">*<?php echo $medicalErr;?></span>
  <br><br>
 
</fieldset><hr>
  <input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset">  </fieldset>
</form>
 
<?php
echo $error;
echo "<br>";
echo $message;
echo "<br>";
?>
</body>
</html>