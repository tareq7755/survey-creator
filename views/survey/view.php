<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
                        <div class="created-survey-title-wrapper">
                            <h4 class="created-survey-title"><?= Html::encode($this->title) ?></h4>
                        </div>

                        <p>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?=
                            Html::a('Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ])
                            ?>
                        </p>

                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                'title',
                                'targeted_role_id',
                                'targeted_department_id',
                                'publish_date',
                                'end_date',
                                'created_at',
                                'updated_at',
                            ],
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
