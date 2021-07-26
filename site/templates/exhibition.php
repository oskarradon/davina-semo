<?php snippet('header', ['template' => $page->id()]); ?>

<body>
<main id="exhibition">
  <article class="info">
    <h1 id="logo"><a href="/"><?= $site->title() ?></a></h1>
    <div class="i i-1"><h2>Exhibitions</h2></div>
    <div class="i i-2"><h2><?= $page->category() ?></h2></div>
    <div class="i i-3"><h2><?= $page->start()->toDate('Y') ?></h2></div>
    <div class="i i-4 galleryToggle toggle<?= $page->uid() ?>">
      <h3><?= $page->title() ?></h3>
      <p><?= $page->start()->toDate('F j, Y') ?> &ndash; <?= $page->end()->toDate('F j, Y') ?></p>
      <?= $page->description()->kt() ?>
    </div>
  </article>

  <?php 
    $c = $page->files()->template("carousel");
    if($c->isNotEmpty()) : 
      $files = $c->sortBy('sort');
      $fileCount = $files->count(); ?>
      <!-- Slider main container -->
      <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <?php 
          foreach($files as $file) :
          static $currentFileCount = 0;
                  $currentFileCount++; ?>
            <figure class="swiper-slide">
              <?php if($file->type() == 'image') : ?>
                <img class="<?= $file->orientation() ?>" src="<?= $file->url() ?>" alt="" loading="lazy" />
              <?php elseif($file->type() == 'video') : ?>
                <video playsinline autoplay muted loop>
                  <source src="<?= $file->url() ?>" type="<?= $file->mime() ?>">
                </video>
              <?php elseif($file->type() == 'audio') :  ?>
              <?php $audioId = $page->uid() . $currentFileCount; ?>
                <audio id="audio<?php echo $audioId ?>" controls src="<?= $file->url() ?>" type="<?= $file->mime() ?>"></audio>
              <?php endif ?>

              <figcaption>
                <div class="caption-inner">
                <p><?= $file->description() ?></p>
                <p class="image-counter"><?= $files->indexOf($file) + 1 . "/" . $fileCount;?></p>
                </div>
            </figcaption>
          </figure>
        <?php endforeach ?>
        </div>
      </div>
    <?php endif ?>
</main>

<?php snippet('footer'); ?>