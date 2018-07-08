<div>
	<img src="../../../public/image/news/<?php echo $posts[0]['image']; ?>" />
	<h1><?php echo $posts[0]['name']; ?></h1>
	<p><?php echo $posts[0]['text']; ?></p>
	<?php if(isset($textForuser)) : ?>
		<h4 id="for-analitics"><?= $textForuser ?> <p>&darr;</p><a href="/auth/">Авторизовация</a></h4>
	<?php endif; ?>
	<p>Посещений: <span id="hits"><?php echo $posts[0]['hits']; ?></span></p>
	<p id="nowRead">Сейчас читают: 1</p>
	<p>теги: <?php echo $posts[0]['tag']; ?></p>
	<p><?php echo $posts[0]['date_create']; ?></p>
</div>

<div id="container-comment">
	<div class="user-coment col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<?php for ($i = 0; $i < count($comments); $i++): ?>
			
			<div class="row">
				<div class="comments col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<div class="user-image col-md-2 col-lg-2 col-sm-2 col-xs-2">
						<img src="../../../public/image/users/<?php echo $comments[$i]['user_image']; ?>" alt="user">
						<form method="POST" action="/news/index?id=<?= $_GET['id']?>&page=<?= $_GET['page']?>&commentId=<?= $comments[$i]['comment_id']?>&likes_now=<?= $comments[$i]['likes_news']?>">
							<div class="rate-comment">
								<!-- <div class="pluse" onclick="ratePluse(<?= $_GET['id'] ?>, <?php echo $comments[$i]['comment_id']; ?>)"> -->
								<?php if(isset($_SESSION['user_id'])) :?>
									<?php if(isset($checkLike[$i]) && $checkLike[$i]['pluse'] == 1 && $checkLike[$i]['comment_id'] == $comments[$i]['comment_id']) :?>
									<?php else: ?>
										<input type="submit" name="plus" value="&plus;" />
									<?php endif; ?>
								<?php endif; ?>
									
								<!-- </div> -->
								<div id="count-<?php echo $comments[$i]['comment_id']; ?>">
									<?php echo $comments[$i]['likes_news']; ?>
								</div>
								<!-- <div class="minus" onclick="rateMinus(<?= $_GET['id'] ?>, <?php echo $comments[$i]['comment_id']; ?>)"> -->
								<?php if(isset($_SESSION['user_id'])) :?>
									<?php if(isset($checkLike[$i]) && $checkLike[$i]['minus'] == 1 && $checkLike[$i]['comment_id'] == $comments[$i]['comment_id']) :?>
									<?php else: ?>
										<input type="submit" name="minus" value="&minus;" />
									<?php endif; ?>
								<?php endif; ?>
								<!-- </div> -->
							</div>
						</form>
					</div>
					<div class="comment-cont col-md-8 col-lg-8 col-sm-8 col-xs-8">
						<div class="user-name">
							<span><a href="#"><?php echo $comments[$i]['user_name']; ?></a></span>
						</div>
						<div class="user-comment-text">
							<p><?php echo $comments[$i]['comment_text']; ?></p>
						</div>
					</div>
					<div class="date-commet col-md-2 col-lg-2 col-sm-2 col-xs-2">
						<div class="user-comment-date">
							<?= $comments[$i]['date_create']; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endfor;?>
		<?php if(isset($_SESSION['user_id'])) :?>
		<div class="row">
			<form method="POST" action="/news/index?id=<?= $_GET['id']?>&page=<?= $_GET['page']?>" id="comment-form">
				<div id="error"></div>
				<textarea rows="4" cols="50" name='text' placeholder="Ну давай же, напиши комментарий! ;)" id="text-comment"></textarea>
				<div>
					<!-- <input type="button" value="Отправить" onclick="sendComment(<?= $_GET['id'] ?>)" name="write-comment" /> -->
					<input type="submit" value="Отправить" name="write-comment" />
				</div>
			</form>
		</div>
		<?php else : ?>
			<h4 id="for-analitics">Для того что бы оставить комментарий, вам нужно авторизироваться<p>&darr;</p><a href="/auth/">Авторизовация</a></h4>
		<?php endif; ?>
	</div>
</div>