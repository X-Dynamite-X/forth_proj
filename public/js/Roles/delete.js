$(document).on("click", ".delete_roles", function () {
    var id = $(this).data("id");
    var form = $(`#form_delete_role${id}`);


    $.ajax({
        type: "Delete",
        url: form.attr("action"),
        data: {
            _token: form.find('input[name="_token"]').val(),
            _method: "DELETE",
            id: id,
        },
        success: function (data) {
            console.log("Success:", data);
            $("#tr" + id).remove();
            var message = data.message;
            

            $("#messageContainer").html(baner_message);
            $("#json_message").html(message);
            setTimeout(function () {
                $("#messageContainer").empty();
                $("#json_message").empty();
            }, 3000);
            $(`#deleterolesModal${id}`).modal("hide");

        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
});
