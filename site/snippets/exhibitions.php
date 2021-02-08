<ul id="currently">

  <?php

    function isDateBetweenDates(DateTime $date, DateTime $startDate, DateTime $endDate) {
        return $date > $startDate && $date < $endDate;
    }

    $currentTime = new DateTime();

    foreach ($data->children()->listed() as $currentItem) :
      $currentStart = DateTime::createFromFormat( 'U', $currentItem->start()->toDate() );
      $currentEnd = DateTime::createFromFormat( 'U', $currentItem->end()->toDate() );
      if (isDateBetweenDates($currentTime, $currentStart, $currentEnd) == true) :
    ?>
    <li class="i-1">Currently</li>
        <li class="i-3">
          <h3><?= $currentItem->title() ?></h3>
          <p><?= $currentItem->start()->toDate('F j, Y') ?> &ndash; <?= $currentItem->end()->toDate('F j, Y') ?></p>
          <?= $currentItem->text()->kt() ?>
        </li>
    <?php endif; ?>
    <?php endforeach; ?>

</ul>

<ul id="exhibitions">
  <li class="i-1"><?= $data->title() ?></li>

  <?php

    // function that returns the formatted date
    $callback = function($p) {
      return $p->start()->date()->toDate('Y');
    };
    // group items using $callback
    $groupedItems = $data->children()->listed()->group($callback);

    // output items by year
    foreach($groupedItems as $year => $itemsPerYear): ?>
      <li class="i-2">
        <?= $year ?>
      </li>
        <?php foreach($itemsPerYear as $item) : ?>
          <li class="i-3">
            <h3><?= $item->title() ?></h3>
            <p><?= $item->start()->toDate('F j, Y') ?> &ndash; <?= $item->end()->toDate('F j, Y') ?></p>
            <?= $item->text()->kt() ?>
          </li>
        <?php endforeach; ?>
  <?php endforeach; ?>
</ul>
