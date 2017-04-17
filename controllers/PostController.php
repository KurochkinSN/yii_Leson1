<?php


namespace app\controllers;

use app\models\Post;

class PostController extends AppController
{
    public static $txt = ' => ';
    public function actionIndex(){
        // :TODO Пример работы с БД
        //$posts = Post::find()->all(); //<- Выводит все поля
        //$posts = Post::find()->select('id, title, excerpt')->all();
        //$posts = Post::find()->select('id, title, excerpt')->orderBy('id DESC')->all();
        //$posts = Post::find()->select('id, title, excerpt')->limit(2)->all();
        //Пагинация
        $query = Post::find()->select('id, title, excerpt')->orderBy('id DESC');
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'pageSizeParam' => false, 'forcePageParam' => false]); //pageSizeParam forcePageParam из URL убирает переменные что полностью убарть параметры редактируем web.php
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all(); // offset - с какой записи делаем выборку limit сколько записей выбираем
        //$this->debug($posts); //<-Использыем наш метод из родительского контроллера
        //debugs($posts); // а это используем нашу функцию из func.phpкоторый прописан в web\index.php
        //----------------
        //$hello = 'Привет';
        //$world = 'мир';
        //return $this->render('index',array('var' => $hello, 'world' => $world, 'txt' => self::$txt));

        return $this->render('index', compact('posts','pages'));
    }

    public function actionTest($name = 'Гость'){
        $test = 'Проверка связи';
        //return $this->render('test', ['test' => $test]);
        return $this->render('test', compact('test', 'name'));
    }

    public function actionHello($name = 'Гость'){
        $hello = 'Проверка связи';
        //return $this->render('test', ['test' => $test]);
        return $this->render('hello', compact('hello'));
    }
    
    public  function actionView($id){
        //id можно получить или через параметры метода как выше или через запрос как ниже
        //$id = \Yii::$app->request->get('id');
        $post = Post::findOne($id);
        if (empty($post)) throw new \yii\web\HttpException(404, 'Такой страницы нет, но в будущем может паоявится');
        return $this->render('view', compact('post'));
    }
}