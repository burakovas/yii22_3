<?php

$dataProvider = new \yii\data\ActiveDataProvider([
    'query' => \common\models\tables\Tasks::find()
        ->where(['responsible_id' => Yii::$app->user->id])

]);

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'view'
]);



