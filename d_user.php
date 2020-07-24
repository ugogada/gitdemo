<?php
include_once 'include/admin_header.php';
	$fat="select * from register";
	$r=mysqli_query($con,$fat);
?>
<?php
if (isset($_POST['delete'])) 
{
		$email=@$_POST['select_email'];
		$q= "select * from register where email='$email'";
		$up=mysqli_query($con,$q);
		$p=mysqli_fetch_assoc($up);
		$n=$p['img'];
		// echo "$n";

	if (@unlink("../profile/".$n)) {
			$del="DELETE FROM `register` WHERE email='$email'";
		if(mysqli_query($con,$del))
		{
			echo '<script>alert("User Deleted Successfully.");</script>';
		}
		else
		{
			echo '<script>alert("Error in user Deleting.");</script>';
		}
	}
	else{
		$del="DELETE FROM `register` WHERE email='$email'";
		if(mysqli_query($con,$del))
		{
			echo '<script>alert("User Deleted Successfully.");</script>';
		}
		else
		{
			echo '<script>alert("Error in user Deleting.");</script>';
		}
	}	
}
?>

<form action="d_user.php" method="POST">
<center> <table class="shad t_font" width="50%">
	<th class="bk_t" colspan="2">
	You can Delete User from user 
	</th>
	<tr class="d_u_w">
		<td>
			<p class="justy mar"> Select User Email ID</p>
				<select class="r_i b_spc" name="select_email">
					<option selected disabled>Select here... </option>
 				<?php while ($res=mysqli_fetch_assoc($r)) 
					{?>
 					<option value="<?php echo $res['email']; ?>" name="select_email"><?php echo $res['email']; ?>
 					</option>
 				<?php 
 				}?>
 			</select>
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" name="delete" value="Delete" class="btn mar"><br><br>
			<a href="user.php" class="a"><input type="button" class="btn3 mar" value="Back"></a>
		</td>
	</tr>
</table> </center>
</form>
<?php
include_once 'include/a_footer.php';
?>
