<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['firstname']);
	$last = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$confirmpwd = mysqli_real_escape_string($conn, $_POST['confirm_pwd']);

	//Error handlers
	//Check for empty fields
		if(empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($pwd)|| empty($confirm_pwd)) {
			header("Location: ../signup.php?signup=empty");
		exit();
	} else {
	//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
		//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?signup=email");
			exit();
		} else {
			$sql = "SELECT * FROM tbl_user WHERE username='$username'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {
				header("Location: ../signup.php?signup=usertaken");
				exit();
			} else {
				//Hashing the pasword - password is unrecognizeable even for the Admin
				$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
				//Insert the user into the database
				$sql = "INSERT INTO tbl_user (firstname, lastname, email, username, pwd, confirm_pwd) VALUES ('$firstname', '$lastname', '$email', '$username', '$hashedPwd' '$hashedPwd');";
				//Result for query sql 
				mysqli_query($conn, $sql);
				header("Location: ../signup.php?signup=success");
				exit();

			}
		}
	}
}

} else {
	header("Location: ../signup.php");
	exit();
}
