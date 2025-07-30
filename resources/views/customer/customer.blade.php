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
        <div class="grid grid-cols-1 md:grid-cols-[1fr_2fr] gap-4 items-center pb-4 w-full">
            <div>
                <form action="/customer" method="get">
                    <label for="search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <input type="search" id="search" name="search"
                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Customer" required />
                        <button type="submit"
                            class="text-white absolute end-2 bottom-1.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-gray-400 dark:hover:bg-gray-700 dark:focus:ring-blue-800"><i
                                class="ri-search-eye-fill"></i></button>
                    </div>
                </form>
            </div>
            <div class="md:ml-auto">
                <div class="flex items-center">
                    <div class="me-2">
                        <form action="{{ route('customer.import') }}" method="POST" enctype="multipart/form-data">@csrf
                            <label for="import"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Import</label>
                            <div class="relative w-64">
                                <input
                                    class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="import" type="file" name="import">
                                <button type="submit"
                                    class="text-white absolute end-2 bottom-1.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-gray-400 dark:hover:bg-gray-700 dark:focus:ring-blue-800"><i
                                        class="ri-import-fill"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-[1fr_2fr] gap-4 items-center pb-4 w-full">
            <div>
                <div>
                    <a href="{{ route('customer.create') }}"
                        class="flex-shrink-0 rounded-lg px-2 py-2 bg-gray-50 hover:bg-gray-700 dark:bg-gray-700 hover:dark:bg-gray-500 font-medium text-white"><i
                            class="ri-add-box-fill"></i> Create</a>
                </div>
            </div>
            <div class="md:ml-auto">
                <div class="me-2">
                    <a href="{{ route('customer.xlsx') }}"
                        class="flex-shrink-0 rounded-lg px-2 py-2 bg-gray-50 hover:bg-gray-700 dark:bg-gray-700 hover:dark:bg-gray-500 font-medium text-white"><i
                            class="ri-file-excel-2-fill"></i> Export</a>
                </div>
            </div>
        </div>
        {{-- MOBILE --}}
        <div
            class="md:hidden w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($customer as $cst)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ strtoupper($cst->CstName) }} ({{ strtoupper($cst->CstCode) }})
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400 capitalize">
                                        {{ strtoupper($cst->CstCity) }}, {{ strtoupper($cst->CstState) }}
                                    </p>
                                    <button data-modal-target="customer-view" data-modal-toggle="customer-view"
                                        type="button" class="open-modal-customer-btn"
                                        data-CstCode="{{ $cst->CstCode }}" data-CstName="{{ $cst->CstName }}"
                                        data-CstState="{{ $cst->CstState }}" data-CstCity="{{ $cst->CstCity }}"
                                        data-CstPerson="{{ $cst->CstPerson }}"
                                        data-CstPhoneNum="{{ $cst->CstPhoneNum }}"
                                        data-CstAddress="{{ $cst->CstAddress }}">
                                        <a href="#">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                                                <i class="ri-id-card-fill me-1"></i>Detail
                                            </span>
                                        </a>
                                    </button>
                                    <button type="button">
                                        <a href="{{ route('customer.edit', $cst->id) }}" class="">
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                                                <i class="ri-edit-box-fill me-1"></i>Update
                                            </span>
                                        </a>
                                    </button>
                                    <button type="button">
                                        <a href="{{ route('customer.delete', $cst->id) }}" class="">
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
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
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Customer Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Province
                        </th>
                        <th scope="col" class="px-6 py-3">
                            City
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $cst)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ strtoupper($cst->CstCode) }}
                            </th>
                            <td class="px-6 py-4">
                                {{ strtoupper($cst->CstName) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ strtoupper($cst->CstState) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ strtoupper($cst->CstCity) }}
                            </td>
                            <td class="px-6 py-4">
                                <button data-modal-target="customer-view" data-modal-toggle="customer-view"
                                    type="button"
                                    class="open-modal-customer-btn bg-gray-400 rounded px-0.5 py-0.5 text-blue-800 dark:text-blue-600"
                                    data-CstCode="{{ $cst->CstCode }}" data-CstName="{{ $cst->CstName }}"
                                    data-CstState="{{ $cst->CstState }}" data-CstCity="{{ $cst->CstCity }}"
                                    data-CstPerson="{{ $cst->CstPerson }}"
                                    data-CstPhoneNum="{{ $cst->CstPhoneNum }}"
                                    data-CstAddress="{{ $cst->CstAddress }}">
                                    <a href="#">
                                        <i class="ri-id-card-fill"></i>
                                    </a>
                                </button>
                                <button type="button"
                                    class="bg-gray-400 rounded px-0.5 py-0.5 text-green-800 dark:text-green-600">
                                    <a href="{{ route('customer.edit', $cst->id) }}" class=""><i
                                            class="ri-edit-box-fill"></i></a>
                                </button>
                                <button type="button"
                                    class="bg-gray-400 rounded px-0.5 py-0.5 text-red-800 dark:text-red-600">
                                    <a href="{{ route('customer.delete', $cst->id) }}" class=""><i
                                            class="ri-delete-back-2-fill"></i></a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- END DESKTOP --}}
        <div class="mt-5">
            {{ $customer->links() }}
        </div>
    </div>
    <!-- Customer Modal View -->
    <div id="customer-view" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        <span id="modalCstName"></span><br>
                        <span id="modalCstCode"></span>
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="customer-view">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div
                    class="flex items-center justify-between px-4 md:px-5 py-2 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <p class="text-sm text-gray-900 dark:text-white">
                        Contact Person: <span class="font-medium" id="modalCstPerson"></span><br>
                        Phone Number: <span class="font-medium" id="modalCstPhoneNum"></span>
                    </p>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        <span id="modalCstAddress"></span>, <br>
                        <span id="modalCstCity"></span>, <br>
                        <span id="modalCstState"></span>
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
        function openModalView(CstCode, CstName, CstAddress, CstCity, CstState, CstPerson, CstPhoneNum) {
            document.getElementById('modalCstCode').innerText = CstCode;
            document.getElementById('modalCstName').innerText = CstName;
            document.getElementById('modalCstAddress').innerText = CstAddress;
            document.getElementById('modalCstCity').innerText = CstCity;
            document.getElementById('modalCstState').innerText = CstState;
            document.getElementById('modalCstPerson').innerText = CstPerson;
            document.getElementById('modalCstPhoneNum').innerText = CstPhoneNum;
            document.getElementById('customer-view').classList.remove('hidden');
            document.getElementById('customer-view').classList.add('flex');
        }

        // Tutup modal
        // function closeModal() {
        //     document.getElementById('large-modal-view').classList.remove('flex');
        //     document.getElementById('large-modal-view').classList.add('hidden');
        // }

        // Saat DOM sudah siap
        document.addEventListener('DOMContentLoaded', function() {
            const buttonsView = document.querySelectorAll('.open-modal-customer-btn');
            buttonsView.forEach(button => {
                button.addEventListener('click', function() {
                    const CstCode = this.getAttribute('data-CstCode');
                    const CstName = this.getAttribute('data-CstName');
                    const CstAddress = this.getAttribute('data-CstAddress');
                    const CstCity = this.getAttribute('data-CstCity');
                    const CstState = this.getAttribute('data-CstState');
                    const CstPerson = this.getAttribute('data-CstPerson');
                    const CstPhoneNum = this.getAttribute('data-CstPhoneNum');
                    openModalView(CstCode, CstName, CstAddress, CstCity, CstState, CstPerson,
                        CstPhoneNum);
                });
            });
        });
    </script>

</x-layout>
