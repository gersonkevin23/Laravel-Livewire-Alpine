<div class="hidden lg:block lg:col-span-3 xl:col-span-2">
    <nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
        <div class="pb-8 space-y-1">

            <a href="#"
               class="{{(Request::is('post/*')?'text-gray-600':'bg-gray-200 text-gray-900')}}  group flex items-center px-3 py-2 text-sm font-medium rounded-md"
               aria-current="page" x-state:on="Current" x-state:off="Default"
               x-state-description="Current: &quot;bg-gray-200 text-gray-900&quot;, Default: &quot;text-gray-600 hover:bg-gray-50&quot;">
                <svg class="{{(Request::is('post/*')?'text-gray-400':'text-gray-500')}} flex-shrink-0 -ml-1 mr-3 h-6 w-6" x-description="Heroicon name: outline/home"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="truncate">
                    Home
                </span>
            </a>

            <a href="#"
               class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
               x-state-description="undefined: &quot;bg-gray-200 text-gray-900&quot;, undefined: &quot;text-gray-600 hover:bg-gray-50&quot;">
                <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                     xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                    <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                </svg>
                <span class="truncate">
                    Education
                </span>
            </a>

            <a href="#"
               class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
               x-state-description="undefined: &quot;bg-gray-200 text-gray-900&quot;, undefined: &quot;text-gray-600 hover:bg-gray-50&quot;">
                <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                     x-description="Heroicon name: outline/user-group" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                <span class="truncate">
                    Community
                </span>
            </a>

            <a href="#"
               class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
               x-state-description="undefined: &quot;bg-gray-200 text-gray-900&quot;, undefined: &quot;text-gray-600 hover:bg-gray-50&quot;">
                <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <span class="truncate">
                    Terms
                </span>
            </a>

        </div>
        @if(!(Request::is('post/*')))
            <div class="pt-10">
                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="communities-headline">
                    Recent Tags
                </p>
                <div class="mt-3 space-y-2" aria-labelledby="communities-headline">
                    @forelse($tags as $tag)
                        <a href="#" wire:click="filterByTag('{{$tag->id}}')"
                           class="group flex items-center px-3 {{($selectedTag==$tag)?'bg-gray-400 text-white ':'text-gray-600'}}
                               py-2 text-sm font-medium rounded-md">
                    <span class="truncate">
                        {{$tag->name}}
                    </span>
                        </a>
                    @empty
                        <p>No recent tags</p>
                    @endforelse

                </div>
            </div>
        @endif
    </nav>
</div>
