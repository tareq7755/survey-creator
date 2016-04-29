<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\User;

$this->title                   = 'Surveys';
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
                        <div class="surveys-index">                            
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
                                                <a href="<?= Url::to('/survey/statistics?id=' . $survey->id) ?>"><i class="material-icons">insert_chart</i></a>                                                
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
</div>
