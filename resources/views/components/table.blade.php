<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    @forelse ($headers as $header)
                        <x-dynamic-component :component="$bladeComponentsPrefix . 'th'">
                            {{ $header }}
                        </x-dynamic-component>
                    @empty
                        @isset($thead)
                            <thead>
                            {{ $thead }}
                            </thead>
                        @endisset
                    @endforelse
                    <tbody>
                    {{ $slot }}
                    </tbody>
                    @isset($tfoot)
                        <tfoot>
                        {{ $tfoot }}
                        </tfoot>
                    @endisset
                </table>
            </div>
        </div>
    </div>
</div>