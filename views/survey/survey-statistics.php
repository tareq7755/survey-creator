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
                    <div class="panel">   
                        <div class="statistics-container">
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
                            <?php foreach($survey->questions as $question): ?>  
                                <div class="survey-question-wrapper">                                                                      
                                    <?php if($question->type == Question::MULTIPLE_CHOICE): ?>
                                        <div class="question-chart" data-stats="<?= htmlspecialchars(json_encode($statistics[$question->id]), ENT_QUOTES, 'UTF-8'); ?>"></div>
                                    <?php else: ?>
                                        <div class="question-title">
                                            <h3><?= $question->body ?></h3>
                                            <?php if(!empty($question->answers)): ?>
                                                <?php foreach($question->answers as $answer): ?>
                                                    <div><?= $answer->body ?></div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>  
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
