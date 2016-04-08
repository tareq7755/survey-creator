<?php
    use yii\helpers\Url;
?>

<aside class="nav-container">
    <div class="nav-wrapper">
        <ul class="nav-main">
            <li>
                <a href="<?= Url::to('/site')?>">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to('/survey')?>">
                    <i class="material-icons">assignment</i>
                    <span>Surveys</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">insert_chart</i>
                    <span>Stats</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to('/user')?>">
                    <i class="material-icons">person_pin</i>
                    <span>Users Managment</span>
                </a>
            </li>
            <li class="side-logout">
                <a href="#">
                    <i class="material-icons">power_settings_new</i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>