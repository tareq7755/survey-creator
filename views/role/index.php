<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
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
                        <div class="role-index">
                            <p>
                                <?= Html::a('Create Role', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>

                            <table class="highlight responsive-table roles-table">
                                <thead>
                                    <tr>
                                        <th data-field="id">ID</th>
                                        <th data-field="id">Name</th>
                                        <th data-field="price">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($roles as $role): ?>
                                        <tr>
                                            <td><?= $role->id; ?></td>
                                            <td><?= $role->name; ?></td>
                                            <td>
                                                <a href="<?= Url::to('/role/update?id=' . $role->id) ?>"><i class="material-icons">mode_edit</i></a>                                                
                                                <a href="<?= Url::to('/role/delete?id=' . $role->id) ?>" data-method="post" data-confirm="ddddd"><i class="material-icons">delete</i></a>
                                                <a href="<?= Url::to('/role/' . $role->id) ?>"><i class="material-icons">remove_red_eye</i></a>
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


