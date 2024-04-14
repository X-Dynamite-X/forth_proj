<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1"
    aria-labelledby="{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editUserModalLabel{{ $user->id }}">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                    <form action="{{ route('admin.editUser', [$user->id]) }}" id="form_edit_user{{ $user->id }}"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="e_user{{ $user->id }}" class="block text-sm font-medium text-gray-700">Edit Name:
                            </label>
                            <div class="mt-1">
                                <input type="text" id="e_user{{ $user->id }}" name="name" value="{{ $user->name }}"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                <div id="error_message_edit_name{{ $user->id }}"></div>
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="e_email{{ $user->id }}" class="block text-sm font-medium text-gray-700"> Edit Email:
                            </label>
                            <div class="mt-1">
                                <input type="text" id="e_email{{ $user->id }}" name="email" value="{{ $user->email }}"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                <div id="error_message_edit_email{{ $user->id }}"></div>
                            </div>
                        </div>

                        <div class="sm:col-span-6 pt-5">
                            <div class="mt-1">
                                <div class="modal-footer">
                                    <button type="button" id="edit_user{{ $user->id }}"
                                        data-id="{{ $user->id }}"
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
