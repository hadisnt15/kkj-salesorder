<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:titleHeader>{{ $titleHeader }}</x-slot:titleHeader>

    @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="relative overflow-x-auto shadow-md rounded-lg border border-zinc-600 py-2 px-2">
        <nav class="opacity-75 flex mb-4 px-5 py-3 border rounded-lg bg-red-700 border-red-800" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li aria-current="page">
                    <div class="flex items-center">
                        <span class="ms-1 text-sm font-medium text-white text-shadow-red-950 md:ms-2 ">
                            <i class="ri-user-follow-fill"></i>{{ $titleHeader }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="grid grid-cols-1 md:grid-cols-[1fr_2fr] gap-4 items-center pb-4 w-full">
            <div>
                <form action="/user" method="get">
                    <label for="search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <input type="search" id="search" name="search"
                            class="opacity-75 block w-full p-2 ps-10 text-sm border rounded-lg  bg-red-300 border-red-600 placeholder-red-700 text-red-950 focus:ring-red-900 focus:border-red-900"
                            placeholder="Search User" required />
                        <button type="submit"
                            class="opacity-75 text-white absolute end-2 bottom-1.5 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-1 bg-red-900 hover:bg-red-700 focus:ring-red-900"><i
                                class="ri-search-eye-fill"></i></button>
                    </div>
                </form>
            </div>
            <div class="md:ml-auto">
                <div class="flex items-center">
                    <div class="me-2">
                        <form action="{{ route('customer.import') }}" method="POST" enctype="multipart/form-data"
                            class="">@csrf
                            <label for="import" class="mb-2 text-sm font-medium sr-only">Import</label>
                            <div class="relative w-64">
                                <input
                                    class="block w-full text-xs rounded-lg cursor-pointer text-red-700 focus:outline-none opacity-75 bg-red-300 border border-red-900 placeholder-red-900"
                                    id="import" type="file" name="import">
                                <button type="submit"
                                    class="opacity-75 text-white absolute end-2 bottom-1.5 font-medium rounded-lg text-sm px-4 py-1 bg-red-900 hover:bg-red-700"><i
                                        class="ri-import-fill"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="">
                        <div class="me-2">
                            <a href="{{ route('user') }}"
                                class="opacity-75 flex-shrink-0 rounded-lg px-2 py-2 bg-red-900 hover:bg-red-700 font-medium text-white"><i
                                    class="ri-file-excel-2-fill"></i></a>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a href="{{ route('user.create') }}"
                                class="opacity-75 flex-shrink-0 rounded-lg px-2 py-2 bg-red-900 hover:bg-red-700 font-medium text-white"><i
                                    class="ri-add-box-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- MOBILE --}}
        <div
            class="opacity-75 md:hidden w-full max-w-md p-4 border rounded-lg shadow-sm sm:p-8 bg-red-800 border-red-700">
            <div class="flow-root">
                <ul role="list" class="divide-y divide-red-200">
                    @foreach ($user as $usr)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium truncate text-white">
                                        {{ strtoupper($usr->name) }}
                                    </p>
                                    <p class="text-sm font-sm truncate text-white capitalize">
                                        {{ $usr->level }}
                                    </p>
                                    <button data-modal-target="user-view" data-modal-toggle="user-view" type="button"
                                        class="open-modal-user-btn" data-name="{{ $usr->name }}"
                                        data-email="{{ $usr->email }}" data-level="{{ $usr->level }}"
                                        data-created_at="{{ $usr->created_at }}">
                                        <a href="#">
                                            <span
                                                class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm bg-blue-900 text-white">
                                                <i class="ri-id-card-fill me-1"></i>Detail
                                            </span>
                                        </a>
                                    </button>
                                    <button type="button">
                                        <a href="{{ route('user.edit', $usr->id) }}" class="">
                                            <span
                                                class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm bg-green-900 text-white">
                                                <i class="ri-edit-box-fill me-1"></i>Update
                                            </span>
                                        </a>
                                    </button>
                                    <button type="button">
                                        <a href="{{ route('user.delete', $usr->id) }}" class="">
                                            <span
                                                class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm bg-yellow-900 text-white">
                                                <i class="ri-delete-back-2-fill me-1"></i>Delete
                                            </span>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{-- END MOBILE --}}

        {{-- DESKTOP --}}
        <div class="hidden md:block">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase  dark:bg-red-700 dark:text-white opacity-75">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Level
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $usr)
                        <tr
                            class="bg-white opacity-75 border-b dark:bg-red-100 text-red-900 text-shadow-white dark:border-gray-700 border-gray-200 hover:bg-red-300">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-red-900 whitespace-nowrap text-shadow-white">
                                {{ strtoupper($usr->name) }}
                            </th>
                            <td class="px-6 py-4 font-medium">
                                {{ $usr->email }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ strtoupper($usr->created_at) }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ strtoupper($usr->level) }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ strtoupper($usr->status == 1 ? 'ACTIVE':'NON ACTIVE') }}
                            </td>
                            <td class="px-6 py-4">
                                <button data-modal-target="user-view" data-modal-toggle="user-view" type="button"
                                    class="open-modal-user-btn bg-red-300 hover:bg-red-700 rounded px-0.5 py-0.5 text-blue-600"
                                    data-name="{{ $usr->name }}" data-email="{{ $usr->email }}"
                                    data-level="{{ $usr->level }}" data-created_at="{{ $usr->created_at }}">
                                    <a href="#">
                                        <i class="ri-id-card-fill"></i>
                                    </a>
                                </button>
                                <button type="button"
                                    class="bg-red-300 hover:bg-red-700 rounded px-0.5 py-0.5 text-green-600">
                                    <a href="{{ route('user.edit', $usr->id) }}" class=""><i
                                            class="ri-edit-box-fill"></i></a>
                                </button>
                                <button type="button"
                                    class="bg-red-300 hover:bg-red-700 rounded px-0.5 py-0.5 text-yellow-600">
                                    <a href="{{ route('user.delete', $usr->id) }}" class=""><i
                                            class="ri-delete-back-2-fill"></i></a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- END DESKTOP --}}
        <div class="mt-5 text-red-900">
            {{ $user->links() }}
        </div>
    </div>
    <!-- User Modal View -->
    <div id="user-view" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow-sm bg-red-600 opacity-75">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600 ">
                    <h3 class="text-xl font-medium text-white">
                        <span id="modalname"></span> <br>
                        <span id="modallevel" class="capitalize text-sm"></span>
                    </h3>
                    <button type="button"
                        class="text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-red-900 hover:text-white"
                        data-modal-hide="user-view">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="flex items-center justify-between px-4 md:px-5 py-2 border-b rounded-t border-gray-600 ">
                    <p class="text-sm text-white">
                        Email: <span class="font-medium" id="modalemail"></span><br>
                        Created At: <span class="font-medium" id="modalcreated_at"></span>
                    </p>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        {{-- <span id="modalCstAddress"></span>, <br>
                        <span id="modalCstCity"></span>, <br>
                        <span id="modalCstState"></span> --}}
                    </p>
                    {{-- <img src="img/hadi.jpg" alt=""> --}}
                    {{-- <figure
                        class="relative mx-auto max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                        <a href="#">
                            <img class="rounded-lg" src="img/hadi.jpg" alt="image description">
                        </a>
                        <figcaption class="absolute px-4 text-lg text-white bottom-6">
                            <p>Do you want to get notified when a new component is added to Flowbite?</p>
                        </figcaption>
                    </figure> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        // Fungsi buka modal
        function openModalView(name, email, level, created_at) {
            document.getElementById('modalname').innerText = name;
            document.getElementById('modalemail').innerText = email;
            document.getElementById('modallevel').innerText = level;
            document.getElementById('modalcreated_at').innerText = created_at;
            document.getElementById('user-view').classList.remove('hidden');
            document.getElementById('user-view').classList.add('flex');
        }

        // Saat DOM sudah siap
        document.addEventListener('DOMContentLoaded', function() {
            const buttonsView = document.querySelectorAll('.open-modal-user-btn');
            buttonsView.forEach(button => {
                button.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    const email = this.getAttribute('data-email');
                    const level = this.getAttribute('data-level');
                    const created_at = this.getAttribute('data-created_at');
                    openModalView(name, email, level, created_at);
                });
            });
        });
    </script>

</x-layout>
