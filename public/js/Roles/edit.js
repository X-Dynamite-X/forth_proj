$(document).on("click", ".edit_role", function () {
    var id = $(this).data("id");
    var form = $(`#form_edit_role${id}`);
    var formData = form.serialize();

    $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        success: function (data) {
            console.log(data);
            console.log(data.data.name);

            $(`#roleName${id}`).text(data.data.name);
            console.log("done");
            var message = data.message;
            $(`#editRoleModal${id}`).modal("hide");

            $("#messageContainer").html(baner_message);
            $("#json_message").html(message);
            setTimeout(function () {
                $("#messageContainer").empty();
                $("#json_message").empty();
            }, 3000);

        },

        error: function (data) {
            console.log(data.responseJSON.message);
            var errorMessage = data.responseJSON.message;
            var errorElement = document.getElementById(
                "error_message_edit_role"
            );
            errorElement.innerHTML =
                '<span class="text-red-400 text-sm">' +
                errorMessage +
                "</span>";
        },
    });
});
