jQuery(document).ready(function($) {
    $('.upvote').on('click', function(e){

      
        e.preventDefault();

        let post_id = jQuery(this).attr('id'); // we'll need this later

        jQuery.ajax({
            type: 'post',
            dataType: 'json',
            url: my_ajax_object.ajax_url,
            data: {
                action:'robots_like_button', // PHP function
                post_id: post_id, // we need to make this dynamic
            },
            success: function(msg){
                console.log(msg,'123');
            }
        });
    });
}); 

jQuery(document).ready(function($) {
 
    $(".owl-carousel").owlCarousel();
  });