$(document).ready(function () {

    var logo = $('.top-header .logo');
    var navContainer = $('.nav-container');
    var contentContainer = $('.content-container');

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

});



function addHover(val) {
    val.addClass('hover-menu');
}

function removeHover(val) {
    val.removeClass('hover-menu');
}