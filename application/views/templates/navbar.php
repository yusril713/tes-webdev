<!-- Navigation -->
 <div class="row">   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>home">Pemesanan Makanan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url(); ?>home">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php if (($this->session->userdata('level') === 'admin') or ($this->session->userdata('level') === 'pelayan')) {?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>daftar-makanan">Makanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>daftar-minuman">Minuman</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>buat-pesanan"">Buat Pesanan</a>
            </li><?php }?>

            <?php if (($this->session->userdata('level') === 'admin') or ($this->session->userdata('level') === 'kasir')) {?>
            <li class="nav-item">
              <a class="nav-link" href="#">Lihat Pesanan</a>
            </li><?php }?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>logout">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav></div>