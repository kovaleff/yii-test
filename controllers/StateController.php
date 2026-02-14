<?php

namespace app\controllers;

use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\Response;

class StateController extends ActiveController
{
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

    public $modelClass = 'app\models\State';
}