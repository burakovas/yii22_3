
<a href="/task/one?id=<?= $model->id ?>">
    
<?= \common\widgets\MyWidget::widget([
    'id' => $model->id,
    'name' => $model->name,
    'date' => $model->date,
    'responsible_id' => \common\models\tables\Users::getUserName($model->responsible_id),
    'admin_id' => \common\models\tables\Users::getUserName($model->admin_id),
    'created_at' => $model->created_at,
    'ready_date' => $model->ready_date,
    'ready' => $model->ready,
])?>

</a>
