<?php
/* @var $this yii\web\View */

use app\models\User;
use yii\helpers\Url;

$this->title = 'My Yii Application';
echo $this->render('../partials/siteHeader');
?>

<div class="main-container">
    <?= $this->render('../partials/sideNav'); ?>
    <div class="content-container">
        <div class="page-dashboard">
            <div class="row">
                <div class="col m12">
                    <div class="panel main-chart" id="main-chart">
                    </div>
                    <div class="panel">
                        <table class="highlight responsive-table surveys-table">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="id">Title</th>
                                    <th data-field="price">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($surveys as $survey): ?>
                                    <tr>
                                        <td><?= $survey->id; ?></td>
                                        <td><?= $survey->title; ?></td>
                                        <td>
                                            <?php if(Yii::$app->user->identity->role_id == User::ADMIM): ?>
                                                <a href="<?= Url::to('/survey/update?id=' . $survey->id) ?>"><i class="material-icons">mode_edit</i></a>                                                
                                                <a href="<?= Url::to('/survey/delete?id=' . $survey->id) ?>" data-method="post" data-confirm="Are you sure?"><i class="material-icons">delete</i></a>
                                            <?php endif; ?>
                                            <a href="<?= Url::to('/survey/' . $survey->id) ?>"><i class="material-icons">remove_red_eye</i></a>
                                            <?php if(Yii::$app->user->identity->role_id != User::ADMIM) : ?>    
                                                <a href="<?= Url::to('/survey/answer?id=' . $survey->id) ?>"><i class="material-icons">import_contacts</i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                
</div>
