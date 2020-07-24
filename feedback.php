 <?php
include_once 'include/admin_header.php';
				$sel="select * from feedback";
				$qr=mysqli_query($con,$sel);
?>

<table class="table">
	<th class="th bk_th">
		Feedbacks
	</th>
</table>
<center>
	<table class="fd_table" >
		<tr>
			<?php while($r = mysqli_fetch_assoc($qr))
			{
				$name=$r['name'];
				$emv=$r['email'];
				$subject=$r['subject'];
				$msg=$r['message'];
				$img="select * from register where email='$emv'";
				$rr=mysqli_query($con,$img);
				$img=mysqli_fetch_assoc($rr);
				$i=$img['img'];
			?>
			<td width="49px">
				<?php 
				if ($img['img'] == '') 
					{
					echo "<center> <img src='../logos/log.png' class='logo_fed'> </center>";
					}
					else
					{
						echo "<center><img src='../profile/$i' class='logo_fed'></center>";
					}
				 ?>
			</td>
			<td>
				<p class="fb_up"><?php echo $name; ?></p><br>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<p class="fb_up_msg">
				<?php
					echo $msg;
				?>	
				</p>
			<hr class="hr5">
			</td>
		</tr>
		<?php } ?>
	</table>
	<a href="index.php"><button class="book_btn">Home</button></a>
</center>

<?php
include_once 'include/a_footer.php';
?>