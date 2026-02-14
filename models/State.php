<?php

namespace app\models;

use tuyakhov\jsonapi\ResourceInterface;
use tuyakhov\jsonapi\ResourceTrait;
use yii\db\ActiveRecord;

class State extends ActiveRecord implements ResourceInterface {

    use ResourceTrait;

    public static function tableName(): string {
        return '{{states}}';
    }

}