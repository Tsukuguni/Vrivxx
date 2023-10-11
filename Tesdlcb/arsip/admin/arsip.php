<?php 

include '../koneksi.php';

	$query_select = 'select * from tb_arsip';
	$run_query_select = mysqli_query($conn, $query_select);


	// check if there is a delete parameter //
	if(isset($_GET['delete'])){

		// process deleting data
		$query_delete = 'delete from tb_arsip where id_arsip = "'.$_GET['delete'].'" ';
		$run_query_delete = mysqli_query($conn, $query_delete);

		if($run_query_delete){
			echo "<script>window.location = 'arsip.php' </script>";
		}else{
			echo "<script>alert(Failed to Delete Data)</script";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forum Admin</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<link rel="stylesheet" href="../style.css">
</body>
</html>

<div class="content">
	<div class="container">

		<h3 class="page-title">DATA ARSIP SURAT</h3>

		<div class="card">
				<a href="tambah_arsip.php" class="btn" title="Add Data"><i class="fa fa-plus"></i></a>
			<table class=" table">
				<thead>
					<tr>
						<th width="50">NO</th>
						<th>NAMA SURAT</th>
						<th>FILE SURAT</th>
						<th>KATEGORI</th>
						<th>TANGGAL SURAT</th>
						<th width="100">AKSI</th>
					</tr>
				</thead>
				<tbody>

					<?php if(mysqli_num_rows($run_query_select) > 0){ ?>

						<?php $nomor = 1 ?>
					<?php while($row = mysqli_fetch_array($run_query_select)){ ?>

					<tr>
						<td align="center"><?= $nomor++ ?></td>
						<td><?= $row['nama_arsip'] ?></td>
						<td><?= $row['file_arsip'] ?></td>
						<td><?= $row['kategori'] ?></td>
						<td><?= $row['tglblnthn'] ?></td>
						<td align="center">
							<a href="edit_arsip.php?id=<?= $row['id_arsip'] ?>" class="btn" title="Edit Data"><i class="fa fa-edit"></i></a>
							<a href="?delete=<?= $row['id_arsip'] ?>" class="btn" onclick="return confirm(
							'Are you sure want to Delete this User?')" title="Delete Data"><i class="fa fa-times"></i></a>

						</td>
					</tr>
					
				<?php }}else{ ?><tr>
						<td colspan="6">No Data</td>
					</tr><?php } ?>
				</tbody>
			</table>	

		</div>

		

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
				<li><a href="arsip.php">Daftar Arsip</a></li>
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

	