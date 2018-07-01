<div class="container">
	<?php var_dump($articles); ?>
    <?php foreach ($categories as $category): ?>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 ">
            <div class="panel-heading"><?= $category['name'] ?></div>
            <div class="panel-body">
                <?= $post['description']?>
            </div>
            <br />
        </div>
    <?php endforeach; ?>
</div>
