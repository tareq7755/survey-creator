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
class Question extends \yii\db\ActiveRecord
{
    const MULTIPLE_CHOICE = 1;
    const ESSAY = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
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
    /**
     * 
     * @param array $data
     * @return boolean
     */
    public function saveQuestions(array $data){
        if(!isset($data['surveyId']) || empty($data['surveyId'])){
            return false;
        }
        $surveyId = $data['surveyId'];
        unset($data['surveyId']);

        foreach($data as $type => $questions){
            switch($type){
                case self::ESSAY:
                    foreach($questions as $question){
                        $model            = new Question();
                        $model->survey_id = $surveyId;
                        $model->body      = $question;
                        $model->type      = $type;
                        $model->save(false);
                    }
                    break;
                case self::MULTIPLE_CHOICE:
                    foreach($questions as $question){
                        $model            = new Question();
                        $model->survey_id = $surveyId;
                        $model->body      = $question['body'];
                        $model->type      = $type;
                        if($model->save(false)){
                            foreach($question['options'] as $option){
                                $optionModel              = new QuestionOptions();
                                $optionModel->body        = $option;
                                $optionModel->question_id = $model->id;
                                $optionModel->save(false);
                            }
                        }
                    }
                    break;
            }
        }
    }
    
    public function getOptions(){
        return $this->hasMany(QuestionOptions::className(), ['question_id' => 'id']);
    }
    public function getAnswers(){
        return $this->hasMany(Answer::className(), ['question_id' => 'id']);
    }
    
}
