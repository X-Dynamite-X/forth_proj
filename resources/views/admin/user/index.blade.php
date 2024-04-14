@extends('layouts.admin')

@section('content')
    <div class="container p-12">
        <div class="full-width ">
            <div class="justify-end flex p-2">
                <button type="button" class="btn bg-green-700 hover:bg-green-500 rounded-md px-4 text-slate-50  py-2"
                    data-bs-toggle="modal" data-bs-target="#createUserModal">
                    create
                </button>
            </div>
            <table class="min-w-full w-100 divide-y divide-gray-200">
                <thead class="bg-gray-300">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left  w-1/4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left w-3/4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left  w-20 text-xs font-medium text-gray-500 uppercase tracking-wider ">
                            <center>
                                Action
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-slate-300 divide-y divide-gray-200" id="tbody">
                    @foreach ($users as $user)
                        <tr id="tr{{ $user->id }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900" id="editName{{ $user->id }}">
                                            {{ $user->name }} </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900" id="editEmail{{ $user->id }}">
                                            {{ $user->email }} </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="justify-end">

                                            <button type="button" id="show_to_permisson_in_user{{ $user->id }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#showToPermissonInUserModal{{ $user->id }}"
                                                class=" bg-blue-500 hover:bg-blue-700  rounded-md px-2 text-slate-50  py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-shield" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                                                </svg>
                                            </button>
                                            <button type="button" id="ahow_to_role_in_user{{ $user->id }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#showToRoleInUserModal{{ $user->id }}"
                                                class=" bg-slate-500 hover:bg-slate-700  rounded-md px-2 text-slate-50  py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                                                    <path
                                                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                                                </svg>
                                            </button>
                                            <button type="button" id="edit_user{{ $user->id }}" data-bs-toggle="modal"
                                                data-bs-target="#editUserModal{{ $user->id }}"
                                                class=" bg-yellow-500 hover:bg-yellow-700  rounded-md px-2 text-slate-50  py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path
                                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                </svg>
                                            </button>
                                            <button type="button" id="delete_user{{ $user->id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}"
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
                    @endforeach
                </tbody>
            </table>
            <div id="mymodel">
                <div id="show_to_role_in_user_model">
                    @foreach ($users as $user)
                        @include('admin.user.showtorole')
                    @endforeach
                </div>
                <div id="delete_to_role_in_user_model">
                    @foreach ($users as $user)
                        @foreach ($user->roles as $user_role)
                            @include('admin.user.deletetorole')
                        @endforeach
                    @endforeach
                </div>
                <div id="delete_to_permisson_in_user_model">
                    @foreach ($users as $user)
                        @foreach ($user->permissions as $user_permission)
                            @include('admin.user.deletetopermission')
                        @endforeach
                    @endforeach
                </div>
                <div id="create_user_model">
                    @include('admin.user.create')
                </div>
                <div id="edit_user_model">
                    @foreach ($users as $user)
                        @include('admin.user.edit')
                    @endforeach
                </div>
                <div id="delete_user_model">
                    @foreach ($users as $user)
                        @include('admin.user.delete')
                    @endforeach
                </div>
                <div id="show_to_permisson_in_user_model">
                    @foreach ($users as $user)
                        @include('admin.user.showtopermission')
                    @endforeach
                </div>
                <div id="add_to_permisson_in_user_model">
                    @foreach ($users as $user)
                        @include('admin.user.addtopermission')
                    @endforeach
                </div>
                <div id="add_to_role_in_user_model">
                    @foreach ($users as $user)
                        @include('admin.user.addtorole')
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    @include('admin.role.create')
@endsection
@section('js')
    <script>
        var  edit_user ="{{ route('admin.editUser', ['']) }}" ;
        var delete_user ="{{ route('admin.removeUser',['']) }}";
        var add_roles_user ="{{ route('admin.giveRoleUser',['']) }}";
        var add_permission_user ="{{ route('admin.givePermissionToUser',['']) }}";
        var delete_permission_user = "{{ route('admin.revokePermissionToUser',['','']) }}";
        var delete_role_user ="{{ route('admin.removeRoleUser',['', '']) }}" ;
    </script>

    <script src="{{ asset('js/user/create.js') }}"></script>
    <script src="{{ asset('js/user/delete.js') }}"></script>
    <script src="{{ asset('js/user/edit.js') }}"></script>
    <script src="{{ asset('js/user/addtopermission.js') }}"></script>
    <script src="{{ asset('js/user/deletetopermission.js') }}"></script>
    <script src="{{ asset('js/user/addtorole.js') }}"></script>
    <script src="{{ asset('js/user/deletetorole.js') }}"></script>




@endsection
