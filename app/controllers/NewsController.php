<?php

namespace app\controllers;

use app\models\News;
use app\models\Comment;
use app\models\Likes;

/**
 * Description of Main
 *
 */
class NewsController extends AppController
{

	public function indexAction ()
	{
		$post = new News;
		$comment = new Comment;
		$likes = new Likes;

		$id = $_GET['id'];
		$user_id = $_SESSION['user_id'];

		if (isset($_POST['write-comment'])) {
			
			$commentText = $_POST['text'];
			$articleId = $_GET['id'];
			$dateTime = date("Y-m-d H:i:s");

			

			$sendComment = $post->findBySql("INSERT INTO `comment` (`id`, `user_id`, `news_id`, `text`, `like_news`, `date_create`) VALUES (NULL, '1', '$articleId', '$commentText', '0', '$dateTime')");
			
			$last_id = $post->findBySql("SELECT id FROM `comment` ORDER BY id DESC LIMIT 1");
			$last_id = $last_id[0]['id'];

			$sendLike = $post->findBySql("INSERT INTO `likes` (`id`, `comment_id`, `user_id`, `news_id`, `count_likes`, `pluse`, `minus`) VALUES (NULL, '$last_id', '0', '$articleId', '0', '0', '0');");

		}
		


		/*if (isset($_POST['is_ajax'])) 
		{
			$listTag = "все хорошо";


			$commentText = $_POST['text'];
			$articleId = $_POST['id'];
			$dateTime = date("Y-m-d H:i:s");



			$sendComment = $post->findBySql("INSERT INTO `comment` (`id`, `user_id`, `news_id`, `text`, `like_news`, `date_create`) VALUES (NULL, '1', '$articleId', '$commentText', '0', '$dateTime')");

			$commentNew = $post->findBySql("SELECT user.id AS user_id, user.name AS user_name, user.image AS user_image, comment.id AS comment_id, comment.text AS comment_text, comment.like_news, comment.date_create FROM `comment` LEFT JOIN  user ON comment.user_id = user.id WHERE comment.news_id = $id ORDER BY comment.like_news DESC");

			$arrayComment = 
			[
				$sendComment,
				$commentNew
			];




			$parseComment = json_encode($commentNew);
            header("Content-type: application/json");
            print($parseComment);
            exit();
		}
		else 
		{*/
		/*if (isset($_POST['ajax_rate'])) {
			
			// $rate = "ты плюсанул! Красава!, но нам похеру, по этому мы ничего не сделали, нам похеру на твой плюс,пошел нахер!";

			//$rate = "ты шо конченый? ты чего минусуешь тут?! пошел нахер урод! нам такие гандоны не нужны!!";


			$article_id = $_POST['id'];
			$rateCount = $_POST['count_likes'];

			$rates = $comment->findBySql("UPDATE comment SET like_news = like_news + 1 WHERE id = $article_id");

			$parseComment = json_encode($rates);
            header("Content-type: application/json");
            print($parseComment);
            exit();

		}*/

		if (isset($_POST['plus'])) {
			$comment_id = $_GET['commentId'];
			$likes_now = $_GET['likes_now'];
			$id_user = $_SESSION['user_id'];
			$likes_now = $likes_now + 1;

			$checkL = $likes->findBySql("SELECT * FROM likes WHERE user_id = $id_user AND news_id = $comment_id");


				$rates = $likes->findBySql("UPDATE `likes` SET `user_id` = $id_user, `count_likes` = '$likes_now', `pluse` = '1', `minus` = '0' WHERE comment_id = $comment_id");
			
			unset($_GET['commentId']);
			unset($_GET['likes_now']);
		}
		if (isset($_POST['minus'])) {
			$comment_id = $_GET['commentId'];
			$likes_now = $_GET['likes_now'];
			$id_user = $_SESSION['user_id'];
			$likes_now = $likes_now - 1;


			$checkL = $likes->findBySql("SELECT * FROM likes WHERE comment_id = $comment_id");


				$rates = $comment->findBySql("UPDATE `likes` SET `user_id` = $id_user, `count_likes` = '$likes_now', `pluse` = '0', `minus` = '1' WHERE comment_id = $comment_id");

			unset($_GET['likes_now']);
			unset($_GET['commentId']);
		}

			
			$posts = $post->findOne($_GET['id']);

			if ($posts[0]['analitics'] == 1) {
				if (empty($_SESSION) && !isset($_SESSION['user_id']) && count($_SESSION) != 4) {
					
					
					
					$textNews = $posts[0]['text'];

					$textNews = explode('.', $textNews);
					$textNews = array_slice($textNews, 0, 5);
					$textNews = implode('.', $textNews);
					$posts[0]['text'] = $textNews . ' ...';

					$textForuser = 'Для того что бы прочитать новость целиком, вам нужно авторизоваться';
				}
			}

			$checkLike = $likes->findBySql("SELECT comment_id, pluse, minus FROM `likes` WHERE user_id = $user_id AND news_id = $id ORDER BY count_likes DESC");


			
			$comments = $comment->findBySql("SELECT (SELECT count_likes FROM `likes` WHERE comment_id = comment.id ORDER BY id DESC LIMIT 1) AS likes_news, user.id AS user_id, user.name AS user_name, user.image AS user_image, comment.id AS comment_id, comment.text AS comment_text, comment.date_create FROM `comment` LEFT JOIN user ON comment.user_id = user.id LEFT JOIN likes ON comment.id = likes.comment_id WHERE comment.news_id = $id GROUP BY likes.comment_id ORDER BY likes_news DESC");


			// die(debug($checkLike));

			// die(debug($checkLike));
			//$checkLike = $likes->findBySql("SELECT comment_id, pluse, minus FROM `likes` WHERE user_id = $user_id");


			// SELECT comment_id, SUM(pluse) - SUM(minus) AS all_likes, pluse, minus FROM `likes` WHERE user_id = 1 AND comment_id = 401

			// $comments = $comment->findBySql("SELECT COUNT(likes.comment_id) AS likes_news, user.id AS user_id, user.name AS user_name, user.image AS user_image, comment.id AS comment_id, comment.text AS comment_text, comment.date_create FROM `comment` LEFT JOIN user ON comment.user_id = user.id LEFT JOIN likes ON comment.id = likes.comment_id WHERE comment.news_id = 37 GROUP BY likes.comment_id ORDER BY comment.like_news DESC");

			// $comments = $comment->findBySql("SELECT user.id AS user_id, user.name AS user_name, user.image AS user_image, comment.id AS comment_id, comment.text AS comment_text, comment.like_news, comment.date_create FROM `comment` LEFT JOIN  user ON comment.user_id = user.id WHERE comment.news_id = $id ORDER BY comment.like_news DESC");


			// $like_news = $likes->findBySql("SELECT * FROM `likes` WHERE comment_id = $comments[0] GROUP BY id");


			$title = 'новость';
			$this->set(compact('posts', 'comments', 'title', 'textForuser', 'checkLike'));
		// }

	}

}
?>