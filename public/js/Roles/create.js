$(document).ready(function () {
    var form = $("#form_creat_role");
    $("#creat_role").click(function () {
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                $("#role").val("");
                var message = data.message;
                var permissions = data.permissions;
                var data = data.data;
                var ajax_code_create_row = ` <tr id="tr${data.id}">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900" id="roleName${data.id}">
                    ${data.name} </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">

            <div class="ml-4">
                <div class="justify-end">
                <button type="button" id="show_to_permisson_in_role${data.id}"
                data-bs-toggle="modal"
                data-bs-target="#showToPermissonInRoleModal${data.id}"
                class=" bg-blue-500 hover:bg-blue-700  rounded-md px-2 text-slate-50  py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path
                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                    <path
                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                </svg>

            </button>
            <button type="button" id="add_to_permisson_in_role${data.id}"
            data-bs-toggle="modal"
            data-bs-target="#addToPermissonInRoleModal${data.id}"
            class=" bg-green-500 hover:bg-green-700  rounded-md px-2 text-slate-50  py-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path
                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
            </button>
            <button type="button" id="edit_role${data.id}" data-bs-toggle="modal"
            data-bs-target="#editRoleModal${data.id}"
            class=" bg-yellow-500 hover:bg-yellow-700  rounded-md px-2 text-slate-50  py-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                <path
                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
            </svg>
            </button>
            <button type="button" id="delete_role${data.id}"
            data-bs-toggle="modal"
            data-bs-target="#deleteRolesModal${data.id}"
            class=" bg-red-500 hover:bg-red-700  rounded-md px-2 text-slate-50  py-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
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
                var create_model_role_edit = `<div class="modal fade" id="editRoleModal${data.id}" tabindex="-1" aria-labelledby="editRoleModal${data.id}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editRoleModal${data.id}Label">Edate  role </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                    <form action='${edit_role_rote}/${data.id}' id="form_edit_role${data.id}" method="post">
                    <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                    <input type="hidden" name="_method" value="put">

                        <div class="sm:col-span-6">
                            <label for="role" class="block text-sm font-medium text-gray-700"> Edate role
                            </label>
                            <div class="mt-1">
                                <input type="text" id="role" name="name"  value="${data.name}"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    <div id="error_message_edit_role${data.id}"></div>
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <div class="mt-1">
                                <div class="modal-footer">
                                    <button type="button" id="edit_role${data.id}" data-id=${data.id}
                                        class="edit_role text-slate-50 bg-green-700 hover:bg-green-500 rounded-md px-4 py-2">Edit</button>
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
                $("#edit_model").append(create_model_role_edit);
                var create_model_role_delete = `<div class="modal fade" id="deleteRolesModal${data.id}" tabindex="-1" aria-labelledby="deleteRolesModal${data.id}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteRolesModal${data.id}Label">Delete  role </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="space-y-8 divide-y divide-gray-200  mt-10">
                                <form action="${delete_role_rote}/${data.id}" id="form_delete_role${data.id}" method="post">
                                <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                <input type="hidden" name="_method" value="delete">

                                    <div class="sm:col-span-6">

                                        <div class="mt-1 text-red-700">
                                            Are you sure to delete this role ${data.name} ?
                                        </div>
                                    </div>
                                    <div class="sm:col-span-6 pt-5">
                                        <div class="mt-1">
                                            <div class="modal-footer">
                                            <button type="button" id="delete_roles${data.id}" data-id=${data.id}
                                            class="delete_roles text-slate-50 bg-red-700 hover:bg-red-500 rounded-md px-4 py-2">Delete</button>

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
                $("#delete_model").append(create_model_role_delete);
                var create_model_role_add_to_permissions = `<div class="modal fade" id="addToPermissonInRoleModal${
                    data.id
                }" tabindex="-1" aria-labelledby="addToPermissonInRoleModalLabel${
                    data.id
                }" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addToPermissonInRoleModalLabel${
                                data.id
                            }">Add To Permisson In Role</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="space-y-8 divide-y divide-gray-200  mt-10">
                                <form action="${add_to_permission}/${
                    data.id
                }" id="form_add_to_permission_in_role${data.id}" method="post">
                                <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">

                                    <div class="sm:col-span-6">
                                        <label for="e_role" class="block text-sm font-medium text-gray-700"> Add To Permisson In Role
                                        </label>
                                        <div class="mt-1">

                                            <select name="permission" id=""class=" rounded-md  bg-transparent py-1 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm w-full">
                                                ${
                                                    permissions
                                                        ? (() => {
                                                              let optionsHTML =
                                                                  "";
                                                              for (
                                                                  let i = 0;
                                                                  i <
                                                                  permissions.length;
                                                                  i++
                                                              ) {
                                                                  var permission =
                                                                      permissions[
                                                                          i
                                                                      ];
                                                                  {
                                                                      optionsHTML += `
                                                                <option id="${data.id}${permission.id}" value="${permission.name}">${permission.name}</option>
                                                    `;
                                                                  }
                                                              }
                                                              return optionsHTML;
                                                          })()
                                                        : ""
                                                }

                                            </select>
                                            <div id="error_message_add_to_permission_in_role_role${
                                                data.id
                                            }"></div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-6 pt-5">
                                        <div class="mt-1">
                                            <div class="modal-footer">
                                                <button type="button" id="add_to_permission_in_role${
                                                    data.id
                                                }" data-id="${data.id}"
                                                    class=" add_to_permission_in_role btn text-slate-50 bg-green-700 hover:bg-green-500 rounded-md px-4 py-2">Update</button>
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
                $("#add_to_permisson_in_role_model").append(
                    create_model_role_add_to_permissions
                );
                var create_model_role_Show_permission = `<div class="modal fade" id="showToPermissonInRoleModal${data.id}" tabindex="-1"
                    aria-labelledby="showToPermissonInRoleModalLabel${data.id}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="showToPermissonInRoleModalLabel${data.id}">Add To Permisson In
                                    Role</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                                    <div class="modal-body">
                                        <table class="min-w-full w-100 divide-y divide-gray-200">
                                            <thead class="bg-gray-300">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left w-100 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Name
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-slate-300 divide-y divide-gray-200" id="tbody_role_to_permission${data.id}">


                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    `;
                $("#show_to_permisson_in_role_model").append(
                    create_model_role_Show_permission
                );
                $("#messageContainer").html(baner_message);
                $("#json_message").html(message);
                setTimeout(function () {
                    $("#messageContainer").empty();
                    $("#json_message").empty();
                }, 3000);
                $("#createRoleModal").on("hidden.bs.modal", function () {
                    $(".modal-backdrop").remove();
                });
                $("#createRoleModal").modal("hide");
            },
            error: function (data) {
                console.log(data.responseJSON.message);
                var errorMessage = data.responseJSON.message;
                var errorElement = document.getElementById(
                    "error_message_create_role"
                );
                errorElement.innerHTML =
                    '<span class="text-red-400 text-sm">' +
                    errorMessage +
                    "</span>";
            },
        });
    });
});
