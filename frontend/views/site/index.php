<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

echo Html::a(Yii::t('app', 'Create New Project'), ['projects/create'], ['class' => 'btn btn-success']);

$dataProvider = new \yii\data\ActiveDataProvider([
    'query' => \common\models\tables\Projects::find()
]);

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'projects'
])

?>