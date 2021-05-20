<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="space-y-8 divide-y divide-gray-200">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Post
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        {{($editing)?'Update':'Create a new'}} post.
                    </p>
                </div>
                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <label for="strategy" class="block text-sm font-medium text-gray-700">
                            Strategy
                        </label>
                        <div class="mt-1">
                            <select id="strategy" wire:model="strategy" autocomplete="strategy"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">Select a Strategy</option>
                                <option value="Short">Short</option>
                                <option value="Long">Long</option>
                                <option value="Neutral">Neutral</option>
                            </select>
                        </div>
                        <x-jet-input-error for="strategy" class="mt-2" />

                    </div>
                    <div class="sm:col-span-6">
                        <label for="pair_id" class="block text-sm font-medium text-gray-700">
                            Pair
                        </label>
                        <div class="mt-1">
                            <select id="pair_id" wire:model="pair_id" autocomplete="pair_id"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">Select a Pair</option>
                                @foreach($pairs as $pair)
                                    <option value="{{$pair->id}}">{{$pair->name}} - {{$pair->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-jet-input-error for="pair_id" class="mt-2" />

                    </div>
                    <div class="sm:col-span-6">
                        <label for="status" class="block text-sm font-medium text-gray-700">
                            Status
                        </label>
                        <div class="mt-1">
                            <select id="status" wire:model="status" autocomplete="status"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">Select a status</option>
                                <option value="Active">Active</option>
                                <option value="Closed Manually">Closed Manually</option>
                                <option value="Closed Target Reached">Closed Target Reached</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                        <x-jet-input-error for="status" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="timeframe" class="block text-sm font-medium text-gray-700">
                            Timeframe
                        </label>
                        <div class="mt-1">
                            <select id="timeframe" wire:model="timeframe" autocomplete="timeframe"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">Select a timeframe</option>
                                <option value="Short Term">Short Term</option>
                                <option value="Mid Term">Mid Term</option>
                                <option value="Long Term">Long Term</option>
                            </select>
                        </div>
                        <x-jet-input-error for="timeframe" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="type" class="block text-sm font-medium text-gray-700">
                            Post Type
                        </label>
                        <div class="mt-1">
                            <select id="type" wire:model="type" autocomplete="type"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">Select a type</option>
                                <option value="Pro">Pro</option>
                                <option value="Basic">Basic</option>
                            </select>
                        </div>
                        <x-jet-input-error for="type" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="cover_photo" class="block text-sm font-medium text-gray-700">
                            Image Link
                        </label>
                        <div class="mt-1">
                            <input type="text" wire:model="image_link" id="tags" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Insert Image URL">
                        </div>
                        <x-jet-input-error for="image_link" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="chart_link" class="block text-sm font-medium text-gray-700">
                            Chart Link
                        </label>
                        <div class="mt-1">
                            <input type="text" wire:model="chart_link" id="tags" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Insert Image URL">
                        </div>
                        <x-jet-input-error for="chart_link" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Description
                        </label>
                        <div class="mt-1">
                            <textarea id="description" wire:model="description" rows="3"
                                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about post.</p>
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="disclaimer" class="block text-sm font-medium text-gray-700">
                            Disclaimer
                        </label>
                        <div class="mt-1">
                            <textarea id="disclaimer" wire:model="disclaimer" rows="2"
                                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Write a disclaimer.</p>
                        <x-jet-input-error for="disclaimer" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                        <div class="mt-1">
                            <input type="text" wire:model="tags" id="tags" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="btc, eth, trends">
                        </div>
                        <p class="mt-2 text-sm text-gray-500" id="email-description">Add tags by separating them with <span class="text-bold">comma ","</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-5">
            <div class="flex justify-end">
                <button type="submit" wire:click="savePost" wire:loading.remove
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{($editing)?'Update':'Save'}} Post
                </button>
                <a wire:loading wire:target="savePost">
                    Processing...
                </a>
            </div>
        </div>
    </div>
</div>
