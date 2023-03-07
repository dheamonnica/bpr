<?= get_header(); ?>
<link href="<?= theme_asset(); ?>/css/clean-blog.css" rel="stylesheet">

<body id="page-top">
  <?= get_navigation(); ?>

  <!-- <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1><?= ucwords(get_option('site_name')) ?> Blog</h1>
            <span class="subheading">
              All blogs
              <?php if ($category = $this->uri->segment(4)): ?>
                    - <?= $category ?>
              <?php endif ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </header> -->

  <div class="container" style="padding-top: 120px;">
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-10 ">
        <?php if ($q = $this->input->get('q')): ?>
          <div class="pull-left result-search"><b>Result for keyword "
              <?= $q ?>", found <span class="count-search-result">
                <?= $blog_counts ?>
              </span> Blogs
            </b></div>
        <?php else: ?>
          <div class="pull-left result-search"><b>Total : <span class="count-search-result">
                <?= $blog_counts ?>
              </span> Blogs</b></div>
        <?php endif ?>
        <div class="search-wrapper">
          <form action="" method="get" accept-charset="utf-8" id="form-blog-search">
            <input type="" name="q" class="blog-input-search" placeholder="Search"
              value="<?= $this->input->get('q') ?>">
            <a class="blog-search-button" onclick="$('#form-blog-search').submit()">
              <i class="fa fa-search"></i>
            </a>
          </form>
        </div>
        <div class="clearfix">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-10 ">

        <?php foreach ($blogs as $blog): ?>
          <div class="post-preview">
            <div class="rows">
              <div class="col-lg-3">
                <img src="<?= BASE_URL . 'uploads/artikel/' . $blog->photo; ?>" class="image-responsive"
                  alt="image artikel" title="photo artikel" width="100%">
              </div>
              <div class="col-lg-9" style="min-height: 300px;">
                <a href="<?= site_url('web/detail_blog/' . $blog->id) ?>">
                  <h4>
                    <?= substr($blog->judul_artikel, 0, 50) ?>
                  </h4>
                  <p class="post-subtitle">
                    <?= substr(strip_tags($blog->isi_artikel), 0, 100) ?>
                  </p>
                </a>
              </div>
            </div>
          </div>
          <hr>
        <?php endforeach ?>

        <!-- Pager -->
        <div class="clearfix">
          <?= $pagination ?>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="clear">
    <div class="clear">
    </div>
  </div>


  <?= get_footer(); ?>