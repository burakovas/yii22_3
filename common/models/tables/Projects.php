<?php

namespace common\models\tables;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    static function getProjectsList(){

        $projects = static::find()
            ->select(['id', 'name'])
            ->asArray()
            ->all();

        return $projectsList = ArrayHelper::map($projects,'id', 'name');
    }

}
