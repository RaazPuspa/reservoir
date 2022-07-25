<x-home>
    <x-slot name="title">Links</x-slot>

    <div class="px-4 py-1 w-full">
        <div class="pb-4 border-b-2 border-gray-200 flex items-center justify-between">
            <p class="text-2xl font-bold leading-normal text-gray-800">
                Links
            </p>
        </div>

        <div class="bg-white py-8">
            <table class="w-full whitespace-nowrap">
                <thead>
                <tr class="h-16 border border-gray-100 rounded">
                    <td class="px-2 text-base font-medium text-gray-700">Title</td>
                    <td class="px-2 text-base font-medium text-gray-700">URL</td>
                    <td class="px-2 text-base font-medium text-gray-700">Timestamp</td>
                    <td></td>
                </tr>
                </thead>

                <tbody>
                @forelse($links as $link)
                    <tr class="h-16 border border-gray-100 rounded">
                        <td class="px-2 text-base leading-none text-gray-700">
                            {{ $link->title }}
                        </td>

                        <td class="px-2 text-base leading-none text-gray-700">
                            {{ $link->url }}
                        </td>

                        <td class="px-2 text-base leading-none text-gray-700">
                            {{ $link->created_at }}
                        </td>

                        <td class="px-2">
                            <div class="flex gap-x-3 justify-end items-center">
                                <a href="{{ $link->url }}"
                                   target="{{ $link->in_new_tab ? '_blank' : '_self' }}"
                                   class="text-sm text-white p-2 bg-gray-500 rounded hover:bg-gray-700">
                                    <svg width="24"
                                         height="24"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.25"
                                         stroke="currentColor"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="2"/>
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"
                            class="h-64 text-center bg-gray-100 font-mono font-semibold text-gray-700">
                            Archive is void. Wait till <code>admin</code> updates their storage.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @isset($links)
                <div class="mt-4">
                    {{ $links->links() }}
                </div>
            @endisset
        </div>
    </div>
</x-home>
