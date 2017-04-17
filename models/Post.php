<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        //return parent::tableName(); // TODO: Имя таблицы по умолчанию это имя класса
        return 'post';
    }
}