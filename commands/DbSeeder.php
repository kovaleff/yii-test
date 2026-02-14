<?php
namespace app\commands;

use app\models\Client;
use app\models\State;
use yii\console\Controller;
use Faker;
class DbSeeder extends Controller
{
    public function actionIndex($message = 'Привет, мир!')
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 20) as $i) {
            $stateName = $faker->country();
            $state = new State();
            $state->name = str_replace(' ', '',$stateName);
            $state->save();
        }
        foreach (range(1, 10) as $i) {
            $client = new Client();
            $client->id_state = State::find()->orderBy('rand()')->one()->id;
            $client->name = $faker->name();
            $client->status = Client::CLIENT_ACTIVE;
            $client->save();
        }
    }
}