<div class="container-fluid">

	<!-- Untuk Slider -->
	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
	    </ol>
	  <!-- Digunakan Untuk membuat Image Slider -->  
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="PC Room" height="500px">
	    </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </a>
	</div>
	
	<!-- Digunakan Untuk Card menampilkan Barang -->
	<div class="row text-center mt-3">

		<!-- Perulangan untuk menampilkan semua barang -->
		<?php foreach ($ram as $brg) : ?>
			
			<div class="card ml-3 mb-3" style="width: 16rem;">
			  <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" >
			  <div class="card-body">
			    <h5 class="card-title mb-1"><?php echo $brg->nama_barang ?></h5>
			    <small><?php echo $brg->keterangan ?></small><br>
			    <span class="badge bg-success mb-3" style="color: white;">Rp. <?php echo number_format($brg->harga, 0,',','.') ?></span><br>

			    <!-- Tampilkan id_barang untuk button keranjang-->
			    <?php echo anchor('dashboard/tambah_ke_keranjang/' . $brg->id_brg , '<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>

			    <?php echo anchor('dashboard/detail/' . $brg->id_brg , '<div class="btn btn-sm btn-success">Detail</div>') ?>
			  </div>
			</div>
		<?php endforeach; ?>
	
	</div>
</div>