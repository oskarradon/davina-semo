<article>
  <div class="i i-4" data-micromodal-trigger="<?= $article->uid() ?>">
  <p>asdf</p>
    <!-- <a href="<?= $article->url() ?>"> -->
      <h3><?= $article->title() ?></h3>
      <p><?= $article->start()->toDate('F j, Y') ?> &ndash; <?= $article->end()->toDate('F j, Y') ?></p>
      <?= $article->description()->kt() ?>
    <!-- </a> -->
  </div>

 <div class="modal micromodal-slide" id="<?= $article->uid() ?>" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        <div class="modal__content" id="modal-1-content">
          <?php 
          $c = $article->files()->template("carousel");
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
                    <?php $audioId = $article->uid() . $currentFileCount; ?>
                      <audio id="audio<?php echo $audioId ?>" controls src="<?= $file->url() ?>" type="<?= $file->mime() ?>"></audio>
                    <?php endif ?>

                    
                </figure>
              <?php endforeach ?>
              </div>
            </div>
          <?php endif ?>

        </div>
      </div>
    </div>
  </div>
        

  

  <?php $c = $page->files()->template("carousel");
    if($c->isNotEmpty()) : 
      $files = $c->sortBy('sort'); ?>
      <div class="preview-image"><?= $files->filterBy('type', 'image')->first() ?></div>
    <?php endif ?>

  <?php $links = $article->links()->toStructure();
        foreach ($links as $link) : ?>
          <div class="i i-5">
            <a href="<?= $link->target()->toLinkObject() ?>" target="_blank"><?= $link->title() ?></a>
          </div>
  <?php endforeach ?>

  <?php $documents = $article->docs()->toStructure(); ?>
    <?php if ($documents->isNotEmpty()) : ?>
      <?php foreach ($documents as $document) : ?>
        <div class="i i-5">
          <a href="<?= $document->target()->toFile() ?>" target="_blank"><?= $document->title() ?></a>
        </div>
      <?php endforeach ?>
    <?php endif ?>

</article>