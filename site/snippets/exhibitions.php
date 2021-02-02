<section id="exhibitions">
  <h1><?= $data->title() ?></h1>


    <?php foreach($data->children()->listed() as $project): ?>
      <p><?= $project->title() ?></p>
      <p><?= $project->year() ?></p>
    <?php endforeach ?>

</section>
