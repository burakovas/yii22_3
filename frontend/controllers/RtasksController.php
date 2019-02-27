<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-02-20
 * Time: 19:50
 */

namespace frontend\controllers;

use common\models\tables\Tasks;
use yii\rest\ActiveController;

class RtasksController extends ActiveController
{
    public $modelClass = Tasks::class;

}