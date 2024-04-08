<div class="modal fade" id="showToRoleInPermissonModal{{ $permission->id }}" tabindex="-1"
    aria-labelledby="showToRoleInPermissonModalLabel{{ $permission->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showToRoleInPermissonModalLabel{{ $permission->id }}">Add To Permisson In
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
                            <tbody class="bg-slate-300 divide-y divide-gray-200" id="tbody_permission_to_role{{$permission->id}}">
                                @foreach ($permission->roles as $permission_role)
                                    <tr id="tr{{$permission->id}}{{ $permission_role->id }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900"
                                                        id="permission_role{{$permission->id}}{{ $permission_role->id }}">
                                                        {{ $permission_role->name }} </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="space-x-2 justify-end">
                                                        <button type="button"
                                                            id="deleteToRoleInPermisson{{$permission->id}}{{$permission_role->id}}"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteToRoleInPermissonModal{{$permission->id}}{{$permission_role->id}}"
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

                                    </tr>
                                @endforeach

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
