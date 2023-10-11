<?php 
	session_start();
	if(isset($_SESSION['uid'])){
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

<!-- login -->
	<div class="container">
		<div class="card-login">
			
			<h2>LOGIN</h2>
			<form action="" method="POST">
				<input type="text" name="user" placeholder="Username" class="input-control">	
				<input type="password" name="pass" placeholder="Password" class="input-control2">
				<button type="submit" name="login" class="btn">Sign In</button>
			</form>

			<?php 

			// cek jika tombol login di tekan //
			if(isset($_POST['login'])){

				include 'koneksi.php';

				// cek data login //
				$query_select = 'SELECT * FROM tb_user 
				WHERE username = "'.mysqli_real_escape_string($conn, $_POST['user']).'" 
				and password = "'.mysqli_real_escape_string($conn,MD5($_POST['pass'])).'" ';

				$run_query_select = mysqli_query($conn, $query_select);
				$d = mysqli_fetch_object($run_query_select);

				if($d){
					
					// buat session //
					$_SESSION['uid'] 	= $d->id_user;
					$_SESSION['uname'] 	= $d->username;

					header('location:index.php');

				}else{
					echo 'Username atau Password Salah';
				}

			}

			?>

		</div>
	</div>


			</body>
</html>