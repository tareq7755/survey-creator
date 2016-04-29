<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property integer $id
 * @property integer $survey_id
 * @property integer $question_id
 * @property integer $option_id
 * @property integer $user_id
 * @property string $body
 * @property string $created_at
 * @property string $updated_at
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['survey_id', 'question_id', 'option_id', 'user_id'], 'integer'],
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
            'question_id' => 'Question ID',
            'option_id' => 'Option ID',
            'user_id' => 'User ID',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * 
     * @param array $essays
     * @param array $multiples
     * @param type $surveyId
     */
    public function saveSurveyAnswers(array $essays, array $multiples, $surveyId){
        if(!empty($essays)){            
            foreach($essays as $questionId => $answerBody){
                $answer              = new Answer();
                $answer->question_id = $questionId;
                $answer->survey_id   = $surveyId;
                $answer->body        = $answerBody;
                $answer->user_id     = Yii::$app->user->id;
                $answer->updated_at  = date('Y-m-d h:i:s');                
                $answer->save(false);
            }
        }
        if(!empty($multiples)){
            foreach($multiples as $questionId => $optionId){
                $answer              = new Answer();
                $answer->question_id = $questionId;
                $answer->survey_id   = $surveyId;
                $answer->option_id   = $optionId;
                $answer->user_id     = Yii::$app->user->id;
                $answer->updated_at  = date('Y-m-d h:i:s');
                $answer->save(false);
            }
        }
    }

}
