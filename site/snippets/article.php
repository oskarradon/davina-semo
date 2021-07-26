<article>
  <div class="i i-4" data-micromodal-trigger="<?= $article->uid() ?>">
    <!-- <a href="<?= $article->url() ?>"> -->
      <h3><?= $article->title() ?></h3>
      <p><?= $article->start()->toDate('F j, Y') ?> &ndash; <?= $article->end()->toDate('F j, Y') ?></p>
      <?= $article->description()->kt() ?>
    <!-- </a> -->
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