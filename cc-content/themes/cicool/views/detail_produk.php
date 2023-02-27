<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>
    <section class="container" style="color: black;text-align:center">
        <div class="header-content">
            <div class="header-content-inner">
                <div style="padding-bottom: 100px;">
                    <?php foreach ($produks as $produk): ?>

                        <h2 id="homeHeading" style="color: black; padding-top: 50px; padding-bottom: 20px;">
                            <?= $produk->nama_produk ?>
                        </h2>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <img src="<?= BASE_URL . 'uploads/produk/' . $produk->photo; ?>" class="image-responsive"
                                    alt="image produk" title="photo produk" width="500px" style="padding: 10px">
                                <h4 style="color: black;text-align:left">
                                    Deskripsi :<br>
                                </h4>
                                <p style="color: black;text-align:left">
                                    <?= $produk->deskripsi_produk ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>
        </div>

    </section class="container" style="color: black;text-align:center">

    <?= get_footer(); ?>