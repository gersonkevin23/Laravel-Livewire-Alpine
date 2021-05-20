<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="space-y-8 divide-y divide-gray-200">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        User
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        {{($editing)?'Update':'Create a new'}} user
                    </p>
                </div>
                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Name
                        </label>
                        <div class="mt-1">
                            <input type="text" wire:model="name" id="name"
                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Insert User's name">
                        </div>
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <div class="mt-1">
                            <input type="email" wire:model="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Insert User's Email">
                        </div>
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password {{($editing)?'(optional: old password will be used)':''}}
                        </label>
                        <div class="mt-1">
                            <input type="password" wire:model="password" id="password" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Type a strong password">
                        </div>
                        <x-jet-input-error for="password" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                            Confirm Password
                        </label>
                        <div class="mt-1">
                            <input type="password" wire:model="password_confirmation" id="password_confirmation" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Re-enter Password">
                        </div>
                        <x-jet-input-error for="password_confirmation" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="role" class="block text-sm font-medium text-gray-700">
                            Role
                        </label>
                        <div class="mt-1">
                            <select id="role" wire:model="role" autocomplete="role"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">Select a Role</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Editor">Editor</option>
                                <option value="Member">Member</option>
                            </select>
                        </div>
                        <x-jet-input-error for="role" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="status" class="block text-sm font-medium text-gray-700">
                            Status
                        </label>
                        <div class="mt-1">
                            <select id="status" wire:model="status" autocomplete="status"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">Select a Status</option>
                                <option value="Pro">Pro</option>
                                <option value="Basic">Basic</option>
                            </select>
                        </div>
                        <x-jet-input-error for="status" class="mt-2" />

                    </div>
                </div>
            </div>
        </div>
        <div class="pt-5">
            <div class="flex justify-end">
                <button type="submit" wire:click="addUser" wire:loading.remove
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{($editing)?'Update':'Add'}} User
                </button>
            </div>
            <a wire:loading wire:target="addUser">
                Processing...
            </a>
        </div>
    </div>
</div>
