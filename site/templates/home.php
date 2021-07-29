<?php snippet('header', ['template' => $page->id()]); ?>

  <?php
    $file = $site->files()->sortBy('sort')->first();
    if($file->extension() == 'glb') : ?>
    <model-viewer id="main-object" src="<?= $file->url() ?>" auto-rotate camera-controls>
      <div class="progress-bar hide" slot="progress-bar">
          <div class="update-bar"></div>
      </div>
    </model-viewer>
  
  <?php elseif($file->type() == 'video') : ?>
    <div id="main-object" class="flex-center">
      <video id="player" playsinline autoplay muted loop>
        <source src="<?= $file->url() ?>" type="<?= $file->mime() ?>">
      </video>
    </div>
 
  <?php elseif($file->type() == 'audio') :  ?>
  <div id="main-object" class="flex-center">
    <audio id="player" controls src="<?= $file->url() ?>" type="<?= $file->mime() ?>"></audio>
  </div>

  <?php else : ?>
    <div id="main-object"><?= $file ?></div>
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