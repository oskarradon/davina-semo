<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=devide-width, initial-scale=1">
  <title><?= $site->title() ?></title>

  <?= css('assets/css/main.css') ?>

</head>

<body>
  <main>
    <h1><?= $site->title() ?></h1>
    <?php

    foreach($pages->listed() as $section) {
      snippet($section->uid(), ['data' => $section]);
    }

    ?>
  </main>
  <div id="main-image"><?= $site->images()->first() ?></div>
  <aside>
    <input id="slider" type="range" min="1" max="200">
  </aside>
</body>

<?= js('assets/js/glightbox.min.js') ?>
<?= js('assets/js/site.js') ?>
