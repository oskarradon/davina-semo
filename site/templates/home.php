<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=devide-width, initial-scale=1">
  <title><?= $site->title() ?></title>

  <?= css('assets/css/main.css') ?>

</head>

<body>

  <main>
    <div id="column1" class="column">
      <div class="content">
        <h1><?= $site->title() ?></h1>
        <?php

        foreach($pages->listed() as $section) {
          snippet($section->uid(), ['data' => $section]);
        }

        ?>
      </div>
    </div>

    <div class="column" id="column2" data-overflow="#column1"></div>
    <div class="column" id="column3" data-overflow="#column2"></div>
    <div class="column" id="column4" data-overflow="#column3"></div>
    <div class="column" id="column5" data-overflow="#column4"></div>
    <div class="column" id="column6" data-overflow="#column5"></div>
    <div class="column" id="column7" data-overflow="#column6"></div>

  </main>

  <!-- main image and model viewer -->
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

</body>

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
<?= js('assets/js/glightbox.min.js') ?>
<?= js('assets/js/site.js') ?>
