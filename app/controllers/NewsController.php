<?php

namespace app\controllers;

use app\models\News;

/**
 * Description of Main
 *
 */
class NewsController extends AppController
{

	public function indexAction ()
	{
		$post = new News;

		$posts = $post->findOne($_GET['id']);

		$this->set(compact('posts'));
	}

	public function newsAction()
	{
		
	}

}
?>