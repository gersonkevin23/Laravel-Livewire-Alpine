<div>
    <x-post-breadcrumb/>
    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
            <x-dashboard-leftside :tags="$tags" :selectedTag="$selectedTag"/>
            <main class="lg:col-span-9 xl:col-span-6">
                <div>
                    <ul class="space-y-4" x-max="1">

                        <li class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                            <article aria-labelledby="question-title-81614">
                                <div>
                                    <div class="flex space-x-3">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full"
                                                 src="{{$post->user->profile_photo_url}}"
                                                 alt="">
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <p class="text-sm font-medium text-gray-900">
                                                <a href="#" class="hover:underline">{{$post->user->name}}</a>
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                <a href="#" class="hover:underline">
                                                    <time datetime="2020-12-09T11:43:00">
                                                        Published {{$post->published_at->diffForHumans()}}</time>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0 self-center flex">
                                            <div x-data="{ open: false }" @keydown.escape.stop="open = false"
                                                 @click.away="open = false" class="relative inline-block text-left">
                                                <div>
                                                    <button type="button"
                                                            class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600"
                                                            id="options-menu-0" @click="open = !open"
                                                            aria-haspopup="true"
                                                            x-bind:aria-expanded="open">
                                                        <span class="sr-only">Open options</span>
                                                        <svg class="h-5 w-5"
                                                             x-description="Heroicon name: solid/dots-vertical"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                             fill="currentColor" aria-hidden="true">
                                                            <path
                                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>


                                                <div x-show="open"
                                                     x-description="Dropdown menu, show/hide based on menu state."
                                                     x-transition:enter="transition ease-out duration-100"
                                                     x-transition:enter-start="transform opacity-0 scale-95"
                                                     x-transition:enter-end="transform opacity-100 scale-100"
                                                     x-transition:leave="transition ease-in duration-75"
                                                     x-transition:leave-start="transform opacity-100 scale-100"
                                                     x-transition:leave-end="transform opacity-0 scale-95"
                                                     class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                     role="menu" aria-orientation="vertical"
                                                     aria-labelledby="options-menu-0"
                                                     style="display: none;">
                                                    <div class="py-1" role="none">
                                                        <a href="#"
                                                           class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                           role="menuitem">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                                 fill="none"
                                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                            </svg>
                                                            <span>Edit</span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <h2 id="" class="mt-4 text-base font-medium text-gray-900">

                                    </h2>
                                </div>
                                @if($post->image_link)
                                    <div class="py-5">
                                        <img src="{{$post->image_link}}" alt="" class="rounded">
                                    </div>
                                @endif
                                <div
                                    class="py-6 my-2 border-t border-b border-gray-200 text-sm text-gray-700 space-y-4 ">

                                    <p>
                                        {!! $post->description !!}
                                    </p>
                                    <div class="px-5 py-5 bg-gray-100 rounded-md">
                                        <h3 class="font-bold">
                                            Disclaimer
                                        </h3>
                                        <p>
                                            {!! $post->disclaimer !!}
                                        </p>
                                    </div>
                                </div>
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Status
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{$post->status}}
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Time Frame
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{$post->timeframe}}
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Chart Link
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            <a href="{{$post->chart_link}}">{{$post->chart_link}}</a>
                                        </dd>
                                    </div>

                                </dl>
                                <div class="border-b border-gray-200 py-6 space-y-8">
                                    <div>
                                        <h2 class="text-sm font-medium text-gray-500">Tags</h2>
                                        <ul class="mt-2 leading-8">
                                            @foreach($post->tags as $tag)
                                                <li class="inline">
                                                    <a href="#"
                                                       class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5">
                                                        <div
                                                            class="absolute flex-shrink-0 flex items-center justify-center">
                                            <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"
                                                  aria-hidden="true"></span>
                                                        </div>
                                                        <div
                                                            class="ml-3.5 text-sm font-medium text-gray-900">{{$tag->name}}</div>
                                                    </a>
                                                    <!-- space -->
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-between space-x-8">
                                    <div class="flex space-x-6">

                            <span class="inline-flex items-center text-sm">
                                <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/chat-alt"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="font-medium text-gray-900">{{$post->comments->count()}}</span>
                                    <span class="sr-only">replies</span>
                                </button>
                            </span>
                                        {{--                            <span class="inline-flex items-center text-sm">--}}
                                        {{--                                <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">--}}
                                        {{--                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/eye"--}}
                                        {{--                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"--}}
                                        {{--                                         aria-hidden="true">--}}
                                        {{--                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>--}}
                                        {{--                                        <path fill-rule="evenodd"--}}
                                        {{--                                              d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"--}}
                                        {{--                                              clip-rule="evenodd"></path>--}}
                                        {{--                                    </svg>--}}
                                        {{--                                    <span class="font-medium text-gray-900">2.7k</span>--}}
                                        {{--                                    <span class="sr-only">views</span>--}}
                                        {{--                                </button>--}}
                                        {{--                            </span>--}}
                                    </div>
                                    <div class="flex text-sm">
                                        @if($post->type == 'Pro')
                                            <span class="inline-flex items-center text-sm">
                                <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    <span class="font-bold text-gray-900">{{$post->type}}</span>
                                </button>
                            </span>
                                        @else
                                            <span class="font-bold text-gray-900">{{$post->type}}</span>
                                        @endif
                                    </div>
                                </div>
                            </article>
                        </li>

                    </ul>
                    <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden mt-5">
                        <div class="divide-y divide-gray-200">
                            <div class="px-4 py-5 sm:px-6">
                                <h2 id="notes-title" class="text-lg font-medium text-gray-900">Comments</h2>
                            </div>
                            <div class="px-4 py-6 sm:px-6">
                                <ul class="space-y-8">
                                    @forelse($comments as $comment)
                                        <li>
                                            <div class="flex space-x-3">
                                                <div class="flex-shrink-0">
                                                    <img class="h-10 w-10 rounded-full"
                                                         src="{{$comment->user->profile_photo_url}}" alt="">
                                                </div>
                                                <div>
                                                    <div class="text-sm">
                                                        <a href="#"
                                                           class="font-medium text-gray-900">{{$comment->user->name}}</a>
                                                    </div>
                                                    <div class="mt-1 text-sm text-gray-700">
                                                        <p>{{$comment->comment}}</p>
                                                    </div>
                                                    <div class="mt-2 text-sm space-x-2">
                                                            <span
                                                                class="text-gray-500 font-medium">{{$comment->created_at->diffForHumans()}}</span>
                                                        <!-- space -->
                                                        <span class="text-gray-500 font-medium">·</span>
                                                        <!-- space -->
                                                        <button type="button"
                                                                wire:click="getReplies({{$comment->id}})"
                                                                class="text-gray-900 font-medium">
                                                            &#9993; {{$comment->replies->count()}} | Reply
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <li>
                                                <span
                                                    class="text-gray-500 font-medium">No Comments on this post yet</span>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-6 sm:px-6">
                            <div class="flex space-x-3">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="{{auth()->user()->profile_photo_url}}"
                                         alt="">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div>
                                        <label for="comment_text" class="sr-only">About</label>
                                        <textarea id="comment_text" wire:model="comment_text" rows="3"
                                                  class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                                                  placeholder="Add a new comment"></textarea>
                                        <x-jet-input-error for="comment_text"/>
                                    </div>
                                    <div class="mt-3 flex items-center justify-end">
                                        <button type="button" wire:click="postComment" wire:loading.remove
                                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Comment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <x-post-rightside/>
        </div>
    </div>
    <x-jet-modal wire:model="replyModal">
        <slot>
            <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden mt-5 ">
                <div class="divide-y divide-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                        <h2 id="notes-title" class="text-lg font-medium text-gray-900">Comment Replies</h2>
                    </div>
                    <div class="px-4 py-6 sm:px-6 overflow-y-scroll h-80">
                        <ul class="space-y-8">
                            @forelse($replies as $reply)
                                <li>
                                    <div class="flex space-x-3">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full"
                                                 src="{{$reply->user->profile_photo_url}}" alt="">
                                        </div>
                                        <div>
                                            <div class="text-sm">
                                                <a href="#" class="font-medium text-gray-900">{{$reply->user->name}}</a>
                                            </div>
                                            <div class="mt-1 text-sm text-gray-700">
                                                <p>{{$reply->reply}}</p>
                                            </div>
                                            <div class="mt-2 text-sm space-x-2">
                                                <span
                                                    class="text-gray-500 font-medium">{{$reply->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li>
                                    <span class="text-gray-500 font-medium">No replies on this comment</span>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-6 sm:px-6">
                    <div class="flex space-x-3">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="{{auth()->user()->profile_photo_url}}" alt="">
                        </div>
                        <div class="min-w-0 flex-1">
                            <div>
                                <label for="reply_text" class="sr-only">About</label>
                                <textarea id="reply_text" wire:model="reply_text" rows="3"
                                          class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                                          placeholder="Add a new reply"></textarea>
                                <x-jet-input-error for="reply_text"/>
                            </div>
                            <div class="mt-3 flex items-center justify-end">
                                <button type="button" wire:click="postReply" wire:loading.remove
                                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Reply
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </slot>
    </x-jet-modal>
</div>
