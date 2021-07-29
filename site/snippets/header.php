<!doctype html>
<html class="no-js" lang="" itemscope itemtype="https://schema.org/Article">
  <head>
    <meta charset="utf-8">

    <?php if ($page->isHomePage()): ?>
      <title><?= $site->title() ?></title>
    <?php else: ?>
      <title><?= $page->seoTitle()->or($page->title()) ?> | <?= $site->title() ?></title>
    <?php endif ?>

    <meta name="description" content="Web portfolio of Davina Semo">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:url" content="https://davinasemo.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Davina Semo">
    <meta property="og:image" content="/assets/img/open-graph.jpg">
    <meta property="og:description" content="Web portfolio of Davina Semo">
    <meta property="og:site_name" content="Davina Semo">
    <meta property="article:author" content="Davina Semo">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="https://davinasemo.com">
    <meta name="twitter:title" content="Davina Semo">
    <meta name="twitter:description" content="Web portfolio of Davina Semo">
    <meta name="twitter:image" content="/assets/img/twitter.jpg">

    <link rel="author" href="Davina Semo">
    <link rel="publisher" href="Davina Semo">
    <meta itemprop="name" content="Davina Semo">
    <meta itemprop="description" content="Web portfolio of Davina Semo">
    <meta itemprop="image" content="/assets/img/open-graph.jpg">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- Vendor stylesheets -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />

    <!-- Author stylesheets -->
    <?= css('/assets/css/main.css') ?>
    <?php echo css('@auto') ?> <!-- looks for stylesheet with same name as template in /assets/css/templates -->

    <meta name="theme-color" content="#fafafa">

  </head>

  <body>
