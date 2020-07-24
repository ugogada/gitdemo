<?php
session_start();
include_once '../include/condb.php';

	if (isset($_POST['submit'])) 
	{
		$fn=$_POST['FName'];
		$ln=$_POST['LName'];
		$em=$_POST['email'];
		$pa=$_POST['passwd'];
		$gen=$_POST['gender'];
		$age=$_POST['age'];
		$mob=$_POST['mno'];
		$ad=$_POST['add'];
		$dob=$_POST['dob'];
		$city=$_POST['city'];
		$img ="";

	  $ins="Insert into register values('$fn','$ln','$em','$pa','$gen',$age,'$mob','$ad','$dob','$city','$img')";
		if(mysqli_query($con,$ins))
		{
			//echo "Registered Sucessfully";
			$_SESSION['re']="1";
			header("location:index.php");
		}
		else
		{
			echo "Error in register try again";
		}
	}

		mysqli_close($con);
?>