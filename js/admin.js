$(document).ready(function () {
    //sets variables for each section and sets them to hidden
    var btnNewsletter = $('#btnNewsletter');
    var btnReviews = $('#btnReviews');
    var btnCustomers = $('#btnCustomers');
    var btnWalks = $('#btnWalks');
    var btnDogs = $('#btnDogs');
    var btnReviewCode = $('#btnReviewCode');
    $('#newsletter').hide();
    $('#reviews').hide();
    $('#customers').hide();
    $('#walks').hide();
    $('#dogs').hide();
    $('#review-code').hide();

    //toggles visibility of each section in admin panel
    btnNewsletter.click(function () {
        $('#newsletter').toggle();
    });
    btnReviews.click(function () {
        $('#reviews').toggle();
    });
    btnCustomers.click(function () {
        $('#customers').toggle();
    });
    btnWalks.click(function () {
        $('#walks').toggle();
    });
    btnDogs.click(function () {
        $('#dogs').toggle();
    });
    btnReviewCode.click(function () {
        $('#review-code').toggle();
    });
    $('meta[name="robots"]').remove();
    $('head').append('<meta name="robots" content="noindex,nofollow">');
})