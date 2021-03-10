<?php
  // filtered collection of all current exhibitions
  $contact = $data->children()->listed();
  // only show "currently" section if there are pages that match above criteria
  if($contact->isNotEmpty()):
?>
  <section id="contact">
    <div class="i i-1 collapsible"><h2>Inquiries</h2></div>
    <div class="content">
      <?php foreach($contact as $c) :
              if($c->phone()->isNotEmpty()): ?>
                <div class="i i-2">
                  <?= Html::tel($c->phone()) ?>
                </div>
              <?php endif ?>
        <?php if($c->email()->isNotEmpty()): ?>
                <div class="i i-2">
                  <?= Html::email($c->email()) ?>
                </div>
              <?php endif ?>
        <?php if($c->link()->isNotEmpty()): ?>
                <div class="i i-2">
                  <a href="<?= $c->link() ?>"><?= $c->text() ?></a>
                </div>
              <?php endif ?>

      <?php endforeach ?>
    </div>
  </section>
<?php endif ?>
