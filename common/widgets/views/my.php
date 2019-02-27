
<?php

\common\assets\MyWidgetAsset::register($this);

$today = date("Y-m-d");
 if($today > $date) {
     echo \yii\helpers\Html::beginTag('div', ['class' => 'brd_red']);
        } else {
            echo \yii\helpers\Html::beginTag('div', ['class' => 'brd']);
            }



//<div class="brd">
?>
    <h5>Название: <?=$name ?></h5>
    <p>Исполнитель: <?= $responsible_id ?></p><span>Дэдлайн: <?= $date ?></span>
    <p>Дата постановки: <?= $created_at ?></p><span>Администратор: <?= $admin_id ?></span>
<?php
//echo $ready;

    if($ready != 0){
        echo \yii\helpers\Html::tag('p',  "дата выполнения: " . $ready_date);
    }

echo \yii\helpers\Html::endTag('div');

?>