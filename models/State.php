<?php

namespace app\models;

use yii\db\ActiveRecord;

class State extends ActiveRecord{
    public static function tableName(): string {
        return '{{states}}';
    }

}