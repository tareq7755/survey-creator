<?php
/* @var $this yii\web\View */

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
                                    <th data-field="id">Title</th>
                                    <th data-field="name">Responses</th>
                                    <th data-field="price">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Survey1</td>
                                    <td>20</td>
                                    <td>
                                        <a href="#"><i class="material-icons">mode_edit</i></a>
                                        <a href="#"><i class="material-icons">delete</i></a>
                                        <a href="#"><i class="material-icons">remove_red_eye</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Survey2</td>
                                    <td>30</td>
                                    <td>
                                        <a href="#"><i class="material-icons">mode_edit</i></a>
                                        <a href="#"><i class="material-icons">delete</i></a>
                                        <a href="#"><i class="material-icons">remove_red_eye</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Survey3</td>
                                    <td>10</td>
                                    <td>
                                        <a href="#"><i class="material-icons">mode_edit</i></a>
                                        <a href="#"><i class="material-icons">delete</i></a>
                                        <a href="#"><i class="material-icons">remove_red_eye</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Survey4</td>
                                    <td>100</td>
                                    <td>
                                        <a href="#"><i class="material-icons">mode_edit</i></a>
                                        <a href="#"><i class="material-icons">delete</i></a>
                                        <a href="#"><i class="material-icons">remove_red_eye</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Survey5</td>
                                    <td>15</td>
                                    <td>
                                        <a href="#"><i class="material-icons">mode_edit</i></a>
                                        <a href="#"><i class="material-icons">delete</i></a>
                                        <a href="#"><i class="material-icons">remove_red_eye</i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>                
</div>
