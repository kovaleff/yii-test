<?php
namespace app\models;

use tuyakhov\jsonapi\ResourceInterface;
use tuyakhov\jsonapi\ResourceTrait;
use yii\db\ActiveRecord;
use app\models\State;
class Client extends ActiveRecord implements ResourceInterface {

    use ResourceTrait;

    const CLIENT_ACTIVE = 0;
    const CLIENT_INACTIVE = 1;

    public static function tableName(): string {
        return '{{clients}}';
    }

    public function rules()
    {
        return [
          ['name' => 'safe'],
          ['id_state' => 'safe'],
          ['status' => 'safe'],
//          'name' => 'safe',
//          'id_state' => 'safe',
//          'status' => 'safe',
        ];
    }

    public function getState()
    {
        return $this->hasOne(State::class, ['id' => 'id_state']);
    }
}