<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>
	<div style="margin-left:40%;margin-top:8%">
	<h2>Enter your details here</h2>
	<?php
	// define variables and set to empty values
	$nameErr = $emailErr = $genderErr = $degreeErr = "";
	$name = $email = $gender = $degree = $website = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["name"])) {
	    $nameErr = "Name is required";
	  } else {
	    $name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
		  $nameErr = "Only letters and white space allowed";
		  $name = "";
		}
	  }

	  if (empty($_POST["email"])) {
	    $emailErr = "Email is required";
	  } else {
	    $email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format";
		  $email="";
		}
	  }


	  if (empty($_POST["gender"])) {
	    $genderErr = "Gender is required";
	  } else {
	    $gender = test_input($_POST["gender"]);
	  }
	  if (empty($_POST["degree"])) {
	    $degreeErr = "degree is required";
	  } else {
	    $degree = test_input($_POST["degree"]);
	  }
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		Name: <input type="text" name="name" value=""<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>
		E-mail:
		<input type="text" name="email" value="Enter a email here"<?php echo $email;?>">
		<span class="error">* <?php echo $emailErr;?></span>
		<br><br>
		<label for="birthday">Date of Birth :</label>
		<input type="date" id="birthday" name="birthday">
		<br>
		Gender:
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="female") echo "checked";?>
		value="female">Female
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="male") echo "checked";?>
		value="male">Male
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="other") echo "checked";?>
		value="other">Other
		<span class="error">* <?php echo $genderErr;?></span>
		<br><br>
		Degree:
		<input type="radio" name="degree"
		<?php if (isset($degree) && $degree=="female") echo "checked";?>
		value="female">SSC
		<input type="radio" name="degree"
		<?php if (isset($degree) && $degree=="male") echo "checked";?>
		value="male">HSC
		<input type="radio" name="degree"
		<?php if (isset($degree) && $degree=="other") echo "checked";?>
		value="other">BSC
		<input type="radio" name="degree"
		<?php if (isset($degree) && $degree=="female") echo "checked";?>
		value="female">MSC
		<span class="error">* <?php echo $degreeErr;?></span>
		<br><br>
		<select>  
  <option value="Select">Blood group</option>}  
  <option value="Vineet">A+</option>  
  <option value="Sumit">B+</option>  
  <option value="Dorilal">A-</option>  
  <option value="Omveer">B-</option>  
  <option value="Rohtash">o+</option>  
  <option value="Maneesh">o-</option>   
</select>  
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<h2>Your input</h2>
	<?php 
			echo $name."<br>";
			echo $email."<br>";
			echo $gender."<br>";
			echo $degree."<br>";
	 ?>
	 </div>
</body>
</html>