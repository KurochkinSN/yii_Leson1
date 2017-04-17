<?php

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller
{
    public function debug($array){
        echo '<pre>' .print_r($array, true) .'</pre>';
    }
}