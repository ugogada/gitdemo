<?php
include_once 'include/admin_header.php';
	$fat="select * from package";
	$r=mysqli_query($con,$fat);
?>
<?php
if (isset($_POST['delete'])) 
{
		$fet=@$_POST['select_id'];
		$q= "select * from package where id='$fet'";
		$up=mysqli_query($con,$q);
		$p=mysqli_fetch_assoc($up);
		$n=$p['image'];
		// echo "$n";

	if (unlink("package/".$n)) {
			$del="DELETE FROM `package` WHERE id='$fet'";
		if(mysqli_query($con,$del))
		{
			echo '<script>alert("Package Deleted Successfully.");</script>';
		}
	}	
}
?>
<table class="table shad">
	<th class="th bk_t" colspan="4">
		<center>	You can Delete Packages from here </center>
	</th>
	<tr>
		<td>
			<p class="justy mar">
				If you want to delete the package <br> then please enter the package id .
			</p>
		</td>
	</tr>
	<tr>
		<form method="post" action="d_packages.php">
		<td>
				<select class="r_i b_spc" name="select_id">
					<option selected disabled>Select here... </option>
		 				<?php while ($res=mysqli_fetch_assoc($r)) 
							{?>
		 					<option value="<?php echo $res['id']; ?>" name="select_id"><?php echo $res['id']; ?>
		 					</option>
		 				<?php 
		 				}?>
		 			</select>
		 			<center>
		 				<br>
						<input type="submit" name="delete" value="Delete" class="dbtn  mar">
					</center>
		</td>
		</form>
		</tr>
		<tr>
			<td colspan="3">
				<a href="pack.php"><button class="btn  mar"> Back</button></a>	
			</td>
	</tr>
</table>


<?php
	include_once 'include/a_footer.php';
?>