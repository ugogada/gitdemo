<?php
include_once 'include/admin_header.php';
	$fat="select * from bus";
	$r=mysqli_query($con,$fat);
?>
<?php
if (isset($_POST['delete'])) 
{
		$bus_id=@$_POST['id'];
		$del="DELETE FROM bus WHERE id='$bus_id'";
		if(mysqli_query($con,$del))
		{
			echo '<script>alert("Bus Deleted Successfully.");</script>';
		}
}
?>
<form action="d_bus.php" method="post">
<table class="table shad" >
	<th class="th bk_th" colspan="4">
		<center>	You can Delete bus from here </center>
	</th>
	<tr>
		<td>
			<p class="justy mar">
				If you want to delete the bus <br> then please enter the bus no .
			</p>
		</td>
	</tr>
	<tr>
		<td>
			<label class="mar">Select Bus ID :</label>
						<select class="r_i" name="id">
					<option selected disabled>Select here... </option>
		 				<?php while ($res=mysqli_fetch_assoc($r)) 
							{?>
		 					<option value="<?php echo $res['id']; ?>" name="title_tour"><?php echo $res['id']; ?>
		 					</option>
		 				<?php 
		 				}?>
		 			</select>
		</td>
		</tr>
		<tr>
			<td colspan="3">
				<input type="submit" name="delete" class="btn3  mar" value="Delete">
				<a href="c_bus.php" class="a"><input type="button" class="btn  mar" value="Back"></a>	
			</td>
	</tr>
</table>
</form>

<?php
	include_once 'include/a_footer.php';
?>