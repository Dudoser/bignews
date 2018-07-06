<div class="container">
    <?php foreach ($categories as $category): ?>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 ">
            <div class="panel-heading">
                <?php if ($category['name'] == 'analitics') :?>
                    <a href="/category/view?id=<?= $category['id'] ?>&page=1&analitics=1">
                        <?= $category['name'] ?>
                    </a>
                <?php else :?>
                    <a href="/category/view?id=<?= $category['id'] ?>&page=1">
                        <?= $category['name'] ?>
                    </a>
                <?php endif;?>
            </div>
            <div class="panel-body">
                <?= $category['description']?>
            </div>
            <br />
        </div>
    <?php endforeach; ?>
</div>
