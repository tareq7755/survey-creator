<?php
use app\models\Question;

/* @var $this yii\web\View */
/* @var $model app\models\Surveys */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Surveys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
echo $this->render('../partials/siteHeader');
?>
<div class="main-container">
    <?= $this->render('../partials/sideNav'); ?>

    <div class="content-container">
        <div class="page-dashboard">
            <div class="row">
                <div class="col m12">
                    <div class="panel">

                        <div class="viewSurvey-wrapper">
                            <div class="survey-title-wrapper">
                                <h5 class="survey-title"><?= $model->title; ?></h5>
                            </div>

                            <div class="general-info-wrapper">
                                <div class="assignee-section">
                                    <div class="assignee-section-field">
                                        <label>Role:</label>
                                        <span><?= $model->role->name; ?>  </span>
                                    </div>
                                    <div class="assignee-section-field">
                                        <label>Department:</label>
                                        <span><?= $model->department->name; ?></span>
                                    </div>
                                </div>

                                <div class="date-section">
                                    <div class="assignee-section-field">
                                        <label>Publish Date:</label>
                                        <span><?= $model->publish_date; ?></span>
                                    </div>
                                    <div class="assignee-section-field">
                                        <label>End Date:</label>
                                        <span><?= $model->end_date; ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="question-container">
                                <?php foreach ($model->questions as $question): ?>
                                    <div class="question-body-wrapper">
                                        <label>*</label>
                                        <span class="question-body">
                                            <?= $question->body ?>    
                                        </span>
                                    
                                        <?php if ($question->type == Question::MULTIPLE_CHOICE): ?>

                                            <?php foreach ($question->options as $option) : ?>
                                                <div class="option"><?= $option['body'] ?> </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
