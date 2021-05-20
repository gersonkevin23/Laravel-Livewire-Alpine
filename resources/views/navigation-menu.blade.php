<header class="bg-white shadow-sm lg:static lg:overflow-y-visible"
        x-state:on="Menu open" x-state:off="Menu closed"
        :class="{ 'fixed inset-0 z-40 overflow-y-auto': open }"
        x-data="{ open: false, focus: false,notification: false}"
        x-init="" @keydown.escape="onEscape" @close-popover-group.window="onClosePopoverGroup">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex justify-between xl:grid xl:grid-cols-12 lg:gap-8">
            <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{route('dashboard')}}">
                        <x-jet-application-mark class="block w-auto" />
                    </a>
                </div>
            </div>
            <div class="min-w-0 flex-1 md:px-8 lg:px-0 xl:col-span-6">
                <div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 xl:px-0">
                    <div class="w-full">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/search"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>

                            <form action="{{route('dashboard')}}" method="GET">
                                @role('Super Admin')
                                <input type="text" name="from" value="admin" hidden>
                                @endrole
                                <input id="q" name="q" value="{{old('q')}}"
                                       class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-10
                                                pr-3 text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900
                                                 focus:placeholder-gray-400 focus:ring-1 focus:ring-gray-500
                                                 focus:border-gray-500 sm:text-sm"
                                       placeholder="Search Crypto Pairs: BTC, USDT, ETH" type="search">
                                <input type="submit"
                                       style="position: absolute; left: -9999px; width: 1px; height: 1px;"
                                       tabindex="-1"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center md:absolute md:right-0 md:inset-y-0 lg:hidden">
                <!-- Mobile menu button -->
                <button @click="open = !(open)"
                        class="-mx-2 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100
                hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-500"
                        aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6"
                         :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6"
                         :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
                @role('Member')
                @if(auth()->user()->status == 'Basic')
                    <a href="#" wire:click="requestPro" wire:loading.remove
                       class="text-sm font-medium text-gray-900 hover:underline">
                        Request Pro Membership
                    </a>
                    <a wire:loading wire:target="requestPro">
                        Processing...
                    </a>
                @else
                    <a href="#" class="text-sm font-medium text-gray-900 hover:underline">
                        &#10004; Pro
                    </a>
                @endif
                @endrole
                {{--                Notification dropdwon --}}
                <div class="relative inline-block text-left" x-data="{ notification: false }" @keydown.escape.stop="notification = false" @click.away="notification = false">
                    <button @click="notification = !notification"
                            class="ml-5 flex-shrink-0 bg-white rounded-full p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                             xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button>
                    <div x-description="Dropdown menu, show/hide based on menu state." x-show="notification"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="origin-top-right absolute right-0 z-10 mt-2 w-auto rounded-md shadow-lg bg-white ring-1
                        ring-black ring-opacity-5 focus:outline-none"
                         role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <ul class="divide-y divide-gray-200">
                            @forelse($notifications as $notification)
                                <li @click="document.location.href='{{route('show-post',$notification->post->id)}}'" class="relative bg-white py-5 px-4 hover:bg-gray-50
                                focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="text-sm font-medium text-gray-900 truncate">
                                                        {{($notification->message == 'created')?'New Post Added!':'Subscribed post updated'}}</p>
                                                    <p class="text-sm text-gray-500 truncate">{{$notification->post->pair->name}}
                                                        - {{$notification->post->strategy}}</p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                  class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">{{$notification->created_at->diffForHumans()}}
                                            </time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">
                                                {{($notification->message == 'created')?'A new post has been created click to view post':
                                                    'A post you subscribed to has been updated. Click to view!'}}
                                            </p>
                                        </div>
                                </li>
                            @empty
                                <li class="relative bg-white py-5 px-4 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                    Nothing here...
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <!-- Profile dropdown -->
                <div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false"
                     class="flex-shrink-0 relative ml-5">
                    <div>
                        <button type="button"
                                class="bg-white rounded-full flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                id="user-menu" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full"
                                 src="{{auth()->user()->profile_photo_url}}" alt="">
                        </button>
                    </div>

                    <div x-description="Dropdown menu, show/hide based on menu state." x-show="open"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="origin-top-right absolute z-10 right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 focus:outline-none"
                         role="menu" aria-orientation="vertical" aria-labelledby="user-menu" style="display: none;">

                        <a href="{{route('profile.show')}}"
                           class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your
                            Profile</a>
                        @role('Editor')
                        <a href="{{route('editor-view-posts')}}"
                           class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            View My Posts</a>
                        @endrole
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign
                                out
                            </button>
                        </form>
                    </div>

                </div>
                @role('Editor')
                <a href="{{route('editor-add-post')}}"
                   class="ml-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium
                    rounded-md shadow-sm text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    New Post
                </a>
                @endrole
                @role('Super Admin')
                @if(Request::is('admin/*'))
                    <a href="{{route('dashboard',['from'=>'admin'])}}"
                       class="ml-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium
                    rounded-md shadow-sm text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Dashboard
                    </a>
                @else
                    <a href="{{route('admin-dashboard')}}"
                       class="ml-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium
                    rounded-md shadow-sm text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Admin
                    </a>
                @endif
                @endrole

            </div>
        </div>
    </div>

    <nav class="lg:hidden">
        <div x-show="open">
            <div class="max-w-3xl mx-auto px-2 pt-2 pb-3 space-y-1 sm:px-4">
                <a href="#" aria-current="page"
                   class="bg-gray-100 text-gray-900 block rounded-md py-2 px-3 text-base font-medium text-gray-900"
                   x-state:on="Current" x-state:off="Default">Home</a>

                <a href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium text-gray-900">
                    Education</a>

                <a href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium text-gray-900"
                >Community</a>

                <a href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium text-gray-900"
                >Terms</a>
            </div>
            <div class="border-t border-gray-200 pt-4 pb-3">
                <div class="max-w-3xl mx-auto px-4 flex items-center sm:px-6">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{auth()->user()->profile_photo_url}}" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">{{auth()->user()->name}}</div>
                        <div class="text-sm font-medium text-gray-500">{{auth()->user()->email}}</div>
                    </div>
                    <button type="button"
                            class="ml-auto flex-shrink-0 bg-white rounded-full p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </button>
                </div>
                <div class="mt-3 max-w-3xl mx-auto px-2 space-y-1 sm:px-4">
                    <a href="{{route('profile.show')}}"
                       class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Your
                        Profile</a>
                    @role('Editor')
                    <a href="{{route('editor-view-posts')}}"
                       class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">
                        View My Posts</a>
                    @endrole
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit"
                                class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">
                            Sign out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <x-jet-modal wire:model="requestProModal">
        <slot>
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h1 class="text-xl font-semibold text-gray-900">Request Pro Successful</h1>
                    <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                        An Email has been sent to admin containing a request for becoming a pro member. Please hold
                        tight while Admin reviews your request.
                    </h2>
                    <div class="mt-6">
                        <a href="#" wire:click="$toggle('requestProModal')"
                           class="w-full block text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Ok
                        </a>
                    </div>
                </div>
            </div>

        </slot>
    </x-jet-modal>
</header>
