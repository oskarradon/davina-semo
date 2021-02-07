<ul id="exhibitions">
  <li class="i-1">
    <h2><?= $data->title() ?></h2>
  </li>

  <?php foreach($data->children()->listed() as $project): ?>
    <li class="i-2">
      <h3><?= $project->title() ?></h3>
      <p><?= $project->start()->toDate('F j, Y') ?> &ndash; <?= $project->end()->toDate('F j, Y') ?></p>
      <?= $project->text()->kt() ?>
    </li>
  <?php endforeach ?>
</ul>
