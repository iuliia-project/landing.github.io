$(window).ready(function(){

    $("#footer_form, #modal_form").on( "submit", function( event ) {
        event.preventDefault();
        // $( this ).serialize() = "name=fio&contact=mail&text=text"
        send_from($( this ).serialize())
    });

});


function send_from(data) {
    console.log("data",data)
    $.ajax({
        url: "http://localhost",
        type: "POST",
        data: data,
        success: function(response) {
            alert("Отправилось удачно");
        },
        error: function(response) {
            alert("Ошибка при отправке формы");
        }
    });
}