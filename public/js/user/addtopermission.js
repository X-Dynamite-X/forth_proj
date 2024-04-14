$(document).on("click", ".add_to_permission_in_user", function () {
    var id = $(this).data("id");
    var user_id = $(this).data("id");

    var form = $(`#form_add_to_permission_in_user${id}`);
    var formData = form.serialize();

    $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        success: function (data) {
console.log(data);



            var name =data.data[0].name;
            var user_permission_id = data.data[0].id;
            var ajax_code_create_row_user_to_permission = `<tr id="tr_user_permission_${user_id}${user_permission_id}">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900"
                            id="user_permission${user_id}${user_permission_id}">
                            ${name} </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="space-x-2 justify-end">
                            <button type="button"
                                id="deleteToPermissonInUser${user_id}${user_permission_id}"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteToPermissonInUserModal${user_id}${user_permission_id}"
                                class=" bg-red-500 hover:bg-red-700  rounded-md px-2 text-slate-50  py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-trash3"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </td>

            </tr>`;
            $("#tbody_user_to_permission"+id).append(
                ajax_code_create_row_user_to_permission
            );
            var create_model_user_to_permission_delete= `


            <div class="modal fade" id="deleteToPermissonInUserModal${user_id}${user_permission_id}" tabindex="-1" aria-labelledby="deleteToPermissonInUserModal${user_id}${user_permission_id}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteToPermissonInUserModal${user_id}${user_permission_id}Label">Delete  roles </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="space-y-8 divide-y divide-gray-200  mt-10">
                                <form action="${delete_permission_user}/${user_id}/${user_permission_id}" id="form_delete_to_permission_in_role${user_id}${user_permission_id}" method="post">
                                <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                <input type="hidden" name="_method" value="delete">


                                    <div class="sm:col-span-6">

                                        <div class="mt-1 text-red-700">
                                            Are you sure to delete this permission ${name}   ?
                                        </div>
                                    </div>
                                    <div class="sm:col-span-6 pt-5">
                                        <div class="mt-1">
                                            <div class="modal-footer">
                                                <button type="button" id="delete_to_permission_in_role${user_id}${user_permission_id}" data-id='${user_id}${user_permission_id}'
                                                    class="delete_to_permission_in_role text-slate-50 bg-red-700 hover:bg-red-500 rounded-md px-4 py-2">Delete</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            `;

            $("#delete_to_permisson_in_user_model").append(
                create_model_user_to_permission_delete
            );







            var message = data.message;
            $("#messageContainer").html(baner_message);
            $("#json_message").html(message);
            setTimeout(function () {
                $("#messageContainer").empty();
                $("#json_message").empty();
            }, 3000);

            $("#addToPermissonInUserModal" + id).on(
                "hidden.bs.modal",
                function () {
                    $(".modal-backdrop").remove();
                }
            );
            $("#addToPermissonInUserModal" + id).modal("hide");
        },

        error: function (data) {
            console.log(data.responseJSON.message);
            var errorMessage = data.responseJSON.message;
            var errorElement = document.getElementById(
                "error_message_add_to_permission_in_user_user"+id
            );
            errorElement.innerHTML =
                `<span class="text-red-400 text-sm">${errorMessage}
                </span>
                `;
        },
    });
});
