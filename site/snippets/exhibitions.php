<section id="exhibitions">
  <article class="i-1">
    <div class="indent"></div>
    <div class="bracket">└</div>
    <div class="content">
      <h2><?= $data->title() ?></h2>
    </div>
  </article>


    <?php foreach($data->children()->listed() as $project): ?>
      <article class="i-2">
        <div class="indent"></div>
        <div class="bracket">└</div>
        <div class="content">
          <h3><?= $project->title() ?></h3>
          <p><?= $project->start()->toDate('F j, Y') ?> &ndash; <?= $project->end()->toDate('F j, Y') ?></p>
          <?= $project->text()->kt() ?>
        </div>
      </article>
    <?php endforeach ?>

</section>
