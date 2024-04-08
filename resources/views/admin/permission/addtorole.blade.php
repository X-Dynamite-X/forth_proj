<div class="modal fade" id="addToRoleInPermissonModal{{$permission->id}}" tabindex="-1" aria-labelledby="addToRoleInPermissonModalLabel{{$permission->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addToRoleInPermissonModalLabel{{$permission->id}}">Add To Permisson In Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                    <form
                    action="{{ route('admin.giveRole',[$permission->id ]) }}"
                    id="form_add_to_role_in_permission{{$permission->id}}" method="post">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="e_role" class="block text-sm font-medium text-gray-700"> Add To Permisson In Role
                            </label>
                            <div class="mt-1">
                                <select name="role" id=""class=" rounded-md  bg-transparent py-1 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm w-full">
                                    @foreach ($roles as $role )
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                <div id="error_message_add_to_role_in_permission_role{{$permission->id}}"></div>
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <div class="mt-1">
                                <div class="modal-footer">
                                    <button type="button" id="add_to_role_in_permission{{$permission->id}}" data-id="{{$permission->id}}"
                                        class=" add_to_role_in_permission btn text-slate-50 bg-green-700 hover:bg-green-500 rounded-md px-4 py-2">Update</button>
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

