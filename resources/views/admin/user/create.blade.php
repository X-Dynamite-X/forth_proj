<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createUserModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="space-y-8 divide-y divide-gray-200  mt-10 ">
                    <form action="{{ route('admin.createUser') }}" id="form_creat_user" method="post">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Enter Username:</label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" placeholder="Enter Username"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                <div id="error_message_create_name"></div>
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Enter Email:</label>
                            <div class="mt-1">
                                <input type="email" id="email" name="email" placeholder="Enter Email"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                <div id="error_message_create_email"></div>
                            </div>
                        </div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Enter Password:</label>
                        <div class="mt-1">
                            <input type="password" id="password" name="password" placeholder="Enter Password"   required autocomplete="new-password"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            <div id="error_message_create_password"></div>
                        </div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <div class="mt-1">
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            <div id="error_message_create_confirm_password"></div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <div class="mt-1">
                                <div class="modal-footer">
                                    <button type="button" id="creat_user"
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
