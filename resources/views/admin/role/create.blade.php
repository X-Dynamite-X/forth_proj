    <div class="modal fade" id="createRoleModal" tabindex="-1" aria-labelledby="createRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createRoleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="space-y-8 divide-y divide-gray-200  mt-10">
                        <form action="{{ route('admin.roles.store') }}" id="form_creat_role" method="post">
                            @csrf

                            <div class="sm:col-span-6">
                                <label for="role" class="block text-sm font-medium text-gray-700"> Post roles
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="role" name="name"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    <div id="error_message_create_role"></div>
                                </div>
                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <div class="mt-1">
                                    <div class="modal-footer">
                                        <button type="button" id="creat_role"
                                            class="btn text-slate-50 bg-green-700 hover:bg-green-500 rounded-md px-4 py-2">Create</button>
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
