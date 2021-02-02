<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=devide-width, initial-scale=1">
  <title><?= $site->title() ?></title>

  <?= css('assets/css/main.css') ?>
  <?= css(['assets/css/main.css', '@auto']) ?>
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

</body>
