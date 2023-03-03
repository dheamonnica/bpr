<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>
    <section class="container" style="color: black;text-align:center">
        <div class="header-content">
            <div class="header-content-inner">
                <div style="padding-bottom: 100px;">
                    <?php foreach ($kredits as $kredit): ?>

                        <h2 id="homeHeading" style="color: black; padding-top: 50px; padding-bottom: 20px;">
                            <?= $kredit->nama_kredit ?>
                        </h2>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <img src="<?= BASE_URL . 'uploads/kredit/' . $kredit->photo; ?>" class="image-responsive"
                                    alt="image kredit" title="photo kredit" width="500px" style="padding: 10px">
                                <h4 style="color: black;text-align:left">
                                    Deskripsi :<br>
                                </h4>
                                <p style="color: black;text-align:left">
                                    <?= $kredit->deskripsi_kredit ?>
                                </p>

                                <a href="<?= BASE_URL . 'web/ajukan_kredit' ?>"><button class="btn btn-success">Ajukan
                                        Kredit </button></a>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>
        </div>

    </section class="container" style="color: black;text-align:center">

    <?= get_footer(); ?>