<x-layout>
    @isset($title)
        <x-slot name="title">{{ $title }}</x-slot>
    @endisset

    <div class="lg:flex">
        <aside class="w-48 static border-r-2 border-gray-200">
            <div class="h-full w-48 scrolling-touch">
                <nav class="pb-20 font-normal text-base">
                    <ul class="list-unstyled fw-normal divide-y divide-gray-200">
                        <li>
                            <a href="{{ route('home.files.index') }}"
                               @class(['px-6 py-4 text-xl transition-colors duration-200 block text-gray-500 hover:text-gray-100 hover:bg-gray-500', 'bg-gray-700 text-gray-100' => request()->routeIs('home.files.index')])>
                                Files
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('home.links.index') }}"
                               @class(['px-6 py-4 text-xl transition-colors duration-200 block text-gray-500 hover:text-gray-100 hover:bg-gray-500', 'bg-gray-700 text-gray-100' => request()->routeIs('home.links.index')])>
                                Links
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('home.snippets.index') }}"
                               @class(['px-6 py-4 text-xl transition-colors duration-200 block text-gray-500 hover:text-gray-100 hover:bg-gray-500', 'bg-gray-700 text-gray-100' => request()->routeIs('home.snippets.index')])>
                                Snippets
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <main class="flex-auto max-h-full overflow-visible" style="height: calc(100vh - 89px)">
            <div class="flex w-full px-4">
                {{ $slot }}
            </div>
        </main>
    </div>
</x-layout>
