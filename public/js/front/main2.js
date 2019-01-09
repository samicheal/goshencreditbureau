$(document).ready(function(){


    function startOverlayAll(overlayId){


        $('.overlay-veil').fadeTo("500","0.8",function(){});

        $('.overlay-component').fadeIn("200");

        $('.overlay-component').addClass('active');


    }


    function closeOverlayAll(overlayId){

        $('.overlay-component').each(function(){

            if($(this).hasClass('active')){
                $('.overlay-veil').fadeOut();
                $(this).fadeOut("300",function(){
                    $(this).removeClass('active');
                });
            }

        });

        if(overlayId !== false){
            startOverlayAll(overlayId);
        }



    }

    $('.closeOverlay').on("click",function(){
        closeOverlayAll(false);
    });


    $('.overlay-item-click').on("click",function(e){
        e.preventDefault();

        var overlayId = 1;
        $('#name').html($(this).data('name'));
        $('#company').html($(this).data('company'));
        $('#email').html($(this).data('email'));
        $('#case').html($(this).data('case'));
        $('#amount').html($(this).data('amount'));
        $('#judge').html($(this).data('judge'));
        $('#owner').html($(this).data('owner'));
        $('#address').html($(this).data('address'));
        //alert($(this).data('name'));

        closeOverlayAll(overlayId);
    });

    //$('.check').on("keyup",function(){
        //var value = $(this).val();
        //if(value.length > 1){
            //$('p.error').show();
        //}
        //else{
            //$('p.error').hide();
        //}
        
    //});

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