@extends('layouts.admin')

@section('content')
    <div class="container p-12">

        <div class="full-width">
            <div class="justify-end flex p-2">
                <button type="button" class="btn bg-green-700 hover:bg-green-500 rounded-md px-4 text-slate-50  py-2"
                    data-bs-toggle="modal" data-bs-target="#createPermissionsModal">
                    create
                </button>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
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
                <tbody class="bg-slate-300 divide-y divide-gray-200" id="tbody">
                    @foreach ($permissions as $permission)
                        <tr id="tr{{ $permission->id }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"
                                            id="permissionName{{ $permission->id }}"> {{ $permission->name }} </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class=" justify-end">
                                            <button type="button" id="show_to_permisson_in_role{{ $permission->id }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#showToRoleInPermissonModal{{ $permission->id }}"
                                                class=" bg-blue-500 hover:bg-blue-700  rounded-md px-2 text-slate-50  py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                </svg>

                                            </button>
                                            <button type="button" id="add_to_permisson_in_role{{ $permission->id }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#addToRoleInPermissonModal{{ $permission->id }}"
                                                class=" bg-green-500 hover:bg-green-700  rounded-md px-2 text-slate-50  py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                </svg>
                                            </button>
                                            <button type="button" id="edit_permission{{ $permission->id }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editPermissionsModal{{ $permission->id }}"
                                                class=" bg-yellow-500 hover:bg-yellow-700  rounded-md px-2 text-slate-50  py-2"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path
                                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                </svg></button>
                                            <button type="button" id="delete_permissions{{ $permission->id }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deletePermissionsModal{{ $permission->id }}"
                                                class=" bg-red-500 delete_permissions hover:bg-red-700  rounded-md px-2 text-slate-50  py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                </svg></button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div id="mymodel">
                <div id="delete_to_role_in_permission_model">
                    @foreach ($permissions as $permission)
                        @foreach ($permission->roles as $permission_role)
                            @include('admin.permission.deletetorole')
                        @endforeach
                    @endforeach
                </div>
                <div id="show_to_role_in_permission_model">
                    @foreach ($permissions as $permission)
                        @include('admin.permission.showtorole')
                    @endforeach
                </div>
                <div id="add_to_role_in_permission_model">
                    @foreach ($permissions as $permission)
                        @include('admin.permission.addtorole')
                    @endforeach
                </div>
                <div id="edit_model">
                    @foreach ($permissions as $permission)
                        @include('admin.permission.edit')
                    @endforeach
                </div>
                <div id="delete_model">
                    @foreach ($permissions as $permission)
                        @include('admin.permission.delete')
                    @endforeach
                </div>
            </div>
        </div>
        @include('admin.permission.create')
    @endsection
    @section('js')
        <script>
            var edit_permission_rote = "{{ route('admin.permissions.update', '') }}";
            var delete_permission_rote = "{{ route('admin.permissions.destroy', '') }}"
            var delete_permission_role_rote = "{{ route('admin.removeRole', ['', '']) }}";
            var add_to_role = "{{ route('admin.giveRole', ['']) }}";
        </script>
        <script src="{{ asset('js/permission/create.js') }}"></script>
        <script src="{{ asset('js/permission/edit.js') }}"></script>
        <script src="{{ asset('js/permission/delete.js') }}"></script>
        <script src="{{ asset('js/permission/deletetoroles.js') }}"></script>
        <script src="{{ asset('js/permission/addtorole.js') }}"></script>
    @endsection("js")
