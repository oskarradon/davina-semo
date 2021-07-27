<?php snippet('header', ['template' => $page->id()]); ?>

<body>
<!-- <main id="exhibition"> -->
  <a href="javascript:window.history.back();" id="close-button"><span>x</span></a>
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
            <figure class="swiper-slide" data-hash="<?= $file->hash() ?>">
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
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    <?php endif ?>
<!-- </main> -->

<?php snippet('footer'); ?>