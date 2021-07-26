<!doctype html>
<html class="no-js" lang="" itemscope itemtype="https://schema.org/Article">
  <head>
    <meta charset="utf-8">

    <?php if ($page->isHomePage()): ?>
      <title><?= $site->title() ?></title>
    <?php else: ?>
      <title><?= $page->seoTitle()->or($page->title()) ?> | <?= $site->title() ?></title>
    <?php endif ?>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Facebook Open Graph data -->
    <meta property="og:url" content="https://www.example.com/path/to/page.html">
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <meta property="og:image" content="https://www.example.com/path/to/image.jpg">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="">
    <meta property="article:author" content="">

    <!-- Twitter cards -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@site_account">
    <meta name="twitter:creator" content="@individual_account">
    <meta name="twitter:url" content="https://www.example.com/path/to/page.html">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="https://www.example.com/path/to/image.jpg">

    <!-- Google's Schema.org -->
    <link rel="author" href="">
    <link rel="publisher" href="">
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- Vendor stylesheets -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Author stylesheets -->
    <?= css('/assets/css/main.css') ?>
    <?php echo css('@auto') ?> <!-- looks for stylesheet with same name as template in /assets/css/templates -->

    <meta name="theme-color" content="#fafafa">

  </head>

  <body>
