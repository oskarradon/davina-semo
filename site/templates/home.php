<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=devide-width, initial-scale=1">
  <title><?= $site->title() ?></title>
  <?= css('assets/css/main.css') ?>

</head>

<body>

  <?php
    $file = $site->files()->sortBy('sort')->first();
    if($file->extension() == 'glb') : ?>
    <model-viewer id="main-image" src="<?= $file->url() ?>" auto-rotate camera-controls>
      <div class="progress-bar hide" slot="progress-bar">
          <div class="update-bar"></div>
      </div>
    </model-viewer>
  
  <?php elseif($file->type() == 'video') : ?>

    <video playsinline autoplay muted loop id="main-image">
      <source src="<?= $file->url() ?>" type="<?= $file->mime() ?>">
    </video>

  <?php else : ?>
    <div id="main-image"><?= $file ?></div>
    <aside>
      <input id="slider" type="range" min="1" max="200">
    </aside>
  <?php endif ?>

  <main>
    <h1 id="logo"><?= $site->title() ?></h1>
    <?php
      foreach($pages->listed() as $section) {
        if ($section->uid() == 'exhibitions') {
          snippet('exhibitions', ['data' => $section]);
        } else {
          snippet('section', ['data' => $section]);
        }
      }
    ?>
  </main>

</body>

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
<?= js('assets/js/glightbox.min.js') ?>
<?= js('assets/js/site.js') ?>
