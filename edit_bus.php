<?php
include_once 'include/admin_header.php';
ob_start();
	$fat="select * from bus";
	$r=mysqli_query($con,$fat);
	
?>

	<table class="table shad cen">
		<th class="th bk_t2" colspan="3">
			You can edit buses from here
		</th>
		<tr>
		<td>
		<center>
			<form method="POST" action="e_bus.php">
			<table  class="p_table">
		 <tr>
		 		<td>
		 			<label class="booked_margin b_spc"> Select bus id  </label> <br> 
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
						<input type="submit" name="sel" value="select" class="dbtn mar">
					</center>
				 </td>
				</tr>

			</table>
		</form>
	</center>
</td>
</tr>
</table>
<?php
	include_once 'include/a_footer.php';
?>