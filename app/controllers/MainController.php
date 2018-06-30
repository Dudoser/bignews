<?php

namespace app\controllers;

use app\models\Main;

/**
 * Description of Main
 *
 */
class MainController extends AppController{
    
//    public $layout = 'main';
    
    public function indexAction(){
        $model = new Main;
//        $res = $model->query("CREATE TABLE posts SELECT * FROM yii2_mini.post");
        $posts = $model->findAll();
        $posts2 = $model->findAll();
//        $post = $model->findOne(2);
//        $data = $model->findBySql("SELECT * FROM posts ORDER BY id DESC LIMIT 2");
//        $data = $model->findBySql("SELECT * FROM {$model->table} WHERE title LIKE ?", ['%то%']);
        $data = $model->findLike('Тест', 'title');
        debug($data);
        $title = 'PAGE TITLE';
        $this->set(compact('title', 'posts'));
    }
    
}
