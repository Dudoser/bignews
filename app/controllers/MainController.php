<?php

namespace app\controllers;

use app\models\Category;
use app\models\News;

/**
 * Description of Main
 *
 */
class MainController extends AppController{
    
//    public $layout = 'main';
    
    public function indexAction()
    {
        /*$model = new Main;
//        $res = $model->query("CREATE TABLE posts SELECT * FROM yii2_mini.post");
        $posts = $model->findAll();
        $posts2 = $model->findAll();
//        $post = $model->findOne(2);
//        $data = $model->findBySql("SELECT * FROM posts ORDER BY id DESC LIMIT 2");
//        $data = $model->findBySql("SELECT * FROM {$model->table} WHERE title LIKE ?", ['%то%']);
        $data = $model->findLike('Тест', 'name');
        debug($data);
        $title = 'PAGE TITLE';
        $this->set(compact('title', 'posts'));*/

        $category = new Category;
        $articles = new News;
        $categories = $category->findAll();

        for ($i=1; $i < 6; $i++) { 
            $news[$i] = $articles->findBySql("SELECT news.id AS article_id, news.name AS title, news.date_create, news.image, news.hits, user.id AS user_id, user.name, category.id AS category_id, category.name AS category FROM `news` LEFT JOIN user ON news.user_id = user.id LEFT JOIN category ON news.category_id = category.id WHERE category_id = $i ORDER BY date_create DESC LIMIT 5");
        }

        $title = 'Главная страница';
        $this->set(compact('news', 'title'));


    }

    public function testAction ()
    {

    	$test = "12312312321313";


    	$this->set(compact('test'));

    }
    
}

?>
