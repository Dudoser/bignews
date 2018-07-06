<?php

namespace app\controllers;

use app\models\News;
use app\models\Comment;

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

		$id = $_GET['id'];

		if (isset($_POST['write-comment'])) {
			
			$commentText = $_POST['text'];
			$articleId = $_GET['id'];
			$dateTime = date("Y-m-d H:i:s");

			$sendComment = $post->findBySql("INSERT INTO `comment` (`id`, `user_id`, `news_id`, `text`, `like_news`, `date_create`) VALUES (NULL, '1', '$articleId', '$commentText', '0', '$dateTime')");

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

		// die(debug($_GET));

		if (isset($_POST['plus'])) {

			$comment_id = $_GET['commentId'];
			$rates = $comment->findBySql("UPDATE comment SET like_news = like_news + 1 WHERE id = $comment_id");
			unset($_GET['commentId']);
		}
		if (isset($_POST['minus'])) {
			$comment_id = $_GET['commentId'];
			$rates = $comment->findBySql("UPDATE comment SET like_news = like_news - 1 WHERE id = $comment_id");
			unset($_GET['commentId']);
		}

			
			$posts = $post->findOne($_GET['id']);

			// die(debug($posts[0]['analitics']));
			if ($posts[0]['analitics'] == 1) {
				if (empty($_SESSION) && !isset($_SESSION['user_id']) && count($_SESSION) != 4) {
					
					
					
					$textNews = $posts[0]['text'];

					// $textNews = str_replace('.', '#.', subject);

					$textNews = explode('.', $textNews);
					$textNews = array_slice($textNews, 0, 5);
					$textNews = implode('.', $textNews);
					$posts[0]['text'] = $textNews . ' ...';

					$textForuser = 'Для того что бы прочитать новость целиком, вам нужно авторизоваться';
				}
			}

			
			$comments = $comment->findBySql("SELECT user.id AS user_id, user.name AS user_name, user.image AS user_image, comment.id AS comment_id, comment.text AS comment_text, comment.like_news, comment.date_create FROM `comment` LEFT JOIN  user ON comment.user_id = user.id WHERE comment.news_id = $id ORDER BY comment.like_news DESC");


			$title = 'новость';
			$this->set(compact('posts', 'comments', 'title', 'textForuser'));
		// }

	}

}
?>