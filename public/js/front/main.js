$(document).ready(function(){


    $('a[data-option="1"]').on("click",function(e){
        e.preventDefault();
        $('a[data-option="1"]').addClass('hidden');
        $('a[data-option="2"]').removeClass('hidden');
        $('form').addClass('hidden');
        $('form[data-item="1"]').removeClass('hidden');
    });
    $('a[data-option="2"]').on("click",function(e){
        e.preventDefault();
        $('a[data-option="2"]').addClass('hidden');
        $('a[data-option="1"]').removeClass('hidden');
        $('form').addClass('hidden');
        $('form[data-item="2"]').removeClass('hidden');
    });


});