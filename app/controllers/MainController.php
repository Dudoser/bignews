<?php

namespace app\controllers;

use app\models\Category;
use app\models\News;
use app\models\Tag;

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


<<<<<<< HEAD
        if ($_POST['is_ajax']) {

            $tags = new Tag;

            $listTag = $tags->findLike($_POST['input'], 'tag_name');

            $parseTag = json_encode($listTag);
            header("Content-type: application/json");
            print($parseTag);
            exit();
        
=======
        for ($i=1; $i < 7; $i++) { 
            $news[$i] = $articles->findBySql("SELECT news.tag, news.id AS article_id, news.name AS title, news.date_create, news.image, news.hits, user.id AS user_id, user.name, category.id AS category_id, category.name AS category FROM `news` LEFT JOIN user ON news.user_id = user.id LEFT JOIN category ON news.category_id = category.id WHERE category_id = $i ORDER BY date_create DESC LIMIT 5");
>>>>>>> 4d0dea96e2d69c774a26b17b83efae2f3dead013
        }
        else
        {

            $category = new Category;
            $articles = new News;
            $categories = $category->findAll();

            for ($i=1; $i < 6; $i++) { 
                $news[$i] = $articles->findBySql("SELECT news.tag, news.id AS article_id, news.name AS title, news.date_create, news.image, news.hits, user.id AS user_id, user.name, category.id AS category_id, category.name AS category FROM `news` LEFT JOIN user ON news.user_id = user.id LEFT JOIN category ON news.category_id = category.id WHERE category_id = $i ORDER BY date_create DESC LIMIT 5");
            }

            for ($i=0; $i < count($news); $i++) { 
                for ($j=0; $j < count($news[$i]); $j++) { 
                    if ($news[$i][$j]['tag'] != '') {
                        if (strpos($news[$i][$j]['tag'], ',')) {
                            $news[$i][$j]['tag'] = explode(',', $news[$i][$j]['tag']);
                        }
                    }
                }
            }

            $title = 'Главная страница';
            $this->set(compact('news', 'title'));
        }


    }

    public function tagAction ()
    {   
        $tags = new Tag;
        $news = new News;

        if (empty($_GET['tag'])) {
            $result = $tags->findAll();
            $check = false;

        }
        else
        {
            $result = $news->findLike($_GET['tag'], 'tag');
            $check = true;
        }

        $title = "тег - " . $_GET['tag'];
    	$this->set(compact('result', 'check', 'title'));

    }
    
}

?>
