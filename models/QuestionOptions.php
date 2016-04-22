<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_options".
 *
 * @property integer $id
 * @property string $body
 * @property integer $question_id
 * @property string $created_at
 * @property string $updated_at
 */
class QuestionOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['body'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'body' => 'Body',
            'question_id' => 'Question ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
