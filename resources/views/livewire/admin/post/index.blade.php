<div class="lg:col-span-12 xl:col-span-12">
    <div class="flex mt-6 justify-end">
        <a href="{{route('editor-add-post')}}"  class="ml-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium cursor-pointer
        rounded-md shadow-sm text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Add new Post
        </a>
    </div>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Posted By:
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pair
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Strategy
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Timeframe
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                        <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{$post->user->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$post->pair->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{substr($post->description,0,25)}} ...
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$post->status}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$post->strategy}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$post->timeframe}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$post->type}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{route('editor-add-post',['post_id'=>$post->id])}}" class="text-indigo-600 hover:text-indigo-900">Edit |</a>
                                    <a wire:click="destroy('{{$post->id}}')" class="cursor-pointer text-red-600 hover:text-indigo-900">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <p>No Posts Found</p>
                        @endforelse

                        <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-jet-confirmation-modal wire:model="confirmingPostRemoval">
        <x-slot name="title">
            {{ __('Remove Post') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to remove this post?') }}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="destroy('','yes')">Yes</x-jet-secondary-button>
            <x-jet-button wire:click="destroy('','no')">No</x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
