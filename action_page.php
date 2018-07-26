<?php
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirmation=$_POST['confirm password'];
if(!empty($username)||!empty($email)||!empty($password))
{ $host="localhost";
$dbUsername="root";
$dbPassword="rat";
$dbname="registration";
$con=new mysqli($host,$dbUsername,$dbPassword,$dbname);
if(mysqli_connect_error())
{
	die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else
{
	$select="select email from register where email=? limit 1";
	$result="insert into register(username,email,password,confirmation) values(?,?,?,?)";
	$stmt=$con->prepare($select);
	$stmt->bind_param("s",$email);;
	$stmt->execute();
	$stmt->bind_result($email);
	$stmt->store_result();
	$rnum=$stmt->num_rows;
	if($rnum==0)
		{$stmt->close();
		$stmt=$con->prepare($insert);
	 	$stmt->bind_param("ssss",$username,$email,$password,$confirmation);
	 	$stmt->execute();
	 	echo "new record inserted";}
	 else
	 	{echo "this email is alreday registered";}
	 stmt->close();
	 con->close();
	 
}
}
else
{echo "All fields are required";
 die();
}
if($password!=$confirmation)
{echo "passwords didn't match";
die();}
?>
