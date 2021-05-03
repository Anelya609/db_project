<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="lab3";
$Rollno="";
$fname="";
$lname="";
$address="";
$email="";
 
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
$data[1]=$_POST['email'];
$data[2]=$_POST['name'];
$data[3]=$_POST['weight'];
$data[4]=$_POST['color'];
return $data;
}
//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM car WHERE id = '$info[0]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$Rollno = $rows['id'];
$fname = $rows['email'];
$lname = $rows['name'];
$address = $rows['weight'];
$email = $rows['color'];
 
}
}else{
echo("no data are available");
}
} else{
echo("result error");
}
 
}
//insert
if(isset($_POST['insert'])){
$info = getData();
$insert_query="INSERT INTO `car`(`email`, `name`, `weight`, `color`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]')";
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
$delete_query = "DELETE FROM `car` WHERE id = '$info[0]'";
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
$update_query="UPDATE `car` SET `email`='$info[1]',name='$info[2]',weight='$info[3]', color='$info[4]' WHERE id = '$info[0]'";
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