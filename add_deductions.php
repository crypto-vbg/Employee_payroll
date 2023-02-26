<?php

		require("db.php");

		@$id 			= $_POST['deduction_id'];
		@$Medical 	= $_POST['Medical'];
		@$tax 			= $_POST['tax'];
		@$gsis 			= $_POST['gsis'];
		// @$love 			= $_POST['pag_ibig'];
		@$loans 		= $_POST['loans'];


		$sql = mysqli_query($conn,"UPDATE deductions SET tax='$tax', gsis='$gsis', loans='$loans', Medical='$Medical' WHERE deduction_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Deductions successfully updated...');
		            window.location.href='home_deductions.php';
		        </script>
		    <?php
		}
		else {
			echo "Not Successfull!";
		}
 ?>
