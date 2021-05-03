<!DOCTYPE html>
<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="dbms";
$id="";
$name="";
$age="";
$photo="";
$nationality="";
$potential="";
$club="";
$logo="";
$wage="";
$jersey="";
 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
//connect to mysql database
try{
$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
echo("error in connecting");
}
//get data from the form
function getData()
{
$data = array();
$data[0]=$_POST['id'];
$data[1]=$_POST['name'];
$data[2]=$_POST['age'];
$data[3]=$_POST['photo'];
$data[4]=$_POST['nationality'];
$data[5]=$_POST['potential'];
$data[6]=$_POST['club'];
$data[7]=$_POST['logo'];
$data[8]=$_POST['wage'];
$data[9]=$_POST['jersey'];
return $data;
}
//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM ajax_cruds WHERE id = '$info[0]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$id=$rows['ID'];
$name=$rows['Name'];
$age=$rows['Age'];
$photo=$rows['Photo'];
$nationality=$rows['Nationality'];
$potential=$rows['Potential'];
$club=$rows['Club'];
$logo=$rows['Logo'];
$wage=$rows['Wage'];
$jersey=$rows['Jersey'];
 
}
}else{
echo("no data with such ID");
}
} else{
echo("result error");
}

 
}
//insert
if(isset($_POST['insert'])){
$info = getData();
$insert_query="INSERT INTO `ajax_cruds`(`ID`, `Name`, `Age`, `Photo`,`Nationality`,`Potential`,`Club`,`Logo`,`Wage`,`Jersey`) VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]')";
try{
$insert_result=mysqli_query($conn, $insert_query);
if($insert_result)
{
if(mysqli_affected_rows($conn)>0){
echo("data inserted successfully");
 
}else{
echo("data are not inserted");
}
}
}catch(Exception $ex){
echo("error inserted".$ex->getMessage());
}
}
//delete
if(isset($_POST['delete'])){
$info = getData();
$delete_query = "DELETE FROM `ajax_cruds` WHERE id = '$info[0]'";
try{
$delete_result = mysqli_query($conn, $delete_query);
if($delete_result){
if(mysqli_affected_rows($conn)>0)
{
echo("data deleted");
}else{
echo("data not deleted");
}
}
}catch(Exception $ex){
echo("error in delete".$ex->getMessage());
}
}
//edit
if(isset($_POST['update'])){
$info = getData();
$update_query="UPDATE `ajax_cruds` SET `Name`='$info[1]',Age='$info[2]',Photo='$info[3]', Nationality='$info[4]',Potential='$info[5]',Club='$info[6]', `Logo`='$info[7]',Wage='$info[8]',`Jersey`='$info[9]'WHERE id = '$info[0]'";
try{
$update_result=mysqli_query($conn, $update_query);
if($update_result){
if(mysqli_affected_rows($conn)>0){
echo("data updated");
}else{
echo("data not updated");
}
}
}catch(Exception $ex){
echo("error in update".$ex->getMessage());
}
}

?>

<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
 
<body>
	<div>
<form method ="post" action="idus.php">
ID:
<input type="number" name="id" placeholder="ID" value="<?php echo($id);?>"><br><br>
Name:
<input type="text" name="name" placeholder="Name" value="<?php echo($name);?>"><br><br>
Age:
<input type="text" name="age" placeholder="Age" value="<?php echo($age);?>"><br><br>
<input type="text" name="photo" placeholder="Photo" value="<?php echo($photo);?>"><br><br>
Nationality:
<input type="text" name="nationality" placeholder="Nationality" value="<?php echo($nationality);?>"><br><br>
Potential:
<input type="text" name="potential" placeholder="Potential" value="<?php echo($potential);?>"><br><br>
Club:
<input type="text" name="club" placeholder="Club" value="<?php echo($club);?>"><br><br>
<input type="text" name="logo" placeholder="Club Logo" value="<?php echo($logo);?>"><br><br>
Wage:
<input type="text" name="wage" placeholder="Wage" value="<?php echo($wage);?>"><br><br>
Jersey Number:
<input type="text" name="jersey" placeholder="Jersey Number" value="<?php echo($jersey);?>"><br><br>
<div>
<input type="submit" name="insert" value="Add">
<input type="submit" name="delete" value="Delete">
<input type="submit" name="update" value="Update">
<input type="submit" name="search" value="Find">
</div>

</form>
</div>

<div>
	<h1 align="center">TOP-3</h1>
	<iframe src="https://www.kaggle.com/embed/ivannatarov/plotly-for-beginners-polar-charts-image?cellIds=11&kernelSessionId=61309687" height="500" style="margin: 0 auto; width: 100%; max-width: 950px;" frameborder="0" scrolling="auto" title="📌 Plotly for Beginners: [Polar Charts / Image]"></iframe>
	<iframe src="https://www.kaggle.com/embed/ivannatarov/plotly-for-beginners-polar-charts-image?cellId=14&cellIds=14&kernelSessionId=61309687" height="500" style="margin: 0 auto; width: 100%; max-width: 950px;" frameborder="0" scrolling="auto" title="📌 Plotly for Beginners: [Polar Charts / Image]"></iframe>
	<iframe src="https://www.kaggle.com/embed/ivannatarov/plotly-for-beginners-polar-charts-image?cellId=14&cellIds=17&kernelSessionId=61309687" height="500" style="margin: 0 auto; width: 100%; max-width: 950px;" frameborder="0" scrolling="auto" title="📌 Plotly for Beginners: [Polar Charts / Image]"></iframe>
</div>
</body>
</html>