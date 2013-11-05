<?php
	session_start();
	if($_POST) {
		require_once 'config.php';
		$username = $_POST['username'];
		$password = $_POST['password'];		
		$conn = mysql_connect($dbhost,$dbuser,$dbpass)
			or die ('Error connecting to mysql');
		mysql_select_db($dbname);
		$query = sprintf("SELECT COUNT(id) FROM users WHERE UPPER(username) = UPPER('%s') AND password='%s'",
			mysql_real_escape_string($username),
			mysql_real_escape_string(md5($password)));
		$result = mysql_query($query);
		list($count) = mysql_fetch_row($result);
		if($count == 1) {
			$_SESSION['authenticated'] = true;
			$_SESSION['username'] = $username;
			$query = sprintf("UPDATE users SET last_login = NOW() WHERE UPPER(username) = UPPER('%s') AND password = '%s'",
				mysql_real_escape_string($username),
				mysql_real_escape_string(md5($password)));
			mysql_query($query);
			$query = sprintf("SELECT is_admin FROM users WHERE UPPER(username) = UPPER('%s') AND password='%s'",
				mysql_real_escape_string($username),
				mysql_real_escape_string(md5($password)));
			$result = mysql_query($query);
			list($is_admin) = mysql_fetch_row($result);
			if($is_admin == 1) {
				header('Location:admin.php');			
			} else {
				header('Location:index.php');				
			}
		} else {	?>
<span style='color:red'>Error: that username and password combination does not match any currently within our database.</span>
<?php	}
	}
?>
<form action='login.php' method='post'>
Username: <input type='text' name='username' /><br />
Password: <input type='password' name='password' /><br />
<input type='submit' value='Login' />
</form>
