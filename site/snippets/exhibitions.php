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
  <ul id="currently">
    <li class="i-1">Currently</li>
    <?php foreach($current as $e) : ?>
      <li class="i-2">
        <h3><?= $e->title() ?></h3>
        <p><?= $e->start()->toDate('F j, Y') ?> &ndash; <?= $e->end()->toDate('F j, Y') ?></p>
        <?= $e->text()->kt() ?>
      </li>
    <?php endforeach ?>
  </ul>
<?php endif ?>

<?php if($past->isNotEmpty()): ?>
  <ul id="exhibitions">
    <li class="i-1"><?= $data->title() ?></li>

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
      <li class="i-2">
        <?= $year ?>
      </li>
      <?php foreach($itemsPerYear as $item) : ?>
        <li class="i-3">
          <?php time() ?>
          <h3><?= $item->title() ?></h3>
          <p><?= $item->start()->toDate('F j, Y') ?> &ndash; <?= $item->end()->toDate('F j, Y') ?></p>
          <?= $item->text()->kt() ?>
        </li>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </ul>
<?php endif ?>
