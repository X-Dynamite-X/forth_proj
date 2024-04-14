$(document).on("click", ".edit_user", function () {
    var id = $(this).data("id");
    var form = $(`#form_edit_user${id}`);
    var formData = form.serialize();

    $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        success: function (data) {
            console.log(data);
            console.log(data.data.name);

            $(`#editName${id}`).text(data.data.name);
            $(`#editEmail${id}`).text(data.data.email);
            $('#error_message_edit_email' + id).empty();
            $('#error_message_edit_name' + id).empty();






            console.log("done");
            var message = data.message;
            $("#messageContainer").html(baner_message);
            $("#json_message").html(message);
            setTimeout(function () {
                $("#messageContainer").empty();
                $("#json_message").empty();
            }, 3000);



            $("#editUserModal"+id).on("hidden.bs.modal", function () {
                $(".modal-backdrop").remove();
            });
            $("#editUserModal"+id).modal("hide");
        },

        error: function(xhr, textStatus, errorThrown){
            $('#error_message_edit_email' + id).empty();
            $('#error_message_edit_name' + id).empty();

            var errors = xhr.responseJSON.errors;
            if(errors.hasOwnProperty('email')) {
                $('#error_message_edit_email' + id).html('<span class="text-red-400 text-sm">'+ errors.email[0] + "</span>");
            }

            if(errors.hasOwnProperty('name')) {
                $('#error_message_edit_name' + id).html('<span class="text-red-400 text-sm">'+ errors.name[0] + "</span>");
            }
        }
    });
});



