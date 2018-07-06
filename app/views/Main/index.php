<?php for ($i=0; $i < count($news)+1; $i++) :?>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 vi">
            <div class="panel-body">
                <a href="/category/view/?id=<?=$news[$i][0]['category_id']?>&page=1"><?= isset($news[$i][0]['category']) ? $news[$i][0]['category'] : ' '; ?></a>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="../../../public/image/news/no-image.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../../../public/image/news/no-image.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../../../public/image/news/no-image.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>  
        </div>
<?php endfor; ?>

<?php for ($i=0; $i < count($news)+1; $i++): ?>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 vi">
            <div class="panel-body">
                <a href="/category/view/?id=<?=$news[$i][0]['category_id']?>&page=1"><?= $news[$i][0]['category'] ?></a>

            </div>
            <?php foreach (@$news[$i] as $article): ?>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 ">
                    <div class="panel-heading"><a href="/news/index?id=<?= $article['article_id'] ?>&page=1"><?= $article['title'] ?></a></div>
                    <div class="panel-body">
                        <?= isset($article['name']) ? $article['name'] : ' '; ?>
                    <div class="panel-heading"><a href="/news/index/?id=<?=$article['id'];?>"><?= $article['title'] ?></a></div>
                    <div class="panel-body">
                        <?= $article['name']; ?>
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
        <img src="../../../public/image/news/no-image.png" />
<?php endfor; ?>