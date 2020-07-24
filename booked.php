<?php
include_once 'include/admin_header.php';
include_once '../include/condb.php';
ob_start();
	$fat="select * from booked";
	$r=mysqli_query($con,$fat);
	
?>
<table class="table">
	<th class="th bk_th" colspan="7">
	<p class="font">	Booked Packages </p>
	</th>
		<tr>
		<td colspan="7"> 
		<hr class="hrtag1">
		</td>
	</tr>
	<tr>
		<td>
			<p class="booked_margin"> Name </p>
		</td>
		<td>
			<p class="booked_margin"> Email </p>
		</td>
		<td>
			<p class="booked_margin"> Phone NO. </p>
		</td>
		<td>
			<p class="booked_margin"> Date </p>
		</td>
		<td>
			<p class="booked_margin"> Persons </p>
		</td>
		<td>
			<p class="booked_margin"> Tour_title </p>
		</td>
		<td>
			<p class="booked_margin"> Bus id </p>
		</td>
	</tr>
	<tr>
		<td colspan="7"> 
		<hr class="hrtag2">
		</td>
	</tr>
	<?php while ($res=mysqli_fetch_assoc($r)) 
	{
	?>
	<tr>
		<td>
			<p class="booked_margin"> <?php echo $res['fname']; ?> </p>
		</td>
		<td>
			<p class="booked_margin"> <?php echo $res['email']; ?> </p>
		</td>
		<td>
			<p class="booked_margin"> <?php echo $res['mobile']; ?> </p>
		</td>
		<td>
			<p class="booked_margin"> <?php echo $res['date']; ?> </p>
		</td>
		<td>
			<p class="booked_margin"> <?php echo $res['persons']; ?> </p>
		</td>
		<td>
			<p class="booked_margin"> <?php echo $res['tour_title']; ?> </p>
		</td>
		<td>
			<p class="booked_margin"> <?php echo $res['bus_id']; ?> </p>
		</td>
	</tr>
	<?php } ?>
	<tr>
	<td colspan="7">
		<a href="index.php"><button class="book_btn">Home</button></a>
	</td>
	</tr>
</table>
<?php
	include_once 'include/a_footer.php';
?>