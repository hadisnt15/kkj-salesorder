<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:titleHeader>{{ $titleHeader }}</x-slot:titleHeader>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-zinc-600 py-2 px-2">
        <nav class="flex mb-4 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li aria-current="page">
                    <div class="flex items-center">
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                            <i class="ri-account-circle-2-fill me-1"></i>{{ $titleHeader }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

</x-layout>
