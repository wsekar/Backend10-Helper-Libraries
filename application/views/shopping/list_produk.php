<h2>Daftar Produk</h2>
<?php
foreach ($produk as $produks) {
?>
  <div class="col-lg-4 col-md-6 mb-4">
    <div class="kotak">
      <form method="post" action="<?php echo base_url(); ?>shopping/tambah" method="post" accept-charset="utf-8">
        <a href="#"><img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/' . $produks['gambar_produk']; ?>" /></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#"><?php echo $produks['nama_produk']; ?></a>
          </h4>
          <h5>Rp. <?php echo number_format($produks['harga_produk'], 0, ",", "."); ?></h5>
          <p class="card-text"><?php echo $produks['deskripsi_produk']; ?></p>
        </div>
        <div class="card-footer">
          <a href="<?php echo base_url(); ?>shopping/detail_produk/<?php echo $produks['id_produk']; ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search"></i> Detail</a>

          <input type="hidden" name="id" value="<?php echo $produks['id_produk']; ?>" />
          <input type="hidden" name="nama" value="<?php echo $produks['nama_produk']; ?>" />
          <input type="hidden" name="harga" value="<?php echo $produks['harga_produk']; ?>" />
          <input type="hidden" name="gambar" value="<?php echo $produks['gambar_produk']; ?>" />
          <input type="hidden" name="qty" value="1" />
          <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
        </div>
      </form>
    </div>
  </div>
<?php
}
?>