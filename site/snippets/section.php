<section id="<?= $data->uid() ?>">
<?php if($data->link()->isNotEmpty()) : ?>
  <div class="i i-1"><a href="<?= $data->link()->url() ?>" target="_blank"><?= $data->title() ?></a></div>
<?php else : ?>
  <div class="i i-1 collapsible"><h2><?= $data->title() ?></h2></div>
  <div class="content">
    <?php $links = $data->links()->toStructure();
        foreach ($links as $link) : ?>
          <div class="i i-2">
            <a href="<?= $link->target()->toLinkObject() ?>" target="_blank"><?= $link->title() ?></a>
          </div>
    <?php endforeach ?>
    <?php $documents = $data->docs()->toStructure();
          foreach ($documents as $document) : ?>
            <div class="i i-2">
              <a href="<?= $document->target()->toFile()->url() ?>" target="_blank"><?= $document->title() ?></a>
            </div>
    <?php endforeach ?>
    <?php foreach($data->children()->listed() as $subpage) : ?>
      <?php snippet('article', ['article' => $subpage]); ?>
    <?php endforeach ?>
  </div>
<?php endif ?>
</section>
