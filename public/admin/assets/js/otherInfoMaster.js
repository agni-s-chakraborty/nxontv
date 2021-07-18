jQuery(document).ready(function() {
     // Form Sel
    $('[name=category_type]').on('change', function() {
        //======================== Cast Start  Selector  ========================
        $('[name=cast_name]').closest('.col-md-3').addClass('d-none');
        $('[name=cast_image]').closest('.col-md-3').addClass('d-none');
        $('.cast_about').closest('.col-md-3').addClass('d-none');
        $('.cast_film').closest('.col-md-3').addClass('d-none');
        $('.cast_award').closest('.col-md-3').addClass('d-none');
        $('.cast_buton').closest('.col-md-3').addClass('d-none');
        $('.cast_buton').closest('.reset').addClass('d-none');

        //========================== Director Start Selector =======================

        $('[name=director_name]').closest('.col-md-3').addClass('d-none');
        $('[name=director_image]').closest('.col-md-3').addClass('d-none');
        $('.director_about').closest('.col-md-3').addClass('d-none');
        $('.director_best_film').closest('.col-md-3').addClass('d-none');
        $('.director_award').closest('.col-md-3').addClass('d-none');
        $('.director_buton').closest('.col-md-3').addClass('d-none');
        $('.director_buton').closest('.reset').addClass('d-none');

        //========================== Writer Start Selector  =========================

        $('[name=writer_name]').closest('.col-md-3').addClass('d-none');
        $('[name=writer_image]').closest('.col-md-3').addClass('d-none');
        $('.writer_about').closest('.col-md-3').addClass('d-none');
        $('.writer_best_film').closest('.col-md-3').addClass('d-none');
        $('.writer_award').closest('.col-md-3').addClass('d-none');
        $('.writer_buton').closest('.col-md-3').addClass('d-none');
        $('.writer_buton').closest('.reset').addClass('d-none');

        //========================== Producer Start Seletor ============================

        $('[name=producer_name]').closest('.col-md-3').addClass('d-none');
        $('[name=producer_image]').closest('.col-md-3').addClass('d-none');
        $('.producer_about').closest('.col-md-3').addClass('d-none');
        $('.producer_best_film').closest('.col-md-3').addClass('d-none');
        $('.producer_award').closest('.col-md-3').addClass('d-none');
        $('.producer_buton').closest('.col-md-3').addClass('d-none');
        $('.producer_buton').closest('.reset').addClass('d-none');

        //====================================  End Selector ============================

        if($(this).val() == 'cast'){
            $('[name=cast_name]').closest('.col-md-3').removeClass('d-none');
            $('[name=cast_image]').closest('.col-md-3').removeClass('d-none');
            $('.cast_about').closest('.col-md-3').removeClass('d-none');
            $('.cast_film').closest('.col-md-3').removeClass('d-none');
            $('.cast_award').closest('.col-md-3').removeClass('d-none');
            $('.cast_buton').closest('.col-md-3').removeClass('d-none');
            $('.cast_buton').closest('.reset').removeClass('d-none');

        }else if($(this).val() == 'director'){

            $('[name=director_name]').closest('.col-md-3').removeClass('d-none');
            $('[name=director_image]').closest('.col-md-3').removeClass('d-none');
            $('.director_about').closest('.col-md-3').removeClass('d-none');
            $('.director_best_film').closest('.col-md-3').removeClass('d-none');
            $('.director_award').closest('.col-md-3').removeClass('d-none');
            $('.director_buton').closest('.col-md-3').removeClass('d-none');
            $('.director_buton').closest('.reset').removeClass('d-none');


        }else if($(this).val() == 'writer'){

            $('[name=writer_name]').closest('.col-md-3').removeClass('d-none');
            $('[name=writer_image]').closest('.col-md-3').removeClass('d-none');
            $('.writer_about').closest('.col-md-3').removeClass('d-none');
            $('.writer_best_film').closest('.col-md-3').removeClass('d-none');
            $('.writer_award').closest('.col-md-3').removeClass('d-none');
            $('.writer_buton').closest('.col-md-3').removeClass('d-none');
            $('.writer_buton').closest('.reset').removeClass('d-none');


        }else if($(this).val() == 'producter'){

            $('[name=producer_name]').closest('.col-md-3').removeClass('d-none');
            $('[name=producer_image]').closest('.col-md-3').removeClass('d-none');
            $('.producer_about').closest('.col-md-3').removeClass('d-none');
            $('.producer_best_film').closest('.col-md-3').removeClass('d-none');
            $('.producer_award').closest('.col-md-3').removeClass('d-none');
            $('.producer_buton').closest('.col-md-3').removeClass('d-none');
            $('.producer_buton').closest('.reset').removeClass('d-none');

        }
        else{
            $('[name=cast_name]').closest('.col-md-3').addClass('d-none');

        }
    });





});
