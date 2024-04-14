<div class="modal fade" id="addToRoleInUserModal{{ $user->id }}" tabindex="-1"
    aria-labelledby="addToRoleInUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addToRoleInUserModalLabel{{ $user->id }}">Add To User In Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                    <form action="{{ route('admin.giveRoleUser', [$user->id]) }}"
                        id="form_add_to_role_in_user{{ $user->id }}" method="post">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="role_user{{ $user->id }}" class="block text-sm font-medium text-gray-700">
                                Add To User In Role
                            </label>
                            <div class="mt-1">
                                <select name="role" id="role_user{{ $user->id }}"
                                    class=" rounded-md  bg-transparent py-1 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm w-full">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <div id="error_message_add_to_role_in_user_user{{ $user->id }}"></div>
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <div class="mt-1">
                                <div class="modal-footer">
                                    <button type="button" id="add_to_role_in_user{{ $user->id }}"
                                        data-id="{{ $user->id }}"
                                        class=" add_to_role_in_user btn text-slate-50 bg-green-700 hover:bg-green-500 rounded-md px-4 py-2">Add</button>
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

