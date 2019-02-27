<?php

/* @var $this yii\web\View */



$dataProvider = new \yii\data\ActiveDataProvider([
    'query' => \common\models\tables\Projects::find()
]);

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'projects'
])

?>