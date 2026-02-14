<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\State;
class Client extends ActiveRecord{

    const CLIENT_ACTIVE = 0;
    const CLIENT_INACTIVE = 1;

    public static function tableName(): string {
        return '{{clients}}';
    }
    public function getState()
    {
        return $this->hasOne(State::class, ['id' => 'id_state']);
    }
}