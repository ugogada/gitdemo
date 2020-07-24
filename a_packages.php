<?php
include_once 'include/admin_header.php';
include_once '../include/condb.php';
if (isset($_POST['ins'])) 
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
			@$name=$_POST['p_id'];
			$ext=explode(".",$_FILES["file"]["name"]);
			$name=$name.'.'.end($ext);
			// echo $name;
			// $img1=uniqid().@$_FILES['file']['name'];
			$ins="Insert into package values('$pid','$pname','$desc','$price','$s_point','$e_point','$day','$name')";
					if(mysqli_query($con,$ins))
					{
						header("location:index.php");
					}
					else
					{
						echo "Error in adding package try again".mysqli_error($con);
					}
			move_uploaded_file($_FILES['file']['tmp_name'],"package/".$name);
			if (move_uploaded_file($_FILES['file']['tmp_name'],"package/".$name) == "false" ) 
			{
				echo '<script language="javascript">';
				echo 'alert("File Not Uploded Successfully")';
				echo '</script>';			
			}
			else
			{
				if (move_uploaded_file($_FILES['file']['tmp_name'],"package/".$name) != "false" ) 
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

<form method="POST" action="a_packages.php" enctype="multipart/form-data">
	<table class="table shad cen">
		<th class="th bk_t2" colspan="3">
			You can add packages from here
		</th>
		<tr>
		<td>
		<center><table  class="p_table">
		 <tr><td>
		 		<label class="booked_margin b_spc"> Enter package id </label> <br> <input type="text" name="p_id" class="r_i b_spc" placeholder="Ex :- p001" required />
		 </td></tr>
		 <tr><td>
		 		<label class="booked_margin b_spc"> Enter package name </label> <br> <input type="text" name="pname" class="r_i b_spc" placeholder="Enter package name" required />
		 </td></tr>
		 <tr>
			<td>
				<label class="booked_margin b_spc"> Enter image </label> <br> 
				<input type="file" id="file" name="file" class="r_i b_spc" placeholder="Enter one image" required>
			</td>
			</tr>
			<tr>
			<td>
				<label class="booked_margin b_spc"> Enter starting point </label> <br> <input type="text" name="s_point" class="r_i b_spc" placeholder="Enter starting point" required />
			</td>
			</tr>		 
			<tr>
			<td>
				<label class="booked_margin b_spc"> Enter ending point </label> <br> <input type="text" name="e_point" class="r_i b_spc" placeholder="Enter ending point" required />
			</td>
			</tr>
			<tr>
			<td>
				<label class="booked_margin b_spc"> Enter Locations </label> <br> <textarea name="desc" class="itext b_spc" placeholder="EX. rajkot,junagadh,surat,.." required > 
				</textarea>
			</td>
			</tr>
			<tr>
			<td>	
				<label class="booked_margin b_spc"> For how many day and night </label> <br> <input type="text" name="d_n" class="r_i b_spc" placeholder="EX: For 2 day and 4 night" required>
			</td>
			</tr>
			<tr>
			<td>	
				<label class="booked_margin b_spc"> Enter price </label> <br> <input type="text" name="price" class="r_i b_spc" placeholder="Enter price of packages" required >
			</td>
		</tr>
		</table></center>
	</table>
	<center><input type="submit" name="ins" value="Add" class="b_back2 mar">
				<a href="pack.php" class="a"> 
					<input type="button" name="a_bus" value="Back" class="b_back mar"> 
				</a></center>
</form>


<?php
	include_once 'include/a_footer.php';
?>