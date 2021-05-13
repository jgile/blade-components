@if($show)
    <div x-data="{ show: {{ $show ? 'true' : 'false' }} }" x-show="show" class="fixed bottom-0 inset-x-0 pb-2 sm:pb-5">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div {{ $attributes }}>
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        {{ $icon ?? '' }}
                        <p class="ml-3 font-medium text-white truncate">
                            {{ $slot }}
                        </p>
                    </div>
                    <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
                        <button @click="show=false" type="button"
                                class="-mr-1 flex p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white {{ $attributes->variant('dismiss') }}">
                            <span class="sr-only">Dismiss</span>
                            <i class="fal fa-inverse fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif