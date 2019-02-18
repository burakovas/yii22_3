<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-02-16
 * Time: 08:43
 */
$script = <<<JS
    setInterval(function() {
      $("#btn-refresh").click();
    }, 1000);
JS;

$this->registerJs($script);
\yii\widgets\Pjax::begin();?>
    <div class="message-container">
        <?php
        echo \yii\helpers\Html::a("Refresh", ["telegram/receive"], ['id' => 'btn-refresh', 'name' => 'btn-refresh']);
        foreach ($messages as $message): ?>
            <div>
                <strong><?=$message['username']?></strong>
                <span><?=$message['text']?></span>
            </div>
         <?php endforeach; ?>
    </div>
<?php \yii\widgets\Pjax::end();?>
