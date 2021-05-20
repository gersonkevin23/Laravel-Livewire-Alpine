{{-- Mobile Navigation crumbbar --}}
<div class="bg-white shadow sm:hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="border-t border-gray-200 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <div class="flex sm:hidden">
                    <a href="{{route('dashboard')}}"
                        class="group inline-flex space-x-3 text-sm font-medium text-gray-500 hover:text-gray-700">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-600"
                            x-description="Heroicon name: solid/arrow-narrow-left" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Back to dashboard</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</div>
