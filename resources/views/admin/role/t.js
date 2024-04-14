`
<div class="modal fade" id="deleteToRoleInPermissonModal${id}${permission_role_id}" tabindex="-1" aria-labelledby="deleteToRoleInPermissonModal${id}${permission_role_id}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteToRoleInPermissonModal${id}${permission_role_id}Label">Delete  roles </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="space-y-8 divide-y divide-gray-200  mt-10">
                    <form action="${delete_permission_role_rote}/${id}/${permission_role_id}" id="form_delete_to_role_in_permission${id}${permission_role_id}" method="post">
                    <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                    <input type="hidden" name="_method" value="delete">
                        <div class="sm:col-span-6">
                            <div class="mt-1 text-red-700">
                                Are you sure to delete this Role  ${name}  ?
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <div class="mt-1">
                                <div class="modal-footer">
                                    <button type="button" id="delete_to_role_in_permission${id}${permission_role_id}" data-id=${id}${permission_role_id}
                                        class="delete_to_role_in_permission text-slate-50 bg-red-700 hover:bg-red-500 rounded-md px-4 py-2">Delete</button>
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
