<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surveys';
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

                            <p>
                                <?= Html::a('Create Surveys', ['create'], ['class' => 'btn']) ?>
                            </p>

                            <?=
                            GridView::widget([
                                'dataProvider' => $dataProvider,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'id',
                                    'title',
                                    'targeted_role_id',
                                    'targeted_department_id',
                                    'publish_date',
                                    // 'end_date',
                                    // 'created_at',
                                    // 'updated_at',
                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]);
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
