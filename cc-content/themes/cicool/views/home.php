<?= get_header(); ?>

<body id="page-top">
   <?= get_navigation(); ?>

   <body>
      <div class="header-content text-center" style="padding: 10% 0;">
         <div class="header-content-inner">
            <h2 id="homeHeading">Selamat datang di website BPR Arsham Sejahtera</h2>
            <hr>
            <p>BPR Arsham Sejahtera adalah perbankan yang sangat maju. Kami siap melyani anda.</p>
            <br>
         </div>
      </div>
      <h3 class="text-center">Produk dan Layanan</h3><br>
      <div class="row text-center">
         <?php foreach ($produks as $produk): ?>
            <div class="col-sm-4">
               <a class="text-black" rel="group" href="<?= BASE_URL . 'uploads/produk/' . $produk->photo; ?>">
                  <?= $produk->nama_produk ?><br>
                  <img src="<?= BASE_URL . 'uploads/produk/' . $produk->photo; ?>" class="image-responsive"
                     alt="image produk" title="photo produk">
               </a>
            </div>
         <?php endforeach; ?>
      </div>
      <footer style="background-color: #4fb84d; margin-top: 50px;">
         <p class="text-center text-faded" style="padding: 10px;">CALL CENTER</p>
         <h6 class="text-center text-faded" style="padding: 10px;">&copy; COPYRIGHT <?= get_option('site_name') ?></h6>
      </footer>
   </body>

   <?= get_footer(); ?>