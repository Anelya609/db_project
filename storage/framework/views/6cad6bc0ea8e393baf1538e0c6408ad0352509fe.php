<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
 
<body>
<form method ="post" action="act.php">
<input type="number" name="Rollno" placeholder="Roll No" value="<?php echo($Rollno);?>"><br><br>
<input type="text" name="fname" placeholder="First Name" value="<?php echo($fname);?>"><br><br>
<input type="text" name="lname" placeholder="Last Name" value="<?php echo($lname);?>"><br><br>
<input type="text" name="address" placeholder="Address" value="<?php echo($address);?>"><br><br>
<input type="text" name="email" placeholder="example@example.com" value="<?php echo($email);?>"><br><br>
<div>
<input type="submit" name="insert" value="Add">
<input type="submit" name="delete" value="Delete">
<input type="submit" name="update" value="Update">
<input type="submit" name="search" value="Find">
 
</div>
</form>
</body>
</html><?php /**PATH C:\xampp\htdocs\dbms_project\resources\views/test.blade.php ENDPATH**/ ?>