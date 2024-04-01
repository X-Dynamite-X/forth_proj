$(document).ready(function () {
    var form = $("#form_creat_permissions");
    $(".creat_permissions").click(function () {
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                console.log(data);
                $("#permissions").val("");
                var message = data.message;
                console.log(message);
                $('#messageContainer').html(baner_message);
                $('#json_message').html(message);
            },
            error: function (data) {
                console.log(data.responseJSON.message);
                var errorMessage = data.responseJSON.message;
                var errorElement = document.getElementById('error_message_create_permission');
                errorElement.innerHTML = '<span class="text-red-400 text-sm">' + errorMessage + '</span>';
            },
        });
    });
});
