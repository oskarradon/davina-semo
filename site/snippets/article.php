<article>
  <div class="i i-4 galleryToggle toggle<?= $article->uid() ?>">
    <h3><?= $article->title() ?></h3>
    <p><?= $article->start()->toDate('F j, Y') ?> &ndash; <?= $article->end()->toDate('F j, Y') ?></p>
    <?= $article->description()->kt() ?>

    <?php 
    $c = $article->files()->template("carousel");
    if($c->isNotEmpty()) : ?>
      <div class="gallery">
        <?php
        $files = $c->sortBy('sort');
        $fileCount = $files->count();
        foreach($files as $file) :
          static $currentImageCount = 0;
                 $currentImageCount++; ?>
          <figure>
            <a href="<?= $file->url() ?>"
              class="glightbox"
              data-gallery="gallery<?= $article->uid() ?>"
              data-glightbox="description: .custom-desc<?= $article->uid() ?><?php echo $currentImageCount ?>">
            <?php if($file->type() == 'image') : ?>
              <img src="<?= $file->url() ?>" alt="" <?php if ($file->orientation() == 'portrait') : ?> class="portrait" <?php endif ?> />
            <?php elseif($file->type() == 'video') : ?>
              <video playsinline autoplay muted loop>
                <source src="<?= $file->url() ?>" type="<?= $file->mime() ?>">
              </video>
            <?php else : ?>
              <audio controls src="<?= $file->url() ?>" type="<?= $file->mime() ?>"></audio>
            <?php endif ?>
            </a>
            <figcaption class="glightbox-desc
            custom-desc<?= $article->uid() ?><?php echo $currentImageCount ?>">
            <p><?= $file->description() ?></p>
            <p class="image-counter">
              <?= $files->indexOf($file) + 1 . "/" . $fileCount;?>
            </p>
          </figcaption>
        </figure>
      <?php endforeach ?>
    </div>
  </div>

  <div class="preview-image"><?= $files->first() ?></div>
  
  <?php endif ?>

  <?php $links = $article->links()->toStructure();
        foreach ($links as $link) : ?>
          <div class="i i-5">
            <a href="<?= $link->target()->toLinkObject() ?>" target="_blank"><?= $link->title() ?></a>
          </div>
  <?php endforeach ?>

  <?php $documents = $article->docs()->toStructure();
        foreach ($documents as $document) : ?>
          <div class="i i-5">
            <a href="<?= $document->target()->toFile()->url() ?>" target="_blank"><?= $document->title() ?></a>
          </div>
  <?php endforeach ?>

</article>