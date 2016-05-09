<?php

use yii\helpers\Url;
use app\models\User;
?>

<aside class="nav-container">
    <div class="nav-wrapper">
        <ul class="nav-main">
            <li>
                <a href="<?= Url::to('/site') ?>">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to('/survey') ?>">
                    <i class="material-icons">assignment</i>
                    <span>Surveys</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to('/survey/statistics') ?>">
                    <i class="material-icons">insert_chart</i>
                    <span>Stats</span>
                </a>
            </li>
            <?php if(Yii::$app->user->identity->role_id == User::ADMIM): ?>
                <li>
                    <a href="<?= Url::to('/user') ?>">
                        <i class="material-icons">person_pin</i>
                        <span>Users Managment</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="side-logout">
                <a href="/site/logout">
                    <i class="material-icons">power_settings_new</i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>