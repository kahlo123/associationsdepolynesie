jQuery( document ).ready(function($) {
    jQuery("#form_info_asso").on("submit" , function(event) {
        console.log($(this).serialize());
        event.preventDefault();
        var formData = new FormData(this);
        jQuery.ajax({
            url : ajax_object.ajax_route,
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

    jQuery("#add_member").click(function(){
            jQuery("#members").append("<div class='member'>" +
                "Civilité" +
                "<select>" +
                "    <option>Mr.</option>" +
                "    <option>Mlle</option>" +
                "    <option>Mme</option>" +
                "</select><br>" +
                "Nom <input type='text'><br>" +
                "Prénom <input type='text'><br>" +
                "Date de naissance <input type='date'><br>" +
                "Tel <input type='tel'><br>" +
                "Adresse <input type='text'><br>" +
                "Email <input type='email'><br>" +
                "Fonction" +
                "<select>" +
                "    <option>Président</option>" +
                "    <option>Vice-président</option>" +
                "    <option>Trésorier</option>" +
                "    <option>Secrétaire</option>" +
                "</select>" +
                "<br>" +
                "</div>");
    });
});