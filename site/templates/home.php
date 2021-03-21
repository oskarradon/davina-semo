<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=devide-width, initial-scale=1">
  <title><?= $site->title() ?></title>
  <?= css('assets/css/main.css') ?>

</head>

<body>

    <!-- main image, preview image, and model viewer -->

    <?php
      $file = $site->files()->sortBy('sort')->first();
      if($file->extension() == 'glb') : ?>
      <model-viewer id="main-image" src="<?= $file->url() ?>" auto-rotate camera-controls>
        <div class="progress-bar hide" slot="progress-bar">
            <div class="update-bar"></div>
        </div>
      </model-viewer>

    <?php else : ?>
      <div id="main-image"><?= $file ?></div>
      <aside>
        <input id="slider" type="range" min="1" max="200">
      </aside>
    <?php endif ?>

  <main>

      <h1><?= $site->title() ?></h1>
      <?php

        foreach($pages->listed() as $section) {
          snippet($section->uid(), ['data' => $section]);
        }

      ?>

  </main>

</body>

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
<?= js('assets/js/glightbox.min.js') ?>
<?= js('assets/js/site.js') ?>
