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
  // filter past collection into categories
  $solo = $past->filterBy('category', 'Solo exhibition');
  $group = $past->filterBy('category', 'Group exhibition');
  $other = $past->filterBy('category', 'Other work');
  // only show "currently" section if there are pages that match above criteria
  if($current->isNotEmpty()):
?>

  <section id="currently">
    <div class="i i-1 collapsible" data-anchor-id="current"><h2>Currently</h2></div>
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
    <div class="i i-1 collapsible" data-anchor-id="exhibitions"><h2><?= $data->title() ?></h2></div>
    <div class="content">
      <?php
        // returns the year of an exhibition
        $returnYear = function($p) {
          return $p->start()->date()->toDate('Y');
        }; ?>
        <div class="i i-2 collapsible" data-anchor-id="solo"><h2>Solo exhibitions</h2></div>
        <div class="content">
          <?php foreach($solo->group($returnYear) as $year => $soloPerYear): ?>
            <div class="i i-3 collapsible" data-anchor-id="s-<?= $year ?>"><h2><?= $year ?></h2></div>
            <div class="content">
              <?php foreach($soloPerYear as $s) : ?>
                <?php snippet('article', ['article' => $s]); ?>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="i i-2 collapsible" data-anchor-id="group"><h2>Group exhibitions</h2></div>
        <div class="content">
          <?php foreach($group->group($returnYear) as $year => $groupPerYear): ?>
            <div class="i i-3 collapsible" data-anchor-id="g-<?= $year ?>"><h2><?= $year ?></h2></div>
            <div class="content">
              <?php foreach($groupPerYear as $g) : ?>
                <?php snippet('article', ['article' => $g]); ?>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="i i-2 collapsible" data-anchor-id="other"><h2>Other work</h2></div>
        <div class="content">
          <?php foreach($other->group($returnYear) as $year => $otherPerYear): ?>
            <div class="i i-3 collapsible" data-anchor-id="o-<?= $year ?>"><h2><?= $year ?></h2></div>
            <div class="content">
              <?php foreach($otherPerYear as $o) : ?>
                <?php snippet('article', ['article' => $o]); ?>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
  </section>
<?php endif ?>
