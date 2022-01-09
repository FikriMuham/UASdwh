<?php 
session_start();
include('koneksi.php');
?>

<?php 
	if(isset($_POST["tambah_motor"])){
		$nama      	= $_POST["nama"];
		$harga     	= $_POST["harga"];
		$merek      = $_POST["merek"];
		$ukuran    	= $_POST["ukuran"];
		$model 		= $_POST["model"];
		$garansi    = $_POST["garansi"];
		
		$harga_angka = $merek_angka = $ukuran_angka = $model_angka = $garansi_angka = 0;

		if($harga < 6000000){
			$harga_angka = 3;
		} 
		elseif($harga >= 7000000 && $harga <= 16000000){
			$harga_angka = 2;
		}
		elseif($harga > 17000000 ){
			$harga_angka = 1;
		}


		if($merek == "Yamaha"){
			$merek_angka = 2;
		}
		elseif($merek == "Honda"){
			$merek_angka = 3;
		}
		elseif($merek == "Kawasaki"){
			$merek_angka = 1;
		}


		if($ukuran == "Besar"){
			$ukuran_angka = 1;
		}
		elseif($ukuran == "Sedang"){
			$ukuran_angka = 2;
		}
		elseif($ukuran == "Kecil"){
			$ukuran_angka = 3;
		}
		


		if($model == "Sport"){
			$model_angka = 1;
		}
		elseif($model == "Standar" && $model == "Matic"){
			$model_angka = 3;
		}
		elseif($model == "Bebek"){
			$model_angka = 5;
		}


		if($garansi >= 3 && $garansi <= 6 ){
			$garansi_angka = 1;
		}
		elseif($garansi >= 7 && $garansi <= 12){
			$garansi_angka = 2;
		}
		elseif($garansi > 12){
			$garansi_angka = 3;
		}

		$sql = "INSERT INTO `data_motor` (`id_motor`, `nama_motor`, `harga_motor`, `merek_motor`, `ukuran_motor`, `model_motor`, `garansi`, `harga_angka`, `merek_angka`, `ukuran_angka`, `model_angka`, `garansi_angka`) 
				VALUES (NULL, :nama_motor, :harga_motor, :merek_motor, :ukuran_motor, :jenis_motor, :garansi, :harga_angka, :merek_angka, :ukuran_angka, :model_angka, :garansi_angka)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':nama', $nama);
		$stmt->bindValue(':harga', $harga);
		$stmt->bindValue(':merek', $merek);
		$stmt->bindValue(':ukuran', $ukuran);
		$stmt->bindValue(':model', $model);
		$stmt->bindValue(':garansi', $garansi);
		$stmt->bindValue(':harga_angka', $harga_angka);
		$stmt->bindValue(':merek_angka', $merek_angka);
		$stmt->bindValue(':ukuran_angka', $ukuran_angka);
		$stmt->bindValue(':model_angka', $model_angka);
		$stmt->bindValue(':garansi_angka', $garansi_angka);
		$stmt->execute();
	}

	if(isset($_POST["hapus_motor"])){
		$id_hapus_motor = $_POST['id_hapus_motor'];
		$sql_delete = "DELETE FROM `data_motor` WHERE `id_motor` = :id_hapus_motor";
		$stmt_delete = $db->prepare($sql_delete);
		$stmt_delete->bindValue(':id_hapus_motor', $id_hapus_motor);
		$stmt_delete->execute();
		$query_reorder_id=mysqli_query($selectdb,"ALTER TABLE data_motor AUTO_INCREMENT = 1");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan Pemilihan Motor</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="assets/dataTable/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="assets/dataTable/jquery.dataTables.min.js"></script>

</head>
<body>
	<div class="navbar-fixed">
	<nav>
    	<div class="container">
					
						<div class="nav-wrapper">
								<ul class="left" style="margin-left: -52px;">
									<li><a href="index.php">HOME</a></li>
									<li><a href="rekomendasi.php">REKOMENDASI</a></li>
									<li><a class="active" href="daftar_motor.php">DAFTAR MOTOR</a></li>
									<li><a href="#about">TENTANG</a></li>
								</ul>
						</div>
					
        </div>
		</nav>
		</div>
		<!-- Body Start -->

		<!-- Daftar motor Start -->
	<div style="background-color: #efefef">
		<div class="container">
		    <div class="section-card" style="padding: 40px 0px 20px 0px;">
				<ul>
				    <li>
						<div class="row">
						<div class="card">
								<div class="card-content">
									<center><h4 style="margin-bottom: 0px; margin-top: -8px;">Daftar Motor</h4></center>
									<table id="table_id" class="hover dataTablesCustom" style="width:100%">
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>No </center></th>
													<th><center>Nama Motor</center></th>
													<th><center>Harga Motor</center></th>
													<th><center>Model Motor</center></th>
													<th><center>Ukuran</center></th>
													<th><center>Jenis</center></th>
													<th><center>Garansi</center></th>
													<th><center>Hapus</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM data_motor");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td><center><?php echo $data['nama_motor'] ?></center></td>
													<td><center><?php echo "Rp. ", $data['harga_motor'] ?></center></td>
													<td><center><?php echo $data['merek_motor'] ?></center></td>
													<td><center><?php echo $data['ukuran_motor'] ?></center></td>
													<td><center><?php echo $data['model_motor'] ?></center></td>
													<td><center><?php echo $data['garansi']," Bulan"  ?></center></td>
													<td>
														<center>
															<form method="POST">
																<input type="hidden" name="id_hapus_motor" value="<?php echo $data['id_motor'] ?>">
																<button type="submit" name="hapus_motor" style="height: 32px; width: 32px;" class="btn-floating btn-small waves-effect waves-light red"><i style="line-height: 32px;" class="material-icons">remove</i></button>
															</form>
														</center>
													</td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
									
							</div>
							
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>
	<!-- Daftar motor End -->

	<!-- Daftar motor Start -->
	<div style="background-color: #efefef">
		<div class="container">
		    <div class="section-card" style="padding: 1px 20% 24px 20%;">
				<ul>
				    <li>
						<div class="row">
							<div class="card">
								<div class="card-content" style="padding-top: 10px;">
									<center><h5 style="margin-bottom: 10px;">Analisa Motor</h5></center>
									<table class="responsive-table">
									
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>Alternatif</center></th>
													<th><center>C1 (Cost)</center></th>
													<th><center>C2 (Benefit)</center></th>
													<th><center>C3 (Benefit)</center></th>
													<th><center>C4 (Benefit)</center></th>
													<th><center>C5 (Benefit)</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM data_motor");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $data['harga_angka'] ?></center></td>
													<td><center><?php echo $data['merek_angka'] ?></center></td>
													<td><center><?php echo $data['ukuran_angka'] ?></center></td>
													<td><center><?php echo $data['model_angka'] ?></center></td>
													<td><center><?php echo $data['garansi_angka'] ?></center></td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
							</div>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>
	<!-- Daftar motor End -->

	<!-- Modal Start -->
	
		
		
	<!-- Modal End -->

	<!-- Modal Start -->
	<div id="about" class="modal">
		<div class="modal-content">
			<h4>Tentang</h4>
			<p>Sistem Pendukung Keputusan Pemilihan Motor ini menggunakan metode TOPSIS yang dibangun menggunakan bahasa PHP.
				 <br>
				<br>
				1. Muhammad Fikri (19090126)<br>
			</p>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
		</div>
	</div>
	<!-- Modal End -->

    <!-- Body End -->

    <!-- Footer Start -->
	<div class="footer-copyright" style="padding: 0px 0px; background-color: white">
      <div class="container">
        <p align="center" style="color: #999">&copy; Sistem Pendukung Keputusan Pemilihan Motor 2021.</p>
      </div>
    </div>
    <!-- Footer End -->
    <script type="text/javascript">
	  	$(document).ready(function(){
		$('.parallax').parallax();
		$('.modal').modal();
		$('#table_id').DataTable({
    		"paging": false
		});
	    });
	</script>
</body>
</html>