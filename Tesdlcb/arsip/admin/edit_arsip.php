<?php  
	include '../koneksi.php';

	$query_select = 'select * from tb_arsip where id_arsip = "'.$_GET['id'].'" ';
	$run_query_select = mysqli_query($conn, $query_select);
	$d = mysqli_fetch_object($run_query_select);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style.css">
	<title>Tambah Arsip</title>
</head>
<body>

</body>
</html>
<div class="content">
	<div class="container">

		<h3 class="page-title">TAMBAH ARSIP SURAT</h3>

		<div class="card">
				
				<form action="" method="post" enctype="multipart/form-data">
					
					<div class="input-group">
						<label>Nama Arsip</label>
						<input type="text" name="nomor" placeholder="Nomor Surat" class="input-control" autocomplete="off" value="<?= $d->nama_arsip ?>" required>
					</div>

					<div class="input-group">
						<label>Isi</label>
						<input type="text" name="perihal" placeholder="Perihal" class="input-control" autocomplete="off" required>
					</div>

					<div class="input-group">
						<label>Isi</label>
						<input type="text" name="asalsurat" placeholder="Asal Surat" class="input-control" autocomplete="off" value="<?= $d->file_arsip ?>" required>
					</div>

					<div class="input-group">
						<label>Kategori</label>
						<select class="input-control" name="category">
							<option value="">Pilih</option>
							<option value="SPT" >SPT</option>
							<option value="SK" >SK</option>
							<option value="SP" >SP</option>
						</select>
					</div>

					<div class="input-group">
						<button type="button" onclick="window.location.href = 'arsip.php'" class="btn-back">Kembali</button>
						<button type="submit" name="submit" class="btn-submit">Simpan</button>
					</div>

				</form>

				<?php 

					if(isset($_POST['submit'])){

						// product data insert proccess //

						//JAN LUPA GANTI GANTI SESUAI DTBS MU //
						$query_update = 'update tb_arsip set 
						nama_arsip = "'.$_POST['nomor'].'",
						kategori = "'.$_POST['category'].'",
						file_arsip ="'.$_POST['asalsurat'].'"
						where id_arsip = "'.$_GET['id'].'" ';

						$run_query_update = mysqli_query($conn, $query_update);

						if(!$run_query_update){
							echo 'Edit Data Failed' . mysqli_error($conn);
							exit();
						}
						
						echo 'Save Data Successfull';

					}	

				?>
	</div>
</div>


</body>
</html>