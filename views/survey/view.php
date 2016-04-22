<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Question;

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
                        <div class="created-survey-title-wrapper">
                            <h4 class="created-survey-title"><?= Html::encode($this->title) ?></h4>
                        </div>

                        <div class="survey-wrapper">
                            <h4><?= $model->title; ?></h4>
                        </div>

                        <div>
                            role: <?= $model->role->name; ?>
                        </div>

                        <div>
                            department: <?= $model->department->name; ?>
                        </div>

                        <div>
                            published: <?= $model->publish_date; ?>
                        </div>

                        <div>
                            end: <?= $model->end_date; ?>
                        </div>

                        <div class="question-container">
                            <?php foreach($model->questions as $question): ?>
                                <div>
                                    id: <?= $question->id ?>    
                                </div>
                                <div>
                                    body: <?= $question->body ?>    
                                </div>

                                <?php if($question->type == Question::MULTIPLE_CHOICE): ?>

                                    <?php foreach($question->options as $option) : ?>
                                        <div> Option: <?= $option['body'] ?> </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
