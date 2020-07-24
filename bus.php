<?php
include_once 'include/admin_header.php';
	$fat="select * from package";
	$r=mysqli_query($con,$fat); 
	if (isset($_POST['add'])) 
	{
		$b_id=@$_POST['bus_id'];
		$pkg=@$_POST['select_id'];
		$name=@$_POST['b_name'];
		$time=@$_POST['b_time'];
		$drimob=@$_POST['driver_mob'];

		$ins="Insert into bus values('$b_id','$pkg','$name','$time','$drimob')";
					if(mysqli_query($con,$ins))
					{
						header("location:index.php");
					}
					else
					{
						echo "Error in adding package try again".mysqli_error($con);
					}
	}
?>
<form method="POST" action="bus.php">
	
	<table class="table shad">
		<center><th class="th bk_t" colspan="4">
			You can add bus from here
		</th></center>
		<tr>
			<td>
			<center>	<label class="booked_margin b_spc"> Enter Bus id </label> <br> <input type="text" name="bus_id" class="r_i b_spc" placeholder="Ex : Gj-03-BK-8160" required ></center>
			</td>
		</tr>
		<tr>
			<td>
				<center>
					<label class="booked_margin b_spc"> Select package Id </label><br>
					<select class="r_i b_spc" name="select_id">
					<option selected disabled>Select here... </option>
		 				<?php while ($res=mysqli_fetch_assoc($r)) 
							{?>
		 					<option value="<?php echo $res['id']; ?>" name="select_id"><?php echo $res['id']; ?>
		 					</option>
		 				<?php 
		 				}?>
		 			</select>
				</center>
			</td>
		</tr>
		<tr>
			<td><center>
				<label class="booked_margin b_spc"> Enter bus name</label> <br> <input type="text" name="b_name" class="r_i b_spc" placeholder="Enter bus name" required /></center>
			</td>
		</tr>
		<tr>
			<td colspan="2"><center>
				<label class="booked_margin b_spc"> Enter bus time </label> <br> <input type="text" name="b_time" class="r_i b_spc" placeholder="Enter bus time" required ></center>
			</td>
		</tr>
		<tr>
			<td><center>
				<label class="booked_margin b_spc"> Driver mobile no </label> <br> <input type="text" name="driver_mob" class="r_i b_spc" placeholder="Enter Driver's phone no" required ></center>
			</td>
		</tr>
	</table>
	<center><input type="submit" name="add" value="Add" class="b_back2 mar">
				<a href="c_bus.php" class="a"> <input type="button" name="a_bus" value="Back" class="b_back  mar"> </a></center>
</form>
<?php
	include_once 'include/a_footer.php';
?>