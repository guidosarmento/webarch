<?php

session_start();

if (isset($_POST['submit'])) {

	include 'dbh.inc.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../archivefiles.php?login=empty");
		exit();

	} else {
		$sql = "SELECT * FROM tbl_user WHERE username='$username' OR email='$email'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../archivefiles.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				echo $row['username'];
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: ../archivefiles.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Login the user here
					$_SESSION['id'] = $row['id'];
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['lastname'] = $row['lastname'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['username'] = $row['username'];
					header("Location: ../archivefiles.php?login=success");
					exit();
				}				
			}
		}
	}
} else {
	header("Location: ../archivefiles.php?login=error");
	exit();
}