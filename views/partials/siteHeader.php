<?php
    use yii\helpers\Url;
    use yii\bootstrap\Html;
?>
<header class="top-header">
    <div class="logo">
        <a href="/">Survey</a>
    </div>
    <div class="top-nav">
        <ul id="nav-profile" class="nav-profile right">
            
            <li><?=Html::a('Logout', ['/site/logout'])?></li>
            <li><a href="#">Admin</a></li>
            <li><a href="#"><i class="material-icons">account_circle</i></a></li>
        </ul>
    </div>
</header>
