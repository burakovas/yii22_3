<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2018-12-26
 * Time: 16:44
 */

namespace common\widgets;
use yii\base\Widget;



class MyWidget extends Widget
{
    public $id;
    public $name = "Имя";
    public $date = "Дата завершения";
    public $responsible_id = "Исполнитель";
    public $created_at = "Дата постановки";
    public $admin_id = "Администратор";
    public $ready_date = "Дата выполения";
    public $ready = "Не выполнено";

    public function run(){


        return $this->render('my', [
            'id' => $this->id,
            'name' => $this->name,
            'date' => $this->date,
            'responsible_id' => $this->responsible_id,
            'created_at' => $this->created_at,
            'admin_id' => $this->admin_id,
            'ready_date' => $this->ready_date,
            'ready' => $this->ready
        ]);

    }
}