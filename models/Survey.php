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
            'targeted_role_id'       => 'Targeted Role ID',
            'targeted_department_id' => 'Targeted Department ID',
            'publish_date'           => 'Publish Date',
            'end_date'               => 'End Date',
            'created_at'             => 'Created At',
            'updated_at'             => 'Updated At',
        ];
    }

    public function getQuestions(){
        return $this->hasMany(SurveyQuestion::className(), ['survey_id' => 'id']);
    }

    public function getDepartment(){
        return $this->hasOne(Department::className(), ['id' => 'targeted_department_id']);
    }

    public function getRole(){
        return $this->hasOne(Role::className(), ['id' => 'targeted_role_id']);
    }

}
