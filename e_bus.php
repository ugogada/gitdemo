<?php
include_once 'include/admin_header.php';
?>
<?php 
			$fid=@$_POST['select_id'];
				$u=mysqli_query($con,"select * from bus where id='$fid'");
				$sel="select * from package";
				$qr=mysqli_query($con,$sel);
			while($r = mysqli_fetch_assoc($u))
			{
				$bid=$r['id'];
				$pid=$r['package_id'];
				$bname=$r['name'];
				$btime=$r['time'];
				$driver=$r['driver_mobile'];

			} 

if (isset($_POST['edit'])) 
{
		
				$bid=$_POST['id'];
				$pid=$_POST['sid'];
				$bname=$_POST['name'];
				$btime=$_POST['time'];
				$driver=$_POST['driver'];

			$edt="update bus set package_id='$pid',name='$bname',time='$btime',driver_mobile='$driver' where id='$bid'";
					if(mysqli_query($con,$edt))
					{
						header("location:c_bus.php");
					}
					else
					{
						echo "Error in updating package try again".mysqli_error($con);
					}
}
?>

<form method="POST" action="e_bus.php">
	<table class="table shad">
		<th class="th bk_t" colspan="4">
			You can edit bus from here
		</th>
		<tr>
			<td>
			<center>	
				<label class="booked_margin b_spc"> Bus id </label> <br> <input type="text" readonly name="id" class="r_i b_spc" value="<?php echo $bid; ?>" required ></center>
			</td>
		</tr>
		<tr>
			<td>
				<center>
					<label class="booked_margin b_spc"> Select package Id </label><br>
					<select class="r_i b_spc" name="sid">
					<option selected disabled ><?php echo $pid; ?> </option>
		 				<?php while ($res=mysqli_fetch_assoc($qr)) 
							{?>
		 					<option value="<?php echo $res['id']; ?>" name="sid"><?php echo $res['id']; ?>
		 					</option>
		 				<?php 
		 				}?>
		 			</select>
				</center>
			</td>
		</tr>
		<tr>
			<td><center>
				<label class="booked_margin b_spc"> bus name</label> <br> <input type="text" name="name" class="r_i b_spc" value="<?php echo $bname; ?>" required /></center>
			</td>
		</tr>
		<tr>
			<td colspan="2"><center>
				<label class="booked_margin b_spc">  bus time </label> <br> <input type="text" name="time" class="r_i b_spc" value="<?php echo $btime; ?>" required ></center>
			</td>
		</tr>
		<tr>
			<td><center>
				<label class="booked_margin b_spc"> Driver mobile no </label> <br> <input type="text" name="driver" class="r_i b_spc" value="<?php echo $driver; ?>" required ></center>
			</td>
		</tr>
	</table>
	<center><input type="submit" name="edit" value="Update" class="b_back2 mar">
				<a href="c_bus.php" class="a"> <input type="button" name="a_bus" value="Back" class="b_back  mar"> </a></center>
</form>
<?php
	include_once 'include/a_footer.php';
?>