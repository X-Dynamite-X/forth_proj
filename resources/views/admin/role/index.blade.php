@extends('layouts.admin')

@section('content')
    <div class="container p-12">
        <div class="full-width ">
            <div class="justify-end flex p-2">
                <button type="button" class="btn bg-green-700 hover:bg-green-500 rounded-md px-4 text-slate-50  py-2"
                    data-bs-toggle="modal" data-bs-target="#createRoleModal">
                    create
                </button>
            </div>
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
                <tbody class="bg-slate-300 divide-y divide-gray-200">
                    @foreach ($roles as $role)
                        <tr id="tr{{$role->id}}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900" id="roleName{{$role->id}}"> {{ $role->name }} </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="space-x-2 justify-end">
                                            <button type="button" id="edit_role{{ $role->id }}"  data-bs-toggle="modal"
                                                data-bs-target="#editRoleModal{{ $role->id }}"
                                                class=" bg-yellow-500 hover:bg-yellow-700  rounded-md px-4 text-slate-50  py-2"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path
                                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                </svg></button>
                                            <button type="button" id="delete_role{{ $role->id }}" data-bs-toggle="modal" data-bs-target="#deleterolesModal{{ $role->id }}"
                                                class=" bg-red-500 hover:bg-red-700  rounded-md px-4 text-slate-50  py-2">
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

            @foreach ($roles as $role)
                @include('admin.role.edit')
                @include('admin.role.delete')

            @endforeach


        </div>
    </div>
    @include('admin.role.create')
@endsection
@section('js')
    <script src="{{ asset('js/Roles/create.js') }}"></script>
    <script src="{{ asset('js/Roles/edit.js') }}"></script>
    <script src="{{ asset('js/Roles/delete.js') }}"></script>


@endsection
