<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
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
                        <div class="department-index">
                            <p>
                                <?= Html::a('Create Department', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>

                            <table class="highlight responsive-table departments-table">
                                <thead>
                                    <tr>
                                        <th data-field="id">ID</th>
                                        <th data-field="id">Name</th>
                                        <th data-field="price">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($departments as $department): ?>
                                        <tr>
                                            <td><?= $department->id; ?></td>
                                            <td><?= $department->name; ?></td>
                                            <td>
                                                <a href="<?= Url::to('/department/update?id=' . $department->id) ?>"><i class="material-icons">mode_edit</i></a>                                                
                                                <a href="<?= Url::to('/department/delete?id=' . $department->id) ?>" data-method="post" data-confirm="ddddd"><i class="material-icons">delete</i></a>
                                                <a href="<?= Url::to('/department/' . $department->id) ?>"><i class="material-icons">remove_red_eye</i></a>
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
