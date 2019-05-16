jQuery( document ).ready(function($) {
    var i = 0 ;
    jQuery("#form_office").on("submit" , function(event) {
        console.log($(this).serialize());
        event.preventDefault();
        // var formData = new FormData(this);
        jQuery.ajax({
            url : ajax_object.ajaxoffice,
            type : 'POST',
            data : $(this).serialize(),
            dataType : "json",
            complete : function(data) {
                console.log(data);
            },
            // cache: false,
            // contentType: false,
            // processData: false
        });
    });

    jQuery("#add_member").click(function(){
        i = i + 1 ;
        jQuery("#members").append("<div class='member'>" +
            "Civilité" +
            "<select>" +
            "    <option>Mr.</option>" +
            "    <option>Mlle</option>" +
            "    <option>Mme</option>" +
            "</select><br>" +
            "Nom <input type='text' name=\"membre["+ i +"][lastname]\"><br>" +
            "Prénom <input type='text' name=\"membre["+ i +"][firstname]\"><br>" +
            "Date de naissance <input type='date' name=\"membre["+ i +"][dateOfBirth]\"><br>" +
            "Tel <input type='tel' name=\"membre["+ i +"][tel]\"><br>" +
            "Adresse <input type='text' name=\"membre["+ i +"][address]\"><br>" +
            "Email <input type='email' name=\"membre["+ i +"][mail]\"><br>" +
            "Fonction" +

            "<select name=\"membre["+ i +"][situation]\">" +
            "    <option value='pr'>Président</option>" +
            "    <option value='v-pr'>Vice-président</option>" +
            "    <option value='tr'>Trésorier</option>" +
            "    <option value='secr'>Secrétaire</option>" +
            "</select>" +
            "<br>" +
            "</div>");
    });
});