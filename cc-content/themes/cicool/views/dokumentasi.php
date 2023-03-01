<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>
    <section class="container" style="color: black;text-align:center">
        <div class="header-content">
            <div class="header-content-inner">
                <div>
                <h2 id="homeHeading">Dokumentasi Kegiatan</h2>
                <hr class="hrcenter">
                    <div class="row">
                        <?php foreach ($dokumentasis as $dokumentasi): ?>
                            <div class="col-lg-4">
                                <?= $dokumentasi->nama_kegiatan ?>
                                <img src="<?= BASE_URL . 'uploads/dokumentasi/' . $dokumentasi->photo; ?>"
                                    class="image-responsive" alt="image dokumentasi" title="photo dokumentasi" width="100%">
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

        </div>
        </div>

    </section class="container" style="color: black;text-align:center">

    <?= get_footer(); ?>