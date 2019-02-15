<?php

use \yii\helpers\Html;
use \yii\helpers\Url;
use \yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>
<!DOCTYPE html>
<head>

</head>

<body>
    <div>
        <form action="#" name="chat_form" id="chat_form">
            <label>
                введите сообщение
                <input type="hidden" name="id" value="<?= $model->id?>">
                <input type="text" name="message">
                <input type="submit" id="submit" name="submit"/>
            </label>
            <div id="root_chat" >test</div>
        </form>

        <script src="http://10.0.1.10:8888/client.js"></script>
    </div>
</body>

