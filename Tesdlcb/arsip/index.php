<?php
session_start();
	if(!isset($_SESSION['uid'])){
		header('location:login.php');
	}
include 'koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="style.css">
	<title>Halaman Utama</title>
</head>
<body>


<!-- navbar -->
	<div class="navbar">
		<a href="#" id="btnBars">
			<i class="fa fa-bars"></i>
		</a>
	</div>

	<!-- sidebar -->
	<div class="sidebar sidebar-hide">
		<div class="sidebar-body">
			
			<h2>Kategori</h2>
			<ul>
				<li><a href="user.php">Daftar Admin</a></li>
				<li><a href="admin/arsip.php">Daftar Arsip</a></li>
				<li><a href="logout.php">Log Out</a></li>

		</div>
	</div>


<script type="text/javascript">
		
		var btnBars = document.getElementById('btnBars')
		var sidebar = document.querySelector(".sidebar")

		btnBars.addEventListener('click', function(e){
			e.preventDefault();

			sidebar.classList.toggle('sidebar-show')

		})

	</script>

</body>
</html>