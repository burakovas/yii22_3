<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-02-16
 * Time: 08:18
 */

namespace frontend\controllers;
use yii\web\Controller;

class TelegramController extends Controller
{
    public function actionReceive(){
        /** var Component $bot */
        $bot = \Yii::$app->bot;
        $bot->setCurlOption(CURLOPT_TIMEOUT, 20);
        $bot->setCurlOption(CURLOPT_CONNECTTIMEOUT, 10);
        $bot->setCurlOption(CURLOPT_HTTPHEADER , ['Expect:']);


        $updates = $bot->getUpdates();

            $messages = [];
            foreach ($updates as $update){
                $message = $update->getMessage();
                $username = $message->getFrom()->getFirstName() . ' ' .
                    $message->getFrom()->getLastName() ;
                $messages[] = [
                    'text' => $message->getText(),
                    'username' => $username,
                ];
            }

            return $this->render('receive', ['messages' => $messages]);
    }

    public function actionSend(){

        /** var Component $bot */
        // для всех кто подписан на \common\models\tables\TelegramSubscribe::CHANNEL_PROJECT_CREATE
        // отправить сообщения что создан новый проект
        
        $bot = \Yii::$app->bot;
        $bot->sendMessage(171025169, 'News!!!');
    }
}