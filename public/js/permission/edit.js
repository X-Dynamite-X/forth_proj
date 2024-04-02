$(document).on("click", ".edit_permissions", function () {
    var id = $(this).data("id");
    var form = $(`#form_edit_permissions${id}`);
    var formData = form.serialize();

    $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        success: function (data) {
            console.log(data);
            // console.log(data.data.name);

            $(`#permissionName${id}`).text(data.data.name);



            var message = data.message;
            $("#messageContainer").html(baner_message);
            $("#json_message").html(message);
            setTimeout(function () {
                $("#messageContainer").empty();
                $("#json_message").empty();
            }, 3000);
            $("#editPermissionsModal"+id).on("hidden.bs.modal", function () {
                $(".modal-backdrop").remove();
            });
            $("#editPermissionsModal"+id).modal("hide");
        },
        error: function (data) {
            console.log(data.responseJSON.message);
            var errorMessage = data.responseJSON.message;
            var errorElement = document.getElementById("error_message_edit_permission"+id);
            errorElement.innerHTML =
                '<span class="text-red-400 text-sm">' +
                errorMessage +
                "</span>";
        },
    });
});
