<?php
	require('db.php');

	$id=$_GET['emp_id'];
	$query = "DELETE FROM employee WHERE emp_id=$id";
	$query2 = "DELETE FROM payment WHERE emp_id='1'";
	$query3 = "DELETE FROM deductions WHERE emp_id='1'";
	$query4 = "DELETE FROM overtime WHERE emp_id='1'";
	$query5 = "DELETE FROM salary WHERE emp_id='1'";
	$result5 = mysqli_query($conn,$query5) or die ( mysqli_error($conn));
	$result4 = mysqli_query($conn,$query4) or die ( mysqli_error($conn));
	$result3 = mysqli_query($conn,$query3) or die ( mysqli_error($conn));
	$result2 = mysqli_query($conn,$query2) or die ( mysqli_error($conn));
	$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
	header("Location: home_employee.php");
 ?>
