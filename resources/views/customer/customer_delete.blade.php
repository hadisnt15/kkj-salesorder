<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:titleHeader>{{ $titleHeader }}</x-slot:titleHeader>


    <form class="mx-auto " action="{{ route('customer.destroy', $cst->id) }}" method="post"> @csrf @method('delete')
        <nav class="flex mb-4 px-5 py-3 border rounded-lg bg-red-700 border-red-800 opacity-75"
            aria-label="Breadcrumb" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/customer"
                        class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-red-400">
                        <i class="ri-account-circle-2-fill me-1"></i>Customer
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-white"><i
                                class="ri-delete-back-2-fill me-1"></i>Delete Customer</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="opacity-75 border border-y-zinc-800 rounded-lg sm:max-w-xl mx-auto bg-red-600">
            <div class="border-b ">
                <div class="">
                    <h3 class="text-xl font-medium text-white py-4 px-3">
                        {{ $cst->CstName }} <br> {{ $cst->CstCode }}
                    </h3>
                </div>
            </div>
            <div class="border-b border-gray-500">
                <div class="bg-red-300">
                    <div class="py-4">
                        <p class="py-1 text-sm font-medium text-black px-8">Contact Person:
                            {{ $cst->CstPerson }}</p>
                        <p class="py-1 text-sm font-medium text-black px-8">Phone Number:
                            {{ $cst->CstPhoneNum }}</p>
                    </div>
                </div>
            </div>
            <div class="border-b border-gray-500">
                <div class="bg-red-300">
                    <div class="py-4">
                        <p class="py-1 text-sm font-medium text-black px-8">{{ $cst->CstAddress }}
                        </p>
                        <p class="py-1 text-sm font-medium text-black px-8">{{ $cst->CstCity }}</p>
                        <p class="py-1 text-sm font-medium text-black px-8">{{ $cst->CstState }}</p>
                    </div>
                </div>
            </div>
            <div class="px-2 py-2">
                <button type="submit"
                    class="mt-3 w-full text-white bg-red-900 hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Delete
                    Customer</button>
            </div>
        </div>
    </form>

</x-layout>
