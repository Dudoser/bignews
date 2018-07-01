<span id="result"></span>
<br>
<br>
<br>
<br>
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