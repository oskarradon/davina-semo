<?php
  // filtered collection of all current exhibitions
  $current = $data
    ->children()
    ->filter(function ($child) {
      return $child->start()->toDate() <= time() && $child->end()->toDate() >= time();
    });
  // filtered collection of all past exhibitions
  $past = $data
    ->children()
    ->filter(function ($child) {
      return $child->start()->toDate() > time() || $child->end()->toDate() < time();
    });
  // only show "currently" section if there are pages that match above criteria
  if($current->isNotEmpty()):
?>

  <section id="currently">
    <div class="i i-1 collapsible"><h2>Currently</h2></div>
    <div class="content">
      <?php foreach($current as $article) : ?>
        <?php snippet('article', ['article' => $article]); ?>
      <?php endforeach ?>
    </div>
  </section>
<?php endif ?>

<?php
  // collection of past exhibitions should never be empty, but just in case
  if($past->isNotEmpty()):
?>
  <section id="exhibitions">
    <div class="i i-1 collapsible"><h2><?= $data->title() ?></h2></div>
    <div class="content">
      <?php
        // returns the year of an exhibition
        $returnYear = function($p) {
          return $p->start()->date()->toDate('Y');
        };
        // group items using $callback
        $groupedExhibitions = $past->group($returnYear);
        // output exhibitions by year
        foreach($groupedExhibitions as $year => $exhibitionsPerYear):
      ?>
        <div class="i i-2 collapsible"><h2><?= $year ?></h2></div>
        <div class="content">
          <?php foreach($exhibitionsPerYear as $article) : ?>
            <?php snippet('article', ['article' => $article]); ?>
          <?php endforeach; ?>
        </div>

      <?php endforeach; ?>
  </section>
<?php endif ?>
