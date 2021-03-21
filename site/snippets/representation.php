<?php
  // filtered collection of all current exhibitions
  $galleries = $data->children()->listed();
  // only show "currently" section if there are pages that match above criteria
  if($galleries->isNotEmpty()):
?>
  <section id="galleries">
    <div class="i i-1 collapsible"><h2><?= $data->title() ?></h2></div>
    <div class="content">
      <?php foreach($galleries as $g) : ?>

        <a class="i i-2" href="<?= $g->link() ?>">
          <h3><?= $g->title() ?></h3>
          <?= $g->description()->kt() ?>
        </a>

      <?php endforeach ?>
    </div>
  </section>
<?php endif ?>
