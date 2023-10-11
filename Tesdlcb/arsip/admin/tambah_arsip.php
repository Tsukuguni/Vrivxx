<?php  
	include '../koneksi.php';
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
						<input type="text" name="nomor" placeholder="Nomor Surat" class="input-control" autocomplete="off" required>
					</div>

					<div class="input-group">
						<label>Isi</label>
						<input type="text" name="perihal" placeholder="Perihal" class="input-control" autocomplete="off" required>
					</div>

					<div class="input-group">
						<label>Isi</label>
						<input type="text" name="asalsurat" placeholder="Asal Surat" class="input-control" autocomplete="off" required>
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
						$query_insert = 'insert into tb_arsip
						(nama_arsip, kategori, file_arsip) value (
						"'.$_POST['nomor'].'",		
						"'.$_POST['category'].'",   
						"'.$_POST['asalsurat'].'"
						)';

						$run_query_insert = mysqli_query($conn, $query_insert);

						if(!$run_query_insert){
							echo 'Save Data Failed' . mysqli_error($conn);
							exit();
						
						echo 'Save Data Successfull';

					}
				}

				?>
	</div>
</div>


</body>
</html>