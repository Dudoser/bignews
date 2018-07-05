<?php for ($i=0; $i < count($news)+1; $i++) :?>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 vi">
            <div class="panel-body">
                <a href="/category/view/?id=<?=$news[$i][0]['category_id']?>&page=1"><?= isset($news[$i][0]['category']) ? $news[$i][0]['category'] : ' '; ?></a>
            </div>
            <?php foreach (@$news[$i] as $article): ?>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 ">
                    <div class="panel-heading"><a href="/news/index?id=<?= $article['article_id'] ?>&page=1"><?= $article['title'] ?></a></div>
                    <div class="panel-body">
                        <?= isset($article['name']) ? $article['name'] : ' '; ?>
                    </div>
                    <div class="panel-body">
                        <?php if (is_array($article['tag'])): ?>

                            <?php for($k=0; $k < count($article['tag']);$k++):?>
                                <a href="/main/tag?tag=<?= $article['tag'][$k] ?>"><?= $article['tag'][$k] ?></a>
                            <?php endfor;?>

                        <?php else: ?>

                            <a href="/main/tag?tag=<?= $article['tag'] ?>"><?= $article['tag'] ?></a>
                            
                        <?php endif ?> 
                    </div>
                    <br />
                </div>
            <?php endforeach; ?>
        </div>
<?php endfor;?>