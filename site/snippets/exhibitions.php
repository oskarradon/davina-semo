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
      <?php foreach($current as $e) :
              static $showCount = 0;
              $showCount++; ?>

        <div class="i i-2 asdf">
          <h3><?= $e->title() ?></h3>
          <p><?= $e->start()->toDate('F j, Y') ?> &ndash; <?= $e->end()->toDate('F j, Y') ?></p>
          <?= $e->text()->kt() ?>
        </div>

        <?php if($e->images()) :
              // only show gallery el if exhibition has imgs ?>
          <div class="gallery">
            <?php foreach($e->images() as $i) :
                    static $imageCount = 0;
                    $imageCount++; ?>
              <figure>
                <a href="<?= $i->url() ?>"
                   class="glightbox"
                   data-gallery="gallery<?php echo $showCount ?>"
                   data-glightbox="description: .custom-desc<?php echo $imageCount ?>">
                  <img src="<?= $i->url() ?>" alt="">
                </a>
                <figcaption class="glightbox-desc
                                   custom-desc<?php echo $imageCount ?>">
                  <p><?= $i->description() ?></p>
                  <span><?php echo $imageCount ?> / <?= $e->images()->count() ?></span>
                </figcaption>
              </figure>
            <?php endforeach ?>
          </div>
        <?php endif ?>

        <?php foreach($e->documents() as $d) : ?>
          <div class="i i-3">
            <a href="<?= $d->url() ?>"><?= $d->description() ?></a>
          </div>
        <?php endforeach ?>

        <?php if($e->link()) : ?>
          <div class="i i-3">
            <a href="<?= $e->link()->url() ?>">View documentation</a>
          </div>
        <?php endif ?>

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
              <h3 class="collapsible"><?= $item->title() ?></h3>
              <div class="content">
                <p><?= $item->start()->toDate('F j, Y') ?> &ndash; <?= $item->end()->toDate('F j, Y') ?></p>
                <?= $item->text()->kt() ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif ?>
