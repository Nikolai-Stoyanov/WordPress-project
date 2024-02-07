jQuery(document).ready(function($) {
    $(".owl-carousel").owlCarousel();
  });


jQuery(document).ready( function($) {
    let ppp = 4; // Post per page
let pageNumber = 1;
let postType ='';
let containerId ='';

// data-post-type="document.getElementsByClassName('myTab')[0].id" 
function load_posts(id){
    pageNumber++;
    switch(id){
        case '#more_posts_breakfast':
            postType ='Breakfast';
            containerId ='#ajax_posts_breakfast';
            break;
        case '#more_posts_launch':
            postType ='Launch';
            containerId ='#ajax_posts_launch';
            break;
        case '#more_posts_dinner':
            postType ='Dinner';
            containerId ='#ajax_posts_dinner';
            break;
    }
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: {
            action:'more_post_ajax',
            post_type: postType, 
            paged:pageNumber,
            post_per_page: ppp
        },
        success: function(data){
            let $data = $(data);
            if($data.length){
                $(containerId).append($data);
                $(id).attr("disabled",false);
            } else{
                $(id).attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {

            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

$("#more_posts_breakfast").on("click",function(){ 
    
    $("#more_posts_breakfast").attr("disabled",true); 
    load_posts("#more_posts_breakfast");
});

$("#more_posts_launch").on("click",function(){ 
    
    $("#more_posts_launch").attr("disabled",true); 
    load_posts("#more_posts_launch");
});

$("#more_posts_dinner").on("click",function(){ 
    
    $("#more_posts_dinner").attr("disabled",true); 
    load_posts("#more_posts_dinner");
});
})