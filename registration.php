<?php
include 'include/admin_header.php';
?>
<br>

<table class="table">
<th>
			<center><h1 class="font color2 bold"> Sign Up Now </h1></center>
			<hr>
</th>
<table class="table t_font shad">
<form method="POST" action="reg_ins_db.php">
	<tr>
		<td>
			<strong>First Name : </strong><br>
			<input type="text" name="FName" class="r_i" placeholder="Enter First Name" required>
				
		</td>
		<td>
			<strong>Lirst Name : </strong><br>
			<input type="text" name="LName" class="r_i" placeholder="Enter Lirst Name" required>
		</td>
		<td>
			<strong>Email : </strong><br>
			<input type="email" name="email" id="emv" class="r_i" placeholder="Enter Email ID" required  onblur="ev(this)">
		</td>
	</tr>
	<tr>
		<td>
			<strong>Password : </strong><br>
			<input type="Password" name="passwd" id="pass" class="r_i" placeholder="Enter Password" required  onblur="pv(this)">	
		</td>
		<td>
			<strong>Re-Password : </strong><br>
			<input type="Password" name="cpasswd" class="r_i" id="cpass" placeholder="Confirm Password" required  onblur="cpv(this)">
		</td>
		<td>
			<strong>Gender : </strong><br>
			<input type="radio" name="gender" value="male" class="radio" required>Male <input type="radio" name="gender" value="female" class="radio" required>Female <input type="radio" name="gender" value="other" class="radio" required>Other
		</td>
	</tr>
	<tr>
		<td>
			<strong>Age : </strong><br>
			<input type="text" name="age" class="r_i" id="ans" placeholder="Enter Your age" required onblur="ag(this)">	
		</td>
		<td>
			<strong>Phon No : </strong><br>
			<input type="text" name="mno" class="r_i" id="mnm" placeholder="Enter Your Phon No" required  onblur="mo(this)">
		</td>

		<td rowspan="2">
			<strong>Address : </strong><br>
			<textarea class="itext r_i" name="add"  placeholder="Enter Your Address" required></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<strong>Date Of Birth : </strong><br>
			<input type="Date" name="dob" class="r_i" placeholder="DD/MM/YYYY" required>	
		</td>
		<td>
			<strong>City : </strong><br>
			<input type="text" name="city" class="r_i" placeholder="Enter Your City">
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<input type="submit" name="submit" value="add" class="botn">
		</td>
	</tr>
	</form>
</table>
<br><br>
<?php
include 'include/a_footer.php';
?>
</body>
</html>