<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "survey_questions".
 *
 * @property integer $id
 * @property integer $survey_id
 * @property integer $type
 * @property string $body
 * @property string $created_at
 * @property string $updated_at
 */
class SurveyQuestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'survey_questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['survey_id', 'type'], 'integer'],
            [['body'], 'string'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'survey_id' => 'Survey ID',
            'type' => 'Type',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
