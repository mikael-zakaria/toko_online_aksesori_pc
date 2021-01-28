<div class="container-fluid">
	
	<!-- Fitur Tambah Barang dengan button dan modal id="tambah_barang" -->
	<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>

	<!-- Menampilkan Daftar Barang dari Database -->
	<table class="table table-bordered mt-3">
		<tr>
			<th>NO</th>
			<th>NAMA BARANG</th>
			<th>KETERANGAN</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th colspan="2">AKSI</th>
		</tr>

		<!-- Menampilkan Daftar Barang dari Database -->
		<?php $no=1; ?>
		<?php foreach($barang as $brg) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $brg->nama_barang ?></td>
				<td><?php echo $brg->keterangan ?></td>
				<td><?php echo $brg->kategori ?></td>
				<td><?php echo $brg->harga ?></td>
				<td><?php echo $brg->stok ?></td>

        <!-- Digunakan untuk Mengedit Data Barang -->
        <td><?php echo anchor('admin/data_barang/edit/'. $brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
				
        <!-- Digunakan untuk Menghapus Data Barang -->
        <td><?php echo anchor('admin/data_barang/hapus/'. $brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>

	</table>

</div>

<!-- Modal Untuk Tambah Barang id="tambah_barang"-->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Untuk body modal --> 
      <div class="modal-body">
      	<!-- Untuk Formulir pengisian tambah barang -->
        <form action="<?php echo base_url().'admin/data_barang/tambah_barang' ?>" method="post" enctype="multipart/form-data">
        	
        	<div class="form-group">
        		<label>Nama Barang</label>
        		<input type="text" name="nama_barang" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Keterangan</label>
        		<input type="text" name="keterangan" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Kategori</label>
        		<select class="form-control" name="kategori">
              <option>RAM</option>
              <option>SSD</option>
              <option>MOUSE</option>   
            </select>
        	</div>

        	<div class="form-group">
        		<label>Harga</label>
        		<input type="text" name="harga" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Stok</label>
        		<input type="text" name="stok" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Gambar Produk</label><br>
        		<input type="file" name="gambar" class="form-control">
        	</div>
        
      </div>

        <!-- Submit -->
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary">Simpan Data</button>
	      </div>
      
      </form>
    
    </div>
  </div>
</div>