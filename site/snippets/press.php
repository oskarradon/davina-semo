<?php
  // filtered collection of all current exhibitions
  $press = $data->children()->listed();
  // only show "currently" section if there are pages that match above criteria
  if($press->isNotEmpty()):
?>
  <section id="press">
    <div class="i i-1 collapsible"><h2><?= $data->title() ?></h2></div>
    <div class="content">
      <?php foreach($press as $p) : ?>
        <div class="i i-2">
          <a href="<?= $p->link() ?>"><?= $p->text() ?></a>
        </div>
      <?php endforeach ?>
    </div>
  </section>
<?php endif ?>
