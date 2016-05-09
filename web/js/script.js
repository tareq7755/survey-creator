$(document).ready(function () {

    var logo = $('.top-header .logo');
    var navContainer = $('.nav-container');
    var contentContainer = $('.content-container');

    $('#submit-questions').bind('click', saveQuestions);

    navContainer.mouseover(function () {
        addHover($(this));
        addHover(logo);
        addHover(contentContainer);
    });

    navContainer.mouseleave(function () {
        removeHover($(this));
        removeHover(logo);
        removeHover(contentContainer);
    });

    $('select').material_select();

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    /////////////////////////////////////////////////////////////////////////

    var question = "<div class='questions-form-container multiple-choice-question'><div class='input-field question-wrapper'><textarea form='questions-form' name = 'question-body' id='textarea1' class='materialize-textarea'></textarea><label for='textarea1' class='questionNum'></label></div><div class='input-field option-wrapper'><input type='text' class='validate' name='question-option'><label class='optionNum'></label></div><div class='input-field option-wrapper'><input type='text' class='validate'><label class='optionNum'></label></div><div class='add-option'><a href='#'>Add option</a></div><a href='#' class='delete-question'>delete question</a></div>";

    var essay = "<div class='questions-form-container essay-question'><div class='input-field question-wrapper'><textarea id='textarea1' class='materialize-textarea'></textarea><label for='textarea1' class='questionNum'></label></div><a href='#' class='delete-question'>delete question</a></div>";

    var option = "<div class='input-field option-wrapper'><input type='text' class='validate'><label class='optionNum'></label><a href='#' class='remove-option-wrapper'><i class='material-icons remove-option'>&#xE15D;</i></a></div>";

    $(document).on('click', '#add-question', function () {
        $('.submit-btn-wrapper').before(question);
    });

    $(document).on('click', '#add-essay', function () {
        $('.submit-btn-wrapper').before(essay);
    });

    $(document).on('click', '.questions-form-container .add-option a', function (e) {
        e.preventDefault();
        $(this).before(option);
    });
    
    $(document).on('click', '.multiple-choice-question .remove-option-wrapper', function(e) {
        e.preventDefault();
        $(this).closest('.option-wrapper').remove();
    });
    
    $(document).on('click', '.delete-question', function() {
       $(this).closest('.questions-form-container').remove();
    });



});



function addHover(val) {
    val.addClass('hover-menu');
}

function removeHover(val) {
    val.removeClass('hover-menu');
}

function saveQuestions() {
    var essayQuestions = [];
    var multipleChoiceQuestions = [];
    var surveyId = $('#survey-id').val();
    $('.questions-form-container').each(function () {
        if ($(this).hasClass('essay-question')) {
            essayQuestions.push($(this).find('textarea').val());
        } else {
            var question = {};
            var options = [];
            question.body = $(this).find('textarea').val();
            $(this).find('input').each(function () {
                options.push($(this).val());
            });
            question.options = options;
            multipleChoiceQuestions.push(question);
        }
    });        
    $.post('create', {1: multipleChoiceQuestions, 0: essayQuestions, 'surveyId': $('#survey-id').attr('value')});
    
}