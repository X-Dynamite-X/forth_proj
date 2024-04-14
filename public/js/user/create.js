$(document).ready(function () {
    var form = $("#form_creat_user");
    $("#creat_user").click(function () {
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                console.log(data);
                var message = data.message;
                var permissions = data.permissions;
                var roles = data.roles;

                console.log(message);
                var data = data.data;
                console.log(data);
                var ajax_code_create_user = `
                <tr id="tr${data.id}">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900" id="userName${data.id}">
                                                            ${data.name} </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900" id="emailName${data.id}">
                                                        ${data.email} </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="justify-end">

                                                                <button type="button" id="show_to_permisson_in_role${data.id}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#showToPermissonInUserModal${data.id}"
                                                                    class=" bg-blue-500 hover:bg-blue-700  rounded-md px-2 text-slate-50  py-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield" viewBox="0 0 16 16">
                                                                        <path d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56"/>
                                                                    </svg>
                                                                </button>
                                                                <button type="button" id="ahow_to_role_in_user${data.id}" data-bs-toggle="modal" data-bs-target="#showToRoleInUserModal${data.id}" class=" bg-slate-500 hover:bg-slate-700  rounded-md px-2 text-slate-50  py-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"></path>
                                                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"></path>
                                                                </svg>
                                                            </button>
                                                            <button type="button" id="edit_user${data.id}" data-bs-toggle="modal"
                                                                data-bs-target="#editUserModal${data.id}"
                                                                class=" bg-yellow-500 hover:bg-yellow-700  rounded-md px-2 text-slate-50  py-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                    fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                                </svg>
                                                            </button>
                                                            <button type="button" id="delete_user${data.id}"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteUserModal${data.id}"
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
                $("#tbody").append(ajax_code_create_user);
                var create_edit_model = `
                <div class="modal fade" id="editUserModal${data.id}" tabindex="-1"
                    aria-labelledby="editUserModalLabel${data.id}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editUserModalLabel${data.id}">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                                    <form action="${edit_user}/${data.id}" id="form_edit_user${data.id}"
                                        method="post">
                                        <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                    <input type="hidden" name="_method" value="put">
                                        <div class="sm:col-span-6">
                                            <label for="e_user${data.id}" class="block text-sm font-medium text-gray-700">Edit Name:
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" id="e_user${data.id}" name="name" value="${data.name}"
                                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                <div id="error_message_edit_name${data.id}"></div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label for="e_email${data.id}" class="block text-sm font-medium text-gray-700"> Edit Email:
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" id="e_email${data.id}" name="email" value="${data.email}"
                                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                <div id="error_message_edit_email${data.id}"></div>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-6 pt-5">
                                            <div class="mt-1">
                                                <div class="modal-footer">
                                                    <button type="button" id="edit_user${data.id}"
                                                        data-id="${data.id}"
                                                        class=" edit_user btn text-slate-50 bg-yellow-500 hover:bg-yellow-700 rounded-md px-4 py-2">Update</button>
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
                $("#edit_user_model").append(create_edit_model);
                var create_delete_model = `
                <div class="modal fade" id="deleteUserModal${data.id}" tabindex="-1" aria-labelledby="deleteUserModal${data.id}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteUserModal${data.id}Label">Delete  User </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                                    <form action="${delete_user}/${data.id}" id="form_delete_user${data.id}" method="post">
                                    <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                    <input type="hidden" name="_method" value="delete">
                                        <div class="sm:col-span-6">
                                            <div class="mt-1 text-red-700">
                                                Are you sure to delete this User  ${data.name}  ?
                                            </div>
                                        </div>
                                        <div class="sm:col-span-6 pt-5">
                                            <div class="mt-1">
                                                <div class="modal-footer">
                                                    <button type="button" id="delete_user${data.id}" data-id=${data.id}
                                                        class="delete_user text-slate-50 bg-red-700 hover:bg-red-500 rounded-md px-4 py-2">Delete</button>
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
                $("#delete_user_model").append(create_delete_model);
                var create_add_roel_user = `
                <div class="modal fade" id="addToRoleInUserModal${
                    data.id
                }" tabindex="-1"
                    aria-labelledby="addToRoleInUserModalLabel${
                        data.id
                    }" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addToRoleInUserModalLabel${
                                    data.id
                                }">Add To User In Role</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                                    <form action="${add_roles_user}/${data.id}"
                                        id="form_add_to_role_in_user${
                                            data.id
                                        }" method="post">
                                        <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                        <div class="sm:col-span-6">
                                            <label for="role_user${
                                                data.id
                                            }" class="block text-sm font-medium text-gray-700">
                                                Add To User In Role
                                            </label>
                                            <div class="mt-1">
                                            <select name="role" id="role_user${
                                                data.id
                                            }" class=" rounded-md  bg-transparent py-1 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm w-full">
                                            ${
                                                roles
                                                    ? (() => {
                                                          let optionsHTML = "";
                                                          for (
                                                              let i = 0;
                                                              i < roles.length;
                                                              i++
                                                          ) {
                                                              var role =
                                                                  roles[i];
                                                              {
                                                                  optionsHTML += `
                                                            <option id="${data.id}${role.id}" value="${role.name}">${role.name}</option>
                                                `;
                                                              }
                                                          }
                                                          return optionsHTML;
                                                      })()
                                                    : ""
                                            }
                                            </select>
                                                <div id="error_message_add_to_role_in_user_user${
                                                    data.id
                                                }"></div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-6 pt-5">
                                            <div class="mt-1">
                                                <div class="modal-footer">
                                                    <button type="button" id="add_to_role_in_user${
                                                        data.id
                                                    }"
                                                        data-id="${data.id}"
                                                        class=" add_to_role_in_user btn text-slate-50 bg-green-700 hover:bg-green-500 rounded-md px-4 py-2">Update</button>
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

                $("#add_to_role_in_user_model").append(create_add_roel_user);
                var create_add_permission_user = `<div class="modal fade" id="addToPermissonInUserModal${
                    data.id
                }" tabindex="-1" aria-labelledby="addToPermissonInUserModalLabel${
                    data.id
                }" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addToPermissonInUserModalLabel${
                                data.id
                            }">Add To Permisson In User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="space-y-8 divide-y divide-gray-200  mt-10">
                                <form action="${add_permission_user}/${
                    data.id
                }" id="form_add_to_permission_in_user${data.id}" method="post">
                                    <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                    <div class="sm:col-span-6">
                                        <label for="permission_user${
                                            data.id
                                        }" class="block text-sm font-medium text-gray-700"> Add To Permisson In User
                                        </label>
                                        <div class="mt-1">

                                            <select name="permission" id="permission_user${
                                                data.id
                                            }" class=" rounded-md  bg-transparent py-1 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm w-full">
                                            ${
                                                permissions
                                                    ? (() => {
                                                          let optionsHTML = "";
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
                                            <div id="error_message_add_to_permission_in_user_user${
                                                data.id
                                            }"></div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-6 pt-5">
                                        <div class="mt-1">
                                            <div class="modal-footer">
                                                <button type="button" id="add_to_permission_in_user${
                                                    data.id
                                                }" data-id="${data.id}"
                                                    class=" add_to_permission_in_user btn text-slate-50 bg-green-700 hover:bg-green-500 rounded-md px-4 py-2">Update</button>
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
                $("#add_to_permisson_in_user_model").append(
                    create_add_permission_user
                );

                var create_show_permission_user = `<div class="modal fade" id="showToPermissonInUserModal${data.id}" tabindex="-1"
                aria-labelledby="showToPermissonInUserModalLabel${data.id}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="showToPermissonInUserModalLabel${data.id}">Add To Permisson In
                                User</h1>
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
                                        <tbody class="bg-slate-300 divide-y divide-gray-200" id="tbody_user_to_permission${data.id}">


                                        </tbody>
                                    </table>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success"data-bs-toggle="modal" data-bs-target="#addToPermissonInUserModal${data.id}">Add</button>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                </div>



                `;
                $("#show_to_permisson_in_user_model").append(
                    create_show_permission_user
                );

                var create_show_role_user = `
                <div class="modal fade" id="showToRoleInUserModal${data.id}" tabindex="-1"
                    aria-labelledby="showToRoleInUserModalLabel${data.id}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="showToRoleInUserModalLabel${data.id}">Add To User In
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
                                            <tbody class="bg-slate-300 divide-y divide-gray-200" id="tbody_user_to_role${data.id}">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addToRoleInUserModal${data.id}">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                `;

                $("#show_to_role_in_user_model").append(create_show_role_user);

                $("#messageContainer").html(baner_message);
                $("#json_message").html(message);
                setTimeout(function () {
                    $("#messageContainer").empty();
                    $("#json_message").empty();
                }, 3000);

                $("#createUserModal").on("hidden.bs.modal", function () {
                    $(".modal-backdrop").remove();
                });
                $("#createUserModal").modal("hide");
            },

            // },
            error: function (data) {
                if (data.responseJSON.errors) {
                    var errorMessages = data.responseJSON.errors;

                    Object.keys(errorMessages).forEach((key) => {
                        errorMessages[key].forEach((errorMessage) => {
                            console.log(`${key}: ${errorMessage}`);
                            var errorElement = document.getElementById(
                                `error_message_create_${key}`
                            );
                            if (errorElement) {
                                errorElement.innerHTML =
                                    '<span class="text-red-400 text-sm">' +
                                    errorMessage +
                                    "</span>";
                                var inputElement = document.getElementById(key);
                                if (inputElement) {
                                    inputElement.addEventListener(
                                        "input",
                                        function () {
                                            errorElement.innerHTML = "";
                                        }
                                    );
                                }
                            } else {
                                console.error(
                                    `Element with ID error_message_create_${key} not found.`
                                );
                            }
                        });
                    });
                }
            },
        });
    });
});
//email
