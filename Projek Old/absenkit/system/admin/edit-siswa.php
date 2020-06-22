<?php 
//panggil file session-admin.php untuk menentukan apakah admin atau bukan
include('system/inc/session-admin.php');
//panggil file conn.php untuk menghubung ke server
include('system/config/conn.php');
//panggil file header.php untuk menghubungkan konten bagian atas
include('system/inc/header.php');
//memberi judul halaman
echo '<title>Edit Siswa - Absen Kit</title>';
//panggil file css.php untuk desain atau tema
include('system/inc/css.php');
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
include('system/inc/nav-admin.php');
//mendapatkan informasi untuk mengedit data
$id_siswa = $_GET['id'];
$query = mysql_query("SELECT * FROM siswa WHERE id_siswa='$id_siswa'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>

	<div class="page-content">
		<div class="container-fluid">
	
			<section class="card">
				<h6 align="center" class="with-border m-t-lg"><strong>EDIT SISWA</strong></h6>	
				<div class="card-block">
					<div class="row">  
						<form id="form-insert" name="form-insert" action="page.php?process-edit-siswa" enctype="multipart/form-data" method="POST">
							<input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>" />
							<div class="col-md-6">
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-nama"><i class="font-icon font-icon-user"></i> Nama</label>
									<div class="form-control-wrapper">
										<input id="insert-nama" value="<?php echo $data['nama']; ?>" class="form-control" name="nama" placeholder="Nama Siswa" type="text"
										data-validation="[L>=1]"
										data-validation-message="Nama Siswa Tidak Boleh Kosong">
									</div>
								</div>
								
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-nis"><i class="font-icon font-icon-contacts"></i> NIS</label>
									<div class="form-control-wrapper">
										<input id="insert-nis" value="<?php echo $data['nis']; ?>" class="form-control" name="nis" placeholder="NIS Siswa" type="text"
										data-validation="[L>=1]"
										data-validation-message="NIS Siswa Tidak Boleh Kosong">
									</div>
								</div>
								
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-kelas"><i class="font-icon font-icon-learn"></i>  Kelas</label>
									<div class="form-control-wrapper">	
										<select  class="bootstrap-select" name="nm_kelas">
										<option value="<?php  echo $data['nm_kelas']; ?>"><?php  echo $data['nm_kelas']; ?></option>
										<?php 
										$query=mysql_query("SELECT * FROM kelas ORDER BY nm_kelas ASC",$connect);
										while($row=mysql_fetch_array($query)){
										?>
										<option value="<?php  echo $row['nm_kelas']; ?>"><?php  echo $row['nm_kelas']; ?></option>
										<?php 
										}
										?>
										</select>	
									</div>
								</div>
								
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-jns_kel"><i class="font-icon font-icon-users"></i> Jenis Kelamin</label>
									<div class="form-control-wrapper">
										<select class="bootstrap-select" name="jns_kel" >
										<option value="<?php echo $data['jns_kel']; ?>"  selected/ ><?php echo $data['jns_kel']; ?></option>
										<option value="Laki-Laki">Laki-Laki </option>
										<option value="Perempuan">Perempuan </option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-alamat"><i class="font-icon font-icon-home"></i> Alamat</label>
									<div class="form-control-wrapper">
										<input id="insert-alamat" value="<?php echo $data['alamat']; ?>" class="form-control" name="alamat" placeholder="Alamat Siswa" type="text"
										data-validation="[L>=1]"
										data-validation-message="Alamat Siswa Tidak Boleh Kosong">
									</div>
								</div>
							</div><!--.col-md-6-->
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-tmpt_lahir"><i class="font-icon font-icon-pin-2"></i> Tempat Lahir</label>
									<div class="form-control-wrapper">
										<input id="insert-tmpt_lahir" value="<?php echo $data['tmpt_lahir']; ?>" class="form-control" name="tmpt_lahir"  placeholder="Tempat Lahir Siswa" type="text"
										data-validation="[L>=1]"
										data-validation-message="Tempat Lahir Siswa Tidak Boleh Kosong">
									</div>
								</div>
								
								<div class="form-group">
									<label class="color-blue-grey-lighter" for="insert-tgl_lahir"><i class="font-icon font-icon-calend"></i> Tanggal Lahir</label>
									<div class="form-control-wrapper">
										<input class="form-control" id="daterange3" type="text" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>"
										data-validation="[L>=1]"
										data-validation-message="Tanggal Lahir Siswa Tidak Boleh Kosong">
									</div>
								</div>
								
								<div class="form-group">
									<br>
									<div class="form-control-wrapper">
										<div class="drop-zone">
										<div class="avatar-preview avatar-preview-64">
											<img src="<?php echo $data['foto']; ?>" >
										</div>
										<br><br>
										<div class="drop-zone-caption">Ganti Foto Siswa</div>
											<span class="btn btn-rounded btn-file"><span>Cari Foto</span>
											<input  name="file" type="file" id="file" >
											</span>
										</div>
									</div>
								</div>
							</div><!--.col-md-6-->
							
							<div class="col-md-12 m-t-lg">
								<div class="form-group" align="center">
									<div class="btn-group" role="group">
										<button type="submit" class="btn btn-default font-icon font-icon-pencil" data-toggle="tooltip" data-placement="top" title="Edit?"></button>
										<a href="page.php?delete-siswa&id=<?php echo $data['id_siswa'];?>" onClick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-default font-icon font-icon-trash" data-toggle="tooltip" data-placement="top" title="Hapus?"></a>
										<a href="javascript:history.back()" class="btn btn-default font-icon font-icon-refresh-2" data-toggle="tooltip" data-placement="top" title="Kembali?"></a>
									</div>
								</div>
							</div><!--.col-md-12-->
						</form>
					</div><!--.row-->
				</div><!--.card-block-->
			</section>
		
		</div><!--.container-fluid-->
	</div><!--.page-content-->	

<?php 
//panggil file footer.php untuk menghubungkan konten bagian bawah
include('system/inc/footer.php');
?>	

 <!-- AbsenKit (absensi siswa berbasis web)
 ********************************************
 * Created      : Husni Mubarok				*
 * Release Date : 28 Februari 2017			*
 * E-mail       : cusnix@gmail.com			*
 * Phone        : (+62)82214121989			*
 * BBM          : D38EC5FB					*
 * Facebook     : fb.me/cusnix				*
 ********************************************
 -->