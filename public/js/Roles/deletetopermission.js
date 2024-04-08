$(document).on("click", ".delete_to_permission_in_role", function () {
    var id = $(this).data("id");
    console.log(id);
    var form = $(`#form_delete_to_permission_in_role${id}`);


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
            $("#deleteToPermissonInRoleModal"+id).on("hidden.bs.modal", function () {
                $(".modal-backdrop").remove();
            });
            $("#deleteToPermissonInRoleModal"+id).modal("hide");

        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
});
