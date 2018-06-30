<?php foreach ($articles as $article): ?>
    <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 ">
        <div class="panel-heading"><?= $article['name'] ?></div>
        <div class="panel-body">
            <?= $article['hits'] ?>
        </div>
        <br />
    </div>
<?php endforeach; ?>