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
      <?php foreach($current as $c) : ?>
        <article>
          <div class="i i-2 galleryToggle toggle<?= $c->uid() ?>">
            <h3><?= $c->title() ?></h3>
            <p><?= $c->start()->toDate('F j, Y') ?> &ndash; <?= $c->end()->toDate('F j, Y') ?></p>
            <?= $c->text()->kt() ?>


            <?php if($c->images()->isNotEmpty()) :
              // only show gallery el if exhibition has imgs ?>
              <div class="preview-image"><?= $c->images()->first() ?></div>
              <div class="gallery">
                <?php
                $currentImages = $c->images();
                $currentTotal = $currentImages->count();
                foreach($currentImages as $cI) :
                  static $currentImageCount = 0;
                  $currentImageCount++; ?>
                  <figure>
                    <a href="<?= $cI->url() ?>"
                      class="glightbox"
                      data-gallery="gallery<?= $c->uid() ?>"
                      data-glightbox="description: .custom-desc<?php echo $currentImageCount ?>">
                      <img src="<?= $cI->url() ?>" alt="">
                    </a>
                    <figcaption class="glightbox-desc
                    custom-desc<?php echo $currentImageCount ?>">
                    <p><?= $cI->description() ?></p>
                    <p class="image-counter">
                      <?= $currentImages->indexOf($cI) + 1 . "/" . $currentTotal;?>
                    </p>
                  </figcaption>
                </figure>
              <?php endforeach ?>
            </div>
            <?php endif ?>

          </div>

          <?php foreach($c->documents() as $cD) : ?>
            <div class="i i-3">
              <a href="<?= $cD->url() ?>" target="_blank"><?= $cD->description() ?></a>
            </div>
          <?php endforeach ?>

          <?php if($c->link()->isNotEmpty()) : ?>
            <div class="i i-3">
              <a href="<?= $c->link()->url() ?>" target="_blank">View documentation</a>
            </div>
          <?php endif ?>
        </article>

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
        $groupedExhibitions = $past->group($callback);
        // output exhibitions by year
        foreach($groupedExhibitions as $year => $exhibitionsPerYear):
      ?>
        <div class="i i-2 collapsible"><h2><?= $year ?></h2></div>
        <div class="content">
          <?php foreach($exhibitionsPerYear as $e) :
                 static $exhibitionCount = 0;
                        $exhibitionCount++; ?>

            <article>
              <div class="i i-3 galleryToggle toggle<?= $e->uid() ?>">
                <h3><?= $e->title() ?></h3>
                <p><?= $e->start()->toDate('F j, Y') ?> &ndash; <?= $e->end()->toDate('F j, Y') ?></p>
                <?= $e->text()->kt() ?>


                <?php if($e->images()->isNotEmpty()) :
                  // only show gallery el if exhibition has imgs ?>
                  <div class="preview-image"><?= $e->images()->first() ?></div>
                  <div class="gallery">
                    <?php
                    $exhibitionImages = $e->images();
                    $exhibitionTotal = $exhibitionImages->count();
                    foreach($exhibitionImages as $eI) :
                      static $exhibitionImageCount = 0;
                      $exhibitionImageCount++; ?>
                      <figure>
                        <a href="<?= $eI->url() ?>"
                          class="glightbox"
                          data-gallery="gallery<?= $e->uid() ?>"
                          data-glightbox="description: .custom-desc<?php echo $exhibitionImageCount ?>">
                          <img src="<?= $eI->url() ?>" alt="">
                        </a>
                        <figcaption class="glightbox-desc
                        custom-desc<?php echo $exhibitionImageCount ?>">
                        <p><?= $eI->description() ?></p>
                        <p class="image-counter">
                          <?= $exhibitionImages->indexOf($eI) + 1 . "/" . $exhibitionTotal;?>
                        </p>
                      </figcaption>
                    </figure>
                  <?php endforeach ?>
                </div>
                <?php endif ?>

              </div>

              <?php foreach($e->documents() as $eD) : ?>
                <div class="i i-4">
                  <a href="<?= $eD->url() ?>" target="_blank"><?= $eD->description() ?></a>
                </div>
              <?php endforeach ?>

              <?php if($e->link()->isNotEmpty()) : ?>
                <div class="i i-4">
                  <a href="<?= $e->link()->url() ?>" target="_blank">View documentation</a>
                </div>
              <?php endif ?>
            </article>

          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif ?>
