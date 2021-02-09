<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $dateErr = $degreeErr = $bgErr = "";
$name = $email = $gender = $date = $degree = $bg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
    if (strlen($_POST["name"])<2)
    {
      $nameErr = "Min Two Words Need";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["date"])) {
    $dateErr = "Date is required";
  } else {
    $date = test_input($_POST["date"]);
  
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
if(!empty($_POST["degree"])){
    $countDegree = count($_POST["degree"]);
    if($countDegree<2){
      $degreeErr = "Check at least two degree";
    }
  }else{
     $degreeErr = "Check at least two degree";
  }

  if (empty($_POST["bg"])) {
    $bgErr = "Blood Group is required";
  } else {
    $bg = test_input($_POST["bg"]);
  }




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: 
  <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail:
   <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Date: 
  <input type="date" name="date" value="<?php echo $date;?>">
  <span class="error">* <?php echo $dateErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Degree:
  <input type="checkbox" id="ssc" name="degree[]" value="SSC">SSC
  <input type="checkbox" id="hsc" name="degree[]" value="HSC">HSC
  <input type="checkbox" id="bsc" name="degree[]" value="BSc">BSc
  <input type="checkbox" id="msc" name="degree[]" value="MSc">MSc
  <span class="error">*<?php echo $degreeErr;?></span>
  <br><br>
  Blood Group:
  <select id="" name="bg">
  <option value="a pos">A (+ve)</option>
  <option value="a neg">A (-ve)</option>
  <option value="b pos">B (+ve)</option>
  <option value="b neg">B (-ve)</option>
  <option value="o pos">O (+ve)</option>
  <option value="o neg">O (-ve)</option>
  <option value="ab pos">AB (+ve)</option>
  <option value="ab neg">AB (-ve)</option>
  <span class="error">* <?php echo $bgErr;?></span>
  </select>
  <br><br>
  <input type="submit" name="submit" value="Submit">

</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $date;
echo "<br>";
echo $gender;
echo "<br>";
if(!empty($_POST["degree"])){
  foreach($_POST["degree"] as $Degree){
    echo $Degree; echo "<br>";
  }
}
echo $bg;
echo "<br>";
?>

</body>
</html>