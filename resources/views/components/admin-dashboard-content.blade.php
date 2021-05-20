<div class="lg:col-span-12 xl:col-span-12">
    <div>
        <div class="hidden sm:block">
            <nav class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200" aria-label="Tabs">
                <!-- Current: "text-gray-900", Default: "text-gray-500 hover:text-gray-700" -->
                <a href="#" wire:click="$set('tab', 'user')" class="text-gray-900 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10" aria-current="page">
                    <span>Users</span>
                    <span aria-hidden="true" class="{{($tab=='user')?'bg-gray-600':'bg-transparent'}} absolute inset-x-0 bottom-0 h-0.5"></span>
                </a>
                <a href="#" wire:click="$set('tab', 'post')" class="text-gray-500 hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10">
                    <span>Posts</span>
                    <span aria-hidden="true" class="{{($tab=='post')?'bg-gray-600':'bg-transparent'}} absolute inset-x-0 bottom-0 h-0.5"></span>
                </a>
            </nav>
        </div>
        <div>
            @if($tab == 'user')
                <livewire:admin.user.index />
            @elseif($tab == 'post')
                <livewire:admin.post.index />
            @endif
        </div>
    </div>
</div>
