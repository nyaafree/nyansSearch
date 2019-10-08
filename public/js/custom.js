$(function(){

    $('.js-hover-menu').hover(function(){
        $('.js-hover-show:not(:animated)',this).slideDown();
    },function(){
        $('.js-hover-show:not(:animated)',this).slideUp();
    });
});
