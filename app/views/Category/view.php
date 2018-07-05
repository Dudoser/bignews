<?php foreach ($articles as $article): ?>
    <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 ">
        <div class="panel-heading"><a href="/news/index?id=<?=$article['id'];?>&page=<?=$_GET['page'];?>"><?= $article['name']; ?></a></div>
        <div class="panel-body">
            <?= $article['hits'] ?>
        </div>
        <br />
    </div>
<?php endforeach; ?>

<nav>
	<ul class="pagination">
		<?php for ($i=1; $i <= $count_page; $i++): ?>
		    <li class="active"><a href="/category/view/?id=<?=$_GET['id'];?>&page=<?=$i;?>""><?php echo $i; ?></a></li>
		<?php endfor; ?>
	</ul>
</nav>
