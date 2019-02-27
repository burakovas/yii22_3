<?php

use \yii\helpers\Html;
use \yii\helpers\Url;
use \yii\widgets\ActiveForm;

/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-02-26
 * Time: 21:36
 */



    $form = ActiveForm ::begin(['action' => Url::to(['site/project', 'id' => $model->id])]);?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= Html::submitButton('Save') ?>
    <?= Html::a('Delete Project', ['delete'], ['class' => 'btn btn-default']) ?>
    <?php ActiveForm::end();

    $tasks = \common\models\tables\Tasks::find()
        ->where(['project_id' => $model->id])
        ->all();
    echo "<br><br>";
    echo "СПИСОК ЗАДАЧ В ПРОЕКТЕ: <br><br>";
    foreach ($tasks as $task): ?>
        <p><?="Ответственный: ".\common\models\tables\Users::getUserName($task->responsible_id)?>
            <?= "Наименование задачи: ".$task->name ?></p>
     <?php endforeach; ?>



