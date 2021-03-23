<!DOCTYPE html>
<html lang="en">

<head>
  <?php get_header(); ?>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post.html">Sample Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog <?php echo date('Y'); ?></h1>
            <!-- エコーというのは関数とかファンクションということがある -->
            <!-- parameter他は引数のことを居ますので-->

            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <!-- if構文で記事があったら表示してなかったら非表示にする方法　閉じたタグにタグあり-->
        <!-- trueかfalseを返すようにしている -->
        <!-- 変数に入れて再利用できるようにしている -->
        <?php $lists = have_posts(); ?>
        <?php if ($lists) : ?>
          <?php while (have_posts()) : the_post();  ?>
            <div class="post-preview">
              <!-- リンク先を変更するテンプレートタグ -->
              <a href="<?php the_permalink(); ?>">
                <h2 class="post-title">
                  <!-- ループを回して,配列でまとまっている投稿をいくつも表示できるようにする。ここでループができるものを確認してtrueかfalseを返す -->
                  <!-- 次の投稿へ進めるのがthepostテンプレートタグ -->
                  <?php the_title(); ?>
                </h2>
                <h3 class="post-subtitle">
                  <!-- 抜粋を設定している場合はそっちを表示して、していない場合は本文から抜粋する-->
                  <!-- 抜粋機能をしている。本文の中の一部を抜粋して表示している -->
                  <?php the_excerpt(); ?>
                </h3>
              </a>
              <p class="post-meta">Posted by
                <?php the_author(); ?>
                <?php the_time(get_option('date_format')); ?>
              </p>
            </div>
            <hr>
          <?php endwhile; ?>
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        <?php else : ?>
          <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

  <!-- 管理テンプレートタグを必ず入れるようにすること -->
  <?php wp_footer(); ?>
</body>

</html>
