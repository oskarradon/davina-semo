<?php
  $current = $data
    ->children()
    ->filter(function ($child) {
      return $child->start()->toDate() <= time() && $child->end()->toDate() >= time();
    });

  $past = $data
    ->children()
    ->filter(function ($child) {
      return $child->start()->toDate() > time() || $child->end()->toDate() < time();
    });

  if($current->isNotEmpty()):
?>
  <section id="currently">
    <div class="i i-1 collapsible"><h1>Currently</h1></div>
    <div class="content">
      <?php foreach($current as $e) : ?>
        <div class="i i-2">
          <h3><?= $e->title() ?></h3>
          <p><?= $e->start()->toDate('F j, Y') ?> &ndash; <?= $e->end()->toDate('F j, Y') ?></p>
          <?= $e->text()->kt() ?>
        </div>
      <?php endforeach ?>
    </div>
  </section>
<?php endif ?>

<?php if($past->isNotEmpty()): ?>
  <section id="exhibitions">
    <div class="i i-1 collapsible"><?= $data->title() ?></div>
    <div class="content">
      <?php

      // function that returns the formatted date
      $callback = function($p) {
        return $p->start()->date()->toDate('Y');
      };

      // group items using $callback
      $groupedItems = $past->group($callback);

      // output exhibitions by year
      foreach($groupedItems as $year => $itemsPerYear):
      ?>
        <div class="i i-2 collapsible"><?= $year ?></div>
        <div class="content">
          <?php foreach($itemsPerYear as $item) : ?>
            <div class="i i-3">
              <?php time() ?>
              <h3><?= $item->title() ?></h3>
              <p><?= $item->start()->toDate('F j, Y') ?> &ndash; <?= $item->end()->toDate('F j, Y') ?></p>
              <?= $item->text()->kt() ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif ?>
