<?php
include_once 'include/admin_header.php';
include_once '../include/condb.php';
ob_start();
	
if (isset($_POST['edit'])) 
{
		
		$pid=@$_POST['p_id'];
		$pname=@$_POST['pname'];
		$desc=@$_POST['desc'];
		$price=@$_POST['price'];
		$s_point=@$_POST['s_point'];
		$e_point=@$_POST['e_point'];
		$day=@$_POST['d_n'];

		if (@$_FILES['file']['name'] != "") 
		{
			// $img1=uniqid().@$_FILES['file']['name'];
			@$img1=$_POST['p_id'];
			$ext=explode(".",$_FILES["file"]["name"]);
			$img1=$img1.'.'.end($ext);
			$edt="update package set name='$pname',description='$desc',price='$price',start_point='$s_point',end_point='$e_point',day='$day',image='$img1' where id='$pid'";
					if(mysqli_query($con,$edt))
					{
						header("location:index.php");
					}
					else
					{
						echo "Error in updating package try again".mysqli_error($con);
					}
			move_uploaded_file($_FILES['file']['tmp_name'],"package/".$img1);
			if (move_uploaded_file($_FILES['file']['tmp_name'],"package/".$img1) == "false" ) 
			{
				echo '<script language="javascript">';
				echo 'alert("File Not Uploded Successfully")';
				echo '</script>';			
			}
			else
			{
				if (move_uploaded_file($_FILES['file']['tmp_name'],"package/".$img1) != "false" ) 
					{
						echo '<script language="javascript">';
						echo 'alert("File Uploded Successfully")';
						echo '</script>';
					}
			}
		}
		else
		{
				echo '<script language="javascript">';
				echo 'alert("File does not selected")';
				echo '</script>';
		}
}
?>

<form method="POST" action="e_packages.php" enctype="multipart/form-data">
	<table class="table shad cen">
		<th class="th bk_t2" colspan="3">
			You can edit packages from here
		</th>
		<tr>
		<td>
<center>
	<?php 
			$fid=@$_POST['select_id'];
				$u=mysqli_query($con,"select * from package where id='$fid'");

			while($r = mysqli_fetch_assoc($u))
			{
				$fid=$r['id'];
				$fpname=$r['name'];
				$fimg=$r['image'];
				$fs_point=$r['start_point'];
				$fe_point=$r['end_point'];
				$fdesc=$r['description'];
				$fprice=$r['price'];
				$fday=$r['day'];

			} 
		?>
		<table  class="p_table">
		 <tr><td>
		 		<label class="booked_margin b_spc"> Enter package id </label> <br> <input type="text" name="p_id" class="r_i b_spc" readonly value="<?php echo $fid; ?>" required />
		 </td></tr>
		 <tr><td>
		 		<label class="booked_margin b_spc"> Enter package name </label> <br> <input type="text" name="pname" class="r_i b_spc" value="<?php echo $fpname; ?>" required />
		 </td></tr>
		 <tr>
			<td><img src='package/<?php echo $fimg; ?>' width='100px' height='100px' style="border-radius:100px;"><br>
				<label class="booked_margin b_spc"> Enter image </label> <br> 
				<input type="file" id="file" name="file" class="r_i b_spc" required>
			</td>
			</tr>
			<tr>
			<td>
				<label class="booked_margin b_spc"> Enter starting point </label> <br> <input type="text" name="s_point" class="r_i b_spc" value="<?php echo $fs_point; ?>"  required />
			</td>
			</tr>		 
			<tr>
			<td>
				<label class="booked_margin b_spc"> Enter ending point </label> <br> <input type="text" name="e_point" class="r_i b_spc" value="<?php echo $fe_point; ?>" required />
			</td>
			</tr>
			<tr>
			<td>
				<label class="booked_margin b_spc"> Enter Locations </label> <br> <textarea name="desc" class="itext b_spc" required >
					<?php echo $fdesc; ?>
				</textarea>
			</td>
			</tr>
			<tr>
			<td>	
				<label class="booked_margin b_spc"> For how many day and night </label> <br> <input type="text" name="d_n" class="r_i b_spc" value="<?php echo $fday; ?>" required>
			</td>
			</tr>
			<tr>
			<td>	
				<label class="booked_margin b_spc"> Enter price </label> <br> <input type="text" name="price" class="r_i b_spc" value="<?php echo $fprice; ?>" required >
			</td>
		</tr>
		</table>
	</center>
	</table>
		<center>
			<input type="submit" name="edit" value="Update" class="b_back2 mar">
				<a href="pack.php" class="a"> 
					<input type="button" name="a_bus" value="Back" class="b_back  mar"> 
				</a>
		</center>
</td></tr></table></form>
<?php
	include_once 'include/a_footer.php';
?>