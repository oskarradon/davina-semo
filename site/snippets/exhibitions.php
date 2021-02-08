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
  <ul class="i-1" id="currently">
    <li>Currently
      <ul class="i-2">
        <?php foreach($current as $e) : ?>
          <li>
            <h3><?= $e->title() ?></h3>
            <p><?= $e->start()->toDate('F j, Y') ?> &ndash; <?= $e->end()->toDate('F j, Y') ?></p>
            <?= $e->text()->kt() ?>
          </li>
        <?php endforeach ?>
      </ul>
    </li>
  </ul>
<?php endif ?>

<?php if($past->isNotEmpty()): ?>
  <ul class="i-1" id="exhibitions">
    <li>
      <?= $data->title() ?>
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
        <ul class="i-2">
        <li>
          <?= $year ?>
            <?php foreach($itemsPerYear as $item) : ?>
              <ul class="i-3">
                <li>
                  <h3><?= $item->title() ?></h3>
                  <p><?= $item->start()->toDate('F j, Y') ?> &ndash; <?= $item->end()->toDate('F j, Y') ?></p>
                  <?= $item->text()->kt() ?>
                </li>
              </ul>
            <?php endforeach; ?>
        </li>
      </ul>
    <?php endforeach; ?>
    </li>
  </ul>
<?php endif ?>
