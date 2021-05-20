<div class="lg:col-span-12 xl:col-span-12">
    <div class="flex mt-6 justify-end">
        <a href="{{route('admin-add-user')}}" class="ml-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium cursor-pointer
        rounded-md shadow-sm text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Add new User
        </a>
    </div>
    <div class="flex flex-col mt-2">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{$user->profile_photo_url}}"
                                                 alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900"> {{$user->name}}</div>
                                            <div class="text-sm text-gray-500">{{$user->email}}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{($user->status == 'Basic')?'bg-gray-400 text-white':'bg-gray-900 text-white'}}">
                                        {{$user->status}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$user->getRoleNames()->first()}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if(auth()->id() != $user->id)
                                        <a href="{{route('admin-add-user',['user_id'=>$user->id])}}"
                                           class="text-indigo-600 hover:text-indigo-900">Edit |</a>
                                        <a wire:click="destroy('{{$user->id}}')"
                                           class="text-red-500 hover:text-indigo-900 cursor-pointer">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <p>
                                No Users added
                            </p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-jet-confirmation-modal wire:model="confirmingUserRemoval">
        <x-slot name="title">
            {{ __('Remove User') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to remove this user?') }}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="destroy('','yes')">Yes</x-jet-secondary-button>
            <x-jet-button wire:click="destroy('','no')">No</x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
