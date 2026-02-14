<?php

namespace app\controllers;

use tuyakhov\jsonapi\ResourceInterface;
use tuyakhov\jsonapi\ResourceTrait;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\Response;

class ClientController extends ActiveController implements ResourceInterface {

    use ResourceTrait;

    public $serializer = [
        'class' => 'tuyakhov\jsonapi\Serializer',
        'pluralize' => false,  // makes {"type": "user"}, instead of {"type": "users"}
    ];
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/vnd.api+json' => Response::FORMAT_JSON,
                    'application/json' => Response::FORMAT_JSON,
                ],
            ]
        ]);
    }

    public $modelClass = 'app\models\Client';

}
