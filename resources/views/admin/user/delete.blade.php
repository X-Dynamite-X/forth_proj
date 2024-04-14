<div class="modal fade" id="deleteUserModal{{$user->id}}" tabindex="-1" aria-labelledby="deleteUserModal{{$user->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserModal{{$user->id}}Label">Delete  User </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                    <form action="{{ route('admin.removeUser',['user'=> $user->id]) }}" id="form_delete_user{{$user->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="sm:col-span-6">
                            <div class="mt-1 text-red-700">
                                Are you sure to delete this User  {{$user->name}}  ?
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <div class="mt-1">
                                <div class="modal-footer">
                                    <button type="button" id="delete_user{{$user->id}}" data-id={{$user->id}}
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
