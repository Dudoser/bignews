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

		$id = $_GET['id'];
		$page = ($_GET['page'] - 1) * 5;

		$categories = $category->findOne($_GET['id']);
		 
		//$articles = $news->findPage($id, $page);

		if (!isset($_GET['analitics']))
		{
			$articles = $news->findBySql("SELECT * FROM news WHERE category_id = $id ORDER BY id DESC LIMIT $page, 5");
			$art_count = $news->findBySql("SELECT COUNT(id) AS total FROM news WHERE category_id = $id");
		}
		else
		{
			$articles = $news->findBySql("SELECT * FROM news WHERE analitics = '1' ORDER BY id DESC LIMIT $page, 5");
			$art_count = $news->findBySql("SELECT COUNT(id) AS total FROM news WHERE analitics = '1'");
		}
		$count_page = ceil($art_count[0]['total'] / 5);
			
		$this->set(compact('categories', 'articles', 'count_page'));
	}
  
  //   public function defaultAction()
  //   {
		// $category = new Category;

		// $categories = $category->findAll();

		// $this->set(compact('categories'));
  //   }

}

?>