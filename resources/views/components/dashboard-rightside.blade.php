<aside class="hidden xl:block xl:col-span-4">
    <div class="sticky top-4 space-y-4">
{{--        <section aria-labelledby="who-to-follow-heading">--}}
{{--            <div class="bg-white rounded-lg shadow">--}}
{{--                <div class="p-6">--}}
{{--                    <h1 class="text-xl font-semibold text-gray-900">consectetur adipiscing</h1>--}}
{{--                    <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">--}}
{{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut--}}
{{--                        labore et dolore magna--}}
{{--                        aliqua.--}}
{{--                    </h2>--}}

{{--                    <div class="mt-6">--}}
{{--                        <a href="#"--}}
{{--                            class="w-full block text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">--}}
{{--                            Learn More--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <section aria-labelledby="trending-heading">
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 id="trending-heading" class="text-base font-medium text-gray-900">
                        Trending
                    </h2>
                    <div class="mt-6 flow-root">
                        <ul class="-my-4 divide-y divide-gray-200" x-max="1">
                            @foreach($trendingPosts as $post)
                                <li class="flex py-4 space-x-3">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full" src="{{$post->user->profile_photo_url}}">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm text-gray-800 line-clamp-2">{{$post->description}}</p>
                                    <div class="mt-2 flex">
                                        <span class="inline-flex items-center text-sm">
                                            <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                <svg class="h-5 w-5" x-description="Heroicon name: solid/chat-alt"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="font-medium text-gray-900">{{$post->comments->count()}}</span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-6">
                        <a href="#"
                            class="w-full block text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            View all
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</aside>
