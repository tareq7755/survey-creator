<?php

namespace app\models;

/**
 * This is the model class for table "surveys".
 *
 * @property integer $id
 * @property string $title
 * @property integer $targeted_role_id
 * @property integer $targeted_department_id
 * @property string $publish_date
 * @property string $end_date
 * @property string $created_at
 * @property string $updated_at
 */
class Survey extends \yii\db\ActiveRecord{

    /**
     * @inheritdoc
     */
    public static function tableName(){
        return 'survey';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['targeted_role_id', 'targeted_department_id'], 'required'],
            [['targeted_role_id', 'targeted_department_id'], 'integer'],
            [['publish_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'id'                     => 'ID',
            'title'                  => 'Title',
            'targeted_role_id'       => 'Targeted Role',
            'targeted_department_id' => 'Targeted Department',
            'publish_date'           => 'Publish Date | yyyy-mm-dd',
            'end_date'               => 'End Date | yyyy-mm-dd',
            'created_at'             => 'Created At',
            'updated_at'             => 'Updated At',
        ];
    }

    public function getQuestions(){
        return $this->hasMany(Question::className(), ['survey_id' => 'id']);
    }

    public function getDepartment(){
        return $this->hasOne(Department::className(), ['id' => 'targeted_department_id']);
    }

    public function getRole(){
        return $this->hasOne(Role::className(), ['id' => 'targeted_role_id']);
    }
    
    public function getAnswers(){
        return $this->hasMany(Answer::className(), ['survey_id' => 'id']);
    }
    
    
    /**
     * 
     * @param \app\models\Survey $survey
     */
    public static function getStatistics(Survey $survey){
        $optionsData = [];
        $data        = [];
        foreach($survey->questions as $question){
            if($question->type == Question::MULTIPLE_CHOICE){
                foreach($question->options as $option){
                    $optionsData[$question->id][] = ['name' => $option->body, 'y' => Answer::find()->where(['option_id' => $option->id])->count()];
                }
                $data [$question->id] = [
                    'title'  => trim($question->body),
                    'series' => [
                        'name' => 'Answers',
                        'data' => $optionsData[$question->id]
                    ]
                ];
            }
        }
        return $data;
    }

}
