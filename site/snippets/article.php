<article>
  <div class="i i-2 galleryToggle toggle<?= $article->uid() ?>">
    <h3><?= $article->title() ?></h3>
    <p><?= $article->start()->toDate('F j, Y') ?> &ndash; <?= $article->end()->toDate('F j, Y') ?></p>
    <?= $article->description()->kt() ?>

    <?php if($article->images()->isNotEmpty()) : ?>
      <div class="gallery">
        <?php
        $imgs = $article->images()->sortBy('sort');
        $imgCount = $imgs->count();
        foreach($imgs as $cI) :
          static $currentImageCount = 0;
                  $currentImageCount++; ?>
          <figure>
            <a href="<?= $cI->url() ?>"
              class="glightbox"
              data-gallery="gallery<?= $article->uid() ?>"
              data-glightbox="description: .custom-desc<?= $article->uid() ?><?php echo $currentImageCount ?>">
              <img src="<?= $cI->url() ?>" alt="">
            </a>
            <figcaption class="glightbox-desc
            custom-desc<?= $article->uid() ?><?php echo $currentImageCount ?>">
            <p><?= $cI->description() ?></p>
            <p class="image-counter">
              <?= $imgs->indexOf($cI) + 1 . "/" . $imgCount;?>
            </p>
          </figcaption>
        </figure>
      <?php endforeach ?>
    </div>
  </div>

  <div class="preview-image"><?= $imgs->first() ?></div>
  
  <?php endif ?>

  <?php foreach($article->documents() as $cD) : ?>
    <div class="i i-3">
      <a href="<?= $cD->url() ?>" target="_blank"><?= $cD->description() ?></a>
    </div>
  <?php endforeach ?>

  <?php if($article->link()->isNotEmpty()) : ?>
    <div class="i i-3">
      <a href="<?= $article->link()->url() ?>" target="_blank">View documentation</a>
    </div>
  <?php endif ?>

</article>