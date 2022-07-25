<x-home>
    <x-slot name="title">HTML Snippets</x-slot>

    <div class="px-4 py-1 w-full">
        <div class="pb-4 border-b-2 border-gray-200 flex items-center justify-between">
            <p class="text-2xl font-bold leading-normal text-gray-800">
                Snippets
            </p>
        </div>

        <div class="grid grid-cols-3 gap-x-8">
            @foreach($snippets as $snippet)
                <div class="bg-white py-8">
                    <div class="p-4 shadow rounded border border-gray-200">
                        <div class="border-b border-gray-200 pb-2 flex items-center justify-between">
                            <div class="w-full text-lg font-medium leading-5 text-gray-800">
                                {{ $snippet->title }}
                            </div>

                            <button onclick="copyToClipboard(this)"
                                    data-code="{{ $snippet->code }}"
                                    class="cursor-pointer text-gray-500 hover:text-gray-800">
                                <svg width="28"
                                     height="28"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.25"
                                     stroke="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <rect x="8" y="8" width="12" height="12" rx="2"/>
                                    <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"/>
                                </svg>
                            </button>
                        </div>

                        <p class="py-4 text-sm leading-5 text-gray-600">
                            {{ $snippet->description }}
                        </p>

                        <div class="px-3 py-2 bg-gray-700 text-white text-sm">
                            <pre class="w-full overflow-x-scroll">{{ $snippet->code }}</pre>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(!$snippets || $snippets->isEmpty())
            <div class="hidden mt-4 h-64 bg-gray-100 font-mono font-semibold text-gray-700 flex items-center justify-center">
                Snippets are not available. Wait till <code>admin</code> updates their storage.
            </div>
        @else
            <div class="mt-4">
                {{ $snippets->links() }}
            </div>
        @endif
    </div>
</x-home>
