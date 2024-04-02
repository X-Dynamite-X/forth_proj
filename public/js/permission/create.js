$(document).ready(function () {
    var form = $("#form_creat_permissions");
    var data = { id: "", name: "" };

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
                var data = data.data;
                console.log(message);
                $("#messageContainer").html(baner_message);
            $("#json_message").html(message);
            setTimeout(function () {
                $("#messageContainer").empty();
                $("#json_message").empty();
            }, 3000);

                var ajax_code_create_row = ` <tr id="tr${data.id}">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900" id="permissionName${data.id}">
                                    ${data.name} </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">

                            <div class="ml-4">
                                <div class="space-x-2 justify-end">
                                    <button type="button" id="edit_permission${data.id}" data-bs-toggle="modal"
                                        data-bs-target="#editPermissionsModal${data.id}"
                                        class=" bg-yellow-500 hover:bg-yellow-700  rounded-md px-4 text-slate-50  py-2"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pen" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                        </svg></button>
                                    <button type="button" id="delete_permissions${data.id}" data-bs-toggle="modal"
                                        data-bs-target="#deletePermissionsModal${data.id}"
                                        class=" bg-red-500 delete_permissions hover:bg-red-700  rounded-md px-4 text-slate-50  py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </td>
                    </tr>
                    `;

                $("#tbody").append(ajax_code_create_row);

                var create_model_permission_edit = `<div class="modal fade" id="editPermissionsModal${data.id}" tabindex="-1" aria-labelledby="editPermissionsModal${data.id}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editPermissionsModal${data.id}Label">Edate  Permissions </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                                    <form action='${edit_permission_rote}/${data.id}' id="form_edit_permissions${data.id}" method="post">
                                    <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                    <input type="hidden" name="_method" value="put">

                                        <div class="sm:col-span-6">
                                            <label for="permissions" class="block text-sm font-medium text-gray-700"> Edate Permissions
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" id="permissions" name="name"  value="${data.name}"
                                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                <div id="error_message_edit_permission"></div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-6 pt-5">
                                            <div class="mt-1">
                                                <div class="modal-footer">
                                                    <button type="button" id="edit_permissions${data.id}" data-id=${data.id}
                                                        class="edit_permissions text-slate-50 bg-green-700 hover:bg-green-500 rounded-md px-4 py-2">Edit</button>
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

                $("#mymodel").append(create_model_permission_edit);

                var create_model_permission_delete = `<div class="modal fade" id="deletePermissionsModal${data.id}" tabindex="-1" aria-labelledby="deletePermissionsModal${data.id}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deletePermissionsModal${data.id}Label">Delete  Permissions </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="space-y-8 divide-y divide-gray-200  mt-10">
                                                <form action="${delete_permission_rote}/${data.id}" id="form_delete_permissions${data.id}" method="post">
                                                <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                                <input type="hidden" name="_method" value="delete">

                                                    <div class="sm:col-span-6">

                                                        <div class="mt-1 text-red-700">
                                                            Are you sure to delete this permission ${data.name} ?
                                                        </div>
                                                    </div>
                                                    <div class="sm:col-span-6 pt-5">
                                                        <div class="mt-1">
                                                            <div class="modal-footer">
                                                                <button type="button" id="delete_permissions${data.id}" data-id=${data.id}
                                                                    class="delete_permissions text-slate-50 bg-red-700 hover:bg-red-500 rounded-md px-4 py-2">Delete</button>
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
                        </div>`;
                $("#mymodel").append(create_model_permission_delete);
            $(`#createPermissionsModal`).modal("hide");

            },
            error: function (data) {
                console.log(data.responseJSON.message);
                var errorMessage = data.responseJSON.message;
                var errorElement = document.getElementById(
                    "error_message_create_permission"
                );
                errorElement.innerHTML =
                    '<span class="text-red-400 text-sm">' +
                    errorMessage +
                    "</span>";
            },
        });
    });
});
