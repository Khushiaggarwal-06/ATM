<html>
<body style="text-align:center;height:225px">
<div style="text-align:center;background-color:pink;border:2px solid black;">
<h1> ATM</h1>
<!--<fieldset>
<legend>ATM</legend>-->
<form action="#" method="post" >
<input type="submit" value="Add" name="pass">
<br><br>
<input type="submit" value="Deposit" name="pass3">
<br><br>
<input type="submit" value="Withdraw" name="pass7">
<br><br>
<input type="submit" value="Id" name="pass19">
<br><br>
</form>
</div>
</body>
<?php

	
if (isset($_POST['pass'])){
echo"<form action='#' method='post' enctype='multipart/form-data'>
			<table>
			<tr><td>name</td><td><input type='text' name='t5'></td></tr>
			<tr><td>Id</td><td><input type='number' name='roll' ></td></tr>
			<tr><td>Salary</td><td><input type='number' name='t2'></td></tr>
			<tr><td>image</td><td><input type='file' name='t3'></td></tr><tr><td>
			<input type='submit' name='pass1' value='edit'></form></td></tr></table>";
		}
	
	
	if(isset($_POST['pass1'])){
	$name=$_POST['t5'];
	$roll=$_POST['roll'];
	$course=$_POST['t2'];
	$c=$_FILES['t3']["name"];
$b=$_FILES['t3']["tmp_name"];
move_uploaded_file($b,"upload/".$c);
	$conn=mysqli_connect("localhost","root","","geet");
	if(!$conn){
	die ("error".mysqli_connect_error());
	}
	$sql1="insert into profile2(name,Id,Salary,Image) values('$name','$roll','$course','$c')";
	if(mysqli_query($conn,$sql1)){
	echo "insertion in table";
	}
	else{
	echo "error".mysqli_error($conn);
	}
	mysqli_close($conn);
}
if(isset($_POST['pass3'])){
	echo"<form action='#' method='post' enctype='multipart/form-data'>
<table><tr><td>Id</td><td><input type='number' name='roll'></td>
<td><input type='submit' name='pass4' value='edit'></form></td>
</tr></form></table>";}
if(isset($_POST['pass4'])){
	$conn3=mysqli_connect("localhost","root","","geet");
	if(!$conn3){
	die("error".mysqli_error());
	}
	$roll=$_POST['roll'];
	$sql3="select * from profile2 where Id='$roll'";
	$result=mysqli_query($conn3,$sql3);
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
	echo"<form action='#' method='post'>
	<table style='border:2px solid black'>
	<tr><td rowspan='3'><img src='upload/".$row['Image']."' height='120px' width='120px'></td>
			<td>name</td><td><input type='text' name='roll' value='".$row['name']."'></td></tr>
			<tr><td>Id</td><td><input type='text' name='t1' value='".$row['Id']."'></td></tr>
			<tr><td>Salary</td><td><input type='text' name='t2' value='".$row['Salary']."'></td></tr>
</table>";
	}
	echo"<form action='#' method='post' >
<table><tr><td>Deposit</td><td><input type='number' name='deposit'></td></tr>
	<tr><td><input type='submit' name='pass9' value='DEPOSIT'> </td></tr></table></form>";
	}
	else{
			echo "no rows in table";
	}
	mysqli_close($conn3);
}	
if(isset($_POST['pass9'])){
	$roll1=$_POST['t1'];
	$course=$_POST['t2'];
	$p=$_POST['deposit'];
	$r=$course+$p;
	$conn4=mysqli_connect("localhost","root","","geet");
	if(!$conn4){
	die ("error".mysqli_connect_error());
	}
	$sql4="update profile2 set Salary='$r' where Id='$roll1'";
	if(mysqli_query($conn4,$sql4)){
	 echo "<form action='#' method='post' >
	<table><tr><td>Deposit</td><td>".$r."</td></tr>
	</table></form>";
	}
	else{
	echo "error".mysqli_error($conn4);
	}
	mysqli_close($conn4);
}

if(isset($_POST['pass7'])){
	echo"<form action='#' method='post' enctype='multipart/form-data'>
<table><tr><td>Id</td><td><input type='number' name='roll'></td>
<td><input type='submit' name='pass13' value='edit'></form></td>
</tr></form></table>";}
if(isset($_POST['pass13'])){
	$conn3=mysqli_connect("localhost","root","","geet");
	if(!$conn3){
	die("error".mysqli_error());
	}
	$roll=$_POST['roll'];
	$sql3="select * from profile2 where Id='$roll'";
	$result=mysqli_query($conn3,$sql3);
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
	echo"<form action='#' method='post'>
	<table style='border:2px solid black'>
	<tr><td rowspan='3'><img src='upload/".$row['Image']."' height='120px' width='120px'></td>
			<td>name</td><td><input type='text' name='roll' value='".$row['name']."'></td></tr>
			<tr><td>Id</td><td><input type='text' name='t1' value='".$row['Id']."'></td></tr>
			<tr><td>Salary</td><td><input type='text' name='t2' value='".$row['Salary']."'></td></tr>
</table>";
	}
	echo"<form action='#' method='post' >
<table><tr><td>Deposit</td><td><input type='number' name='deposit'></td></tr>
	<tr><td><input type='submit' name='pass12' value='WITHDRAW'> </td></tr></table></form>";
	}
	else{
			echo "no rows in table";
	}
	mysqli_close($conn3);
}	
if(isset($_POST['pass12'])){
	$roll1=$_POST['t1'];
	$course=$_POST['t2'];
	$p=$_POST['deposit'];
	$r=$course-$p;
	$conn4=mysqli_connect("localhost","root","","geet");
	if(!$conn4){
	die ("error".mysqli_connect_error());
	}
	$sql4="update profile2 set Salary='$r' where Id='$roll1'";
	if(mysqli_query($conn4,$sql4)){
	echo "
<table><tr><td>Deposit</td><td>".$r."</td></tr>
	</table>";
	}
	else{
	echo "error".mysqli_error($conn4);
	}
	mysqli_close($conn4);
}
if(isset($_POST['pass19'])){
	echo"<form action='#' method='post' >
<table><tr><td>Id</td><td><input type='number' name='deposit'></td></tr>
	<tr><td><input type='submit' name='pass22' value='click me'> </td></tr></table></form>";
	}
if(isset($_POST['pass22'])){
	$conn9=mysqli_connect("localhost","root","","geet");
	if(!$conn9){
	die("error".mysqli_error());
	}
	
	$roll=$_POST['deposit'];
	$sql9="select * from profile2 where Id='$roll'";
	$result=mysqli_query($conn9,$sql9);
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
	echo"<form action='#' method='post'>
	<table style='border:2px solid black'>
	<tr><td rowspan='3'><img src='upload/".$row['Image']."' height='120px' width='120px'></td>
			<td>name</td><td><input type='text' name='roll' value='".$row['name']."'></td></tr>
			<tr><td>Id</td><td><input type='text' name='t1' value='".$row['Id']."'></td></tr>
			<tr><td>Salary</td><td><input type='text' name='t2' value='".$row['Salary']."'></td></tr>
</table>";
	}
	
	}
	else{
			echo "no rows in table";
	}
	mysqli_close($conn9);
}	
?>
</html>