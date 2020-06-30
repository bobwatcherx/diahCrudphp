<center><h3>18 ti d6 php</h3></center>
<h2>Login</h2>
<form method="post">
	<div class="input">
		<label>Username</label>
		<input type="user" name="user" value="admin"/>
	</div>
	<div class="input">
		<label>Password</label>
		<input type="password" name="password" value="admin"/>
	</div>
	<div class="submit">
		<input type="submit" name="submit" value="Login" /
>
	</div>
</form>
<?php

session_start();

include_once 'koneksi.php';

if (isset($_POST['submit']))
{
	$user = $_POST['user'];
	$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE username = '{$user}'
AND password = md5('{$password}') ";
// 	$sql = "SELECT * FROM users WHERE username = '{$user}'
// AND password = 'md5{$password}' ";
	$result = mysqli_query($conn, $sql);
	if ($result && mysqli_affected_rows($conn) != 0)
	{
		$_SESSION['isLogin'] = true;
		$_SESSION['user'] = mysqli_fetch_array($result);

		header('location: index.php');
	} else
		$errorMsg = "<p style=\"color:red;\">Gagal Login,
silakan ulangi lagi.</p>";
}

include_once "header.php";

if (isset($errorMsg)) echo $errorMsg;

?>
