<?php

namespace app\controllers;

use app\models\Category;
use app\models\News;

/**
 * Description of Main
 *
 */
class CategoryController extends AppController
{

	public function indexAction ()
	{
		$category = new Category;

		$categories = $category->findAll();

		$this->set(compact('categories'));
	}

	public function viewAction()
	{
		$category = new Category;
		$news = new News;

		$categories = $category->findOne($_GET['id']);
		$articles = $news->findWhere($_GET['id'], 'category_id');

		$this->set(compact('categories', 'articles'));
	}

}
?>