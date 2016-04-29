<?php

use app\models\Question;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Surveys */

$this->title                   = $model->title;
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
                                <form action="<?php Url::to('survey/answer') ?>" method="POST" id="answers-form">
                                    <?php foreach($model->questions as $question): ?>
                                        <div class="question-body-wrapper">
                                            <label>*</label>
                                            <span class="question-body">
                                                <?= $question->body ?>    
                                            </span>
                                            <?php if($question->type == Question::ESSAY): ?>
                                                <div class="input-field question-wrapper">
                                                    <textarea form="answers-form" name = "<?=Question::ESSAY?>[<?=$question->id?>]" id="<?=$question->id?>" class="materialize-textarea" required ></textarea>
                                                    <label for="<?=$question->id?>"></label>
                                                </div>
                                            <?php else: ?>
                                                <?php foreach($question->options as $option) : ?>
                                            <div class="option"> <input name="<?=Question::MULTIPLE_CHOICE?>[<?= $question->id ?>]" type="radio" value="<?= $option->id ?>" id="<?= $option->id ?>" required/>
                                                        <label for="<?= $option->id ?>"><?= $option['body'] ?> </label></div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                                    <div class="submit-btn-wrapper">
                                        <button type="submit" id="submit-answers" class="btn waves-effect waves-light right submit-btn">Submit</button>
                                    </div>
                                </form>                                    
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
