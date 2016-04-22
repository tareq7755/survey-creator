<?php
$this->title = 'My Yii Application';
echo $this->render('../partials/siteHeader');
?>

<div class="main-container">
    <?= $this->render('../partials/sideNav'); ?>
    <div class="content-container">
        <div class="page-dashboard">
            <div class="row">
                <div class="col m12">
                    <div class="panel">
                        <div class="questions-form-container multiple-choice-question">
                            <div class="input-field question-wrapper">
                                <textarea form="questions-form" name = "question-body" id="textarea1" class="materialize-textarea"></textarea>
                                <label for="textarea1" class="questionNum"></label>
                            </div>
                            <div class="input-field option-wrapper">
                                <input type="text" class="validate" name="question-option">
                                <label class="optionNum"></label>
                            </div>
                            <div class="input-field option-wrapper">
                                <input type="text" class="validate" name="question-option">
                                <label class="optionNum"></label>
                            </div>
                            <div class="add-option"><a href="#">Add option</a></div>
                        </div>
                        <div class="submit-btn-wrapper">
                            <div id="submit-questions" class="btn waves-effect waves-light right submit-btn">Submit</div>
                        </div>                            
                        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                        <div class="add-questiontype-wrapper">
                            <div class="add-question" id="add-question"><a href="#">Add question</a></div>
                            <div class="add-essay" id="add-essay"><a href="#">Add essay</a></div>
                        </div>
                        <input type="hidden" value="<?= $surveyId ?>" id="survey-id">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


