<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-02-18
 * Time: 20:37
 */

namespace common\components;


use common\models\tables\Projects;
use common\models\tables\TelegramSubscribe;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;

class Bootstrap extends Component implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $this->attachEventHandlers($app);
    }

    private function attachEventHandlers()
    {
        Event::on(Projects::class,Projects::EVENT_AFTER_INSERT, function ($event)
        {
            $bot = \Yii::$app->bot;

            $subscribers = TelegramSubscribe::find()
                ->select(['chat_id', 'channel'])
                ->where(['channel' => TelegramSubscribe::CHANNEL_PROJECT_CREATE])
                ->all();

            foreach ($subscribers as $user){
                $bot->sendMessage($user->chat_id, "Внимание!!! Создан новый проект!(вы подписаны на оповещение о создании проектов)");
            }
        }
        );
    }
}