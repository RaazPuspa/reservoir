<x-home>
    <x-slot name="title">Files</x-slot>

    <div class="px-4 py-1 w-full">
        <div class="pb-4 border-b-2 border-gray-200 flex items-center justify-between">
            <p class="text-2xl font-bold leading-normal text-gray-800">
                Files
            </p>
        </div>

        <div class="bg-white py-8">
            <table class="w-full whitespace-nowrap">
                <thead>
                <tr class="h-16 border border-gray-100 rounded">
                    <td class="px-4 text-base font-medium text-gray-700">Title</td>
                    <td class="px-4 text-base font-medium text-gray-700">File Name</td>
                    <td class="px-4 text-base font-medium text-gray-700">File Size</td>
                    <td class="px-4 text-base font-medium text-gray-700">Timestamp</td>
                    <td></td>
                </tr>
                </thead>

                <tbody>
                @forelse($files as $file)
                    <tr class="h-16 border border-gray-100 rounded">
                        <td class="px-4 text-base leading-none text-gray-700">
                            {{ $file->title }}
                        </td>

                        <td class="px-4 text-base leading-none text-gray-700">
                            {{ $file->name }}
                        </td>

                        <td class="px-4 text-base leading-none text-gray-700">
                            {{ $file->size }}
                        </td>

                        <td class="px-4 text-base leading-none text-gray-700">
                            {{ $file->created_at }}
                        </td>

                        <td class="px-4">
                            <div class="flex gap-x-3 justify-end items-center">
                                <a download
                                   href="{{ $file->download_url }}"
                                   class="text-sm text-white p-2 bg-gray-500 rounded hover:bg-gray-700">
                                    <svg width="24"
                                         height="24"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.25"
                                         stroke="currentColor"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"/>
                                        <polyline points="7 11 12 16 17 11"/>
                                        <line x1="12" y1="4" x2="12" y2="16"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"
                            class="h-64 text-center bg-gray-100 font-mono font-semibold text-gray-700">
                            Storage is void. Wait till <code>admin</code> updates their library.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @isset($files)
                <div class="mt-4">
                    {{ $files->links() }}
                </div>
            @endisset
        </div>
    </div>
</x-home>
