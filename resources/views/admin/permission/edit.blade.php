
<div class="modal fade" id="editPermissionsModal{{$permission->id}}" tabindex="-1" aria-labelledby="editPermissionsModal{{$permission->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editPermissionsModal{{$permission->id}}Label">Edate  Permissions </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                    <form action="{{ route('admin.permissions.update',[$permission->id]) }}" id="form_edit_permissions{{$permission->id}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="sm:col-span-6">
                            <label for="permissions" class="block text-sm font-medium text-gray-700"> Edate Permissions
                            </label>
                            <div class="mt-1">
                                <input type="text" id="permissions" name="name"  value="{{$permission->name}}"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                <div id="error_message_edit_permission{{$permission->id}}"></div>
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <div class="mt-1">
                                <div class="modal-footer">
                                    <button type="button" id="edit_permissions{{$permission->id}}" data-id={{$permission->id}}
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
