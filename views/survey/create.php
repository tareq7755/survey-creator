<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Surveys */

$this->title = 'Create Surveys';
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
                        <div class="createSurvey-wrapper">
                            <?=
                            $this->render('_form', [
                                'model' => $model,
                                'roleModel' => $roleModel,
                                'departmentModel' => $departmentModel
                            ])
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
