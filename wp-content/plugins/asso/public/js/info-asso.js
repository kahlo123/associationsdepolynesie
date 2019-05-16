jQuery( document ).ready(function($) {
    jQuery("#form_info_asso").on("submit" , function(event) {
        console.log($(this).serialize());
        event.preventDefault();
        var formData = new FormData(this);
        jQuery.ajax({
            url : ajax_object.ajaxinfo,
            type : 'POST',
            data : formData,
            dataType : "json",
            complete : function(data) {
                console.log(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});