<?php for ($i=0; $i < count($news)+1; $i++) :?>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 vi">
            <div class="panel-body">
                <a href="/category/view/?id=<?=$news[$i][0]['category_id']?>"><?= $news[$i][0]['category'] ?></a>
            </div>
            <?php foreach ($news[$i] as $article): ?>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 ">
                    <div class="panel-heading"><?= $article['title'] ?></div>
                    <div class="panel-body">
                        <?= $post['name'] ?>
                    </div>
                    <br />
                </div>
            <?php endforeach; ?>
        </div>
<?php endfor;?>