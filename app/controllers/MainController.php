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

        
        if (isset($_POST['is_ajax'])) {

            $tags = new Tag;

            $listTag = $tags->findLike($_POST['input'], 'tag_name');

            $parseTag = json_encode($listTag);
            header("Content-type: application/json");
            print($parseTag);
            exit();
        
        }
        else
        {

            $category = new Category;
            $articles = new News;
            $categories = $category->findAll();

            for ($i=1; $i < 6; $i++) { 
                $news[$i] = $articles->findBySql("SELECT news.tag, news.id AS article_id, news.name AS title, news.date_create, news.image, news.hits, user.id AS user_id, user.name, category.id AS category_id, category.name AS category, news.id FROM `news` LEFT JOIN user ON news.user_id = user.id LEFT JOIN category ON news.category_id = category.id WHERE category_id = $i ORDER BY date_create DESC LIMIT 5");
            }

            for ($i=0; $i < count($news); $i++) { 
                for ($j=0; $j < count(@$news[$i]); $j++) { 
                    if ($news[$i][$j]['tag'] != '') {
                        if (strpos($news[$i][$j]['tag'], ',')) {
                            @$news[$i][$j]['tag'] = explode(',', $news[$i][$j]['tag']);
                        }
                    }
                }
            }

            $category = new Category;

            $categories = $category->findAll();

            $this->set(compact('categories', 'r'));

            $title = 'Главная страница';
            $this->set(compact('news', 'title', 'categories'));
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

    public function searchAction() {
        $category = new Category;
        $news = new News;

        if ($_POST['submit_filter']) {
            $sel_1 = $_POST['sel_1'];
            $sel_2 = $_POST['sel_2'];
            $date_1 = $_POST['calendar_1'];
            $date_2 = $_POST['calendar_2'];
            // $page = $_GET['page'];

            //$r = $news->findBySql("SELECT news.name, news.date_create FROM category left join news  ON category.name = '$sel_1' OR category.name = '$sel_2'");
            $r = $news->findBySql("SELECT news.name, news.date_create FROM category left join news  ON category.id = news.category_id WHERE category.name = '$sel_1' OR category.name = '$sel_2' OR category.name = 'sel_2' AND category.name = 'sel_1' AND news.date_create BETWEEN '$date_1' AND '$date_2'");
        }
        $this->set(compact('r'));

    }
    
}

?>
