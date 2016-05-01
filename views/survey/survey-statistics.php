<?php
$this->title = 'Surveys statistics';
echo $this->render('../partials/siteHeader');

use app\models\Question;
?>

<div class="main-container">
    <?= $this->render('../partials/sideNav'); ?>

    <div class="content-container">
        <div class="page-dashboard">
            <div class="row">
                <div class="col m12">
                    <div class="statistics-container">
                        <div class="panel"> 
                            <div class="viewSurvey-wrapper">
                                <div class="survey-title-wrapper">
                                    <h5 class="survey-title"><?= $survey->title; ?></h5>
                                </div>

                                <div class="general-info-wrapper">
                                    <div class="assignee-section">
                                        <div class="assignee-section-field">
                                            <label>role:</label>
                                            <span><?= $survey->role->name; ?>  </span>
                                        </div>
                                        <div class="assignee-section-field">
                                            <label>department:</label>
                                            <span><?= $survey->department->name; ?></span>
                                        </div>
                                    </div>

                                    <div class="date-section">
                                        <div class="assignee-section-field">
                                            <label>published:</label>
                                            <span><?= $survey->publish_date; ?></span>
                                        </div>
                                        <div class="assignee-section-field">
                                            <label>end:</label>
                                            <span><?= $survey->end_date; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($survey->questions as $question): ?>  
                            <div class="survey-question-wrapper">                                                                      
                                <?php if ($question->type == Question::MULTIPLE_CHOICE): ?>
                                    <div class="panel">   
                                        <div class="question-chart" data-stats="<?= htmlspecialchars(json_encode($statistics[$question->id]), ENT_QUOTES, 'UTF-8'); ?>"></div>
                                    </div>
                                <?php else: ?>
                                    <div class="panel">
                                        <div class="essay-answer-wrapper">
                                            <div class="question-title">
                                                <h5><?= $question->body ?></h5>
                                            </div>  
                                            <?php if (!empty($question->answers)): ?>
                                                <?php foreach ($question->answers as $answer): ?>
                                                    <div class="essay-answer-body"><?= $answer->body ?></div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
