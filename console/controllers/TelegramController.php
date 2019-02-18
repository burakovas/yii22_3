<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-02-16
 * Time: 11:20
 */

namespace console\controllers;

use common\models\TelegramOffset;
use common\models\tables\TelegramSubscribe;
use SonkoDmitry\Yii\TelegramBot\Component;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\Update;
use yii\console\Controller;

class TelegramController extends Controller
{
    /** var Component */
    private $bot;
    private $offset = 0;

    public function init(){
        parent::init();
        $this->bot = \Yii::$app->bot;
    }

    public function actionIndex()
    {
        $updates = $this->bot->getUpdates($this->getOffset() + 1);
        $updCount = count($updates);
        if ($updCount > 0){
            foreach ($updates as $update){
                $this->updateOffset($update);
                $this->processCommand($update->getMessage());
            }

            echo "Новых сообщений: " . $updCount . PHP_EOL;
        } else {
            echo "Новых сообщений нет!" . PHP_EOL;
        }
    }

    private function getOffset()
    {
        $max = TelegramOffset::find()
            ->select('id')
            ->max('id');
        if($max > 0){
            $this->offset = $max;
        }
        return $this->offset;
    }


    private function updateOffset(Update $update)
    {
        $model = new TelegramOffset([
            'id' => $update->getUpdateId(),
            'timestamp_offset' => date("Y-m-d H:i:s")
        ]);
        $model->save();
    }

    private function processCommand(Message $message){
        $params = explode(" ", $message->getText());
        $command = $params[0];
        $response = "Unknown command";
        switch ($command){
            case '/help':
                $response = "Доступные команды: \n";
                $response .= "/help - список комманд \n";
                $response .= "/project_create ##project_name## - создание нового проекта \n";
                $response .= "/task_create ##task_name## ##responsible## ##project## - создание задачи \n";
                $response .= "/sp_create - подписка на создание проекта \n";
                break;

            case '/sp_create':
                $model = new TelegramSubscribe([
                   'chat_id' => $message->getFrom()->getId(),
                   'channel' => \common\models\tables\TelegramSubscribe::CHANNEL_PROJECT_CREATE
                ]);
                if($model->save()){
                    $response = "Вы подписаны на создания проектов";
                } else {
                    $response = "error";
                }
                break;

        }
        $this->bot->sendMessage($message->getFrom()->getId(), $response);
    }
}