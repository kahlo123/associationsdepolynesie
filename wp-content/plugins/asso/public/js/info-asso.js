jQuery( document ).ready(function($) {
    jQuery("#test").on("submit" , function(event) {
        event.preventDefault();
        jQuery.ajax({
            url : ajax_object.ajax_route,
            type : 'POST',
            data : $(this).serialize(),
            complete : function(data) {
                console.log(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});