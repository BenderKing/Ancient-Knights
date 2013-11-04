<?php
	if($_POST) {
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];	
		if($password != $confirm) { ?>
<span style='color:red'>Error: Passwords do not match!</span>		
<?php	} else {
			$dbhost = 'localhost';
			$dbuser = 'user';
			$dbpass = 'pass';
			$dbname = 'name';
			$conn = mysql_connect($dbhost,$dbuser,$dbpass)
				or die ('Error connecting to mysql');
			mysql_select_db($dbname);
			$query = sprintf("SELECT COUNT(id) FROM users WHERE UPPER(username) = UPPER('%s')",
				mysql_real_escape_string($_POST['username']));
			$result = mysql_query($query);
			list($count) = mysql_fetch_row($result);
			if($count >= 1) { ?>
<span style='color:red'>Error: that username is taken.</span>
<?php		} else {
				$query = sprintf("INSERT INTO users(username,password) VALUES ('%s','%s');",
					mysql_real_escape_string($_POST['username']),
					mysql_real_escape_string(md5($password)));
				mysql_query($query);
			?>
<span style='color:green'>Congratulations, you registered successfully!</span>
<?php
			}	
		}
	}
?>
<form method='post' action='register.php'>Username: <input type='text' name='username' /><br />
Password: <input type='password' name='password' /><br />
Confirm Password: <input type='password' name='confirm' /><br />
<input type='submit' value='Register!' />
</form>
