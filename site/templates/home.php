<?php snippet('header', ['template' => $page->id()]); ?>

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
      <input id="slider" type="range" value="50" min="1" max="800">
    </aside>
  <?php endif ?>

  <main id="home">
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

<?php snippet('footer'); ?>