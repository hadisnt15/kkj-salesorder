<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:titleHeader>{{ $titleHeader }}</x-slot:titleHeader>




    <div class="border border-zinc-600 py-2 px-2 rounded-md sm:max-w-xl mx-auto">
        <nav class="flex mb-4 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/customer"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-600 dark:hover:text-gray-600">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><i
                                class="ri-edit-box-fill me-1"></i>Update Customer</span>
                    </div>
                </li>
            </ol>
        </nav>
        <form class="mx-auto" action="{{ route('customer.update', $cst->id) }}" method="POST"> @csrf @method('PUT')
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-2">
                    <label for="CstCode" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Customer
                        Code</label>
                    <input type="text" id="CstCode" name="CstCode" value="{{ old('CstCode', $cst->CstCode) }}"
                        autocomplete="off"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-400 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Customer Code" required disabled />
                    @error('CstCode')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="CstName" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Customer
                        Name</label>
                    <input type="text" id="CstName" name="CstName" value="{{ old('CstName', $cst->CstName) }}"
                        autocomplete="off"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Customer Name" required />
                    @error('CstName')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-2">
                    <label for="CstPerson" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Customer
                        Contact Person</label>
                    <input type="text" id="CstPerson" name="CstPerson"
                        value="{{ old('CstPerson', $cst->CstPerson) }}" autocomplete="off"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Customer Contact Person" required />
                    @error('CstPerson')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="CstPhoneNum" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Customer
                        Phone Number</label>
                    <input type="number" id="CstPhoneNum" name="CstPhoneNum"
                        value="{{ old('CstPhoneNum', $cst->CstPhoneNum) }}" autocomplete="off"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Customer Phone Number" required />
                    @error('CstPhoneNum')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-2">
                    <label for="CstState" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Customer
                        State</label>
                    <input type="text" id="CstState" name="CstState" value="{{ old('CstState', $cst->CstState) }}"
                        autocomplete="off"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Customer State" required />
                    @error('CstState')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="CstCity" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Customer
                        City</label>
                    <input type="text" id="CstCity" name="CstCity" value="{{ old('CstCity', $cst->CstCity) }}"
                        autocomplete="off"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Customer City" required />
                    @error('CstCity')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="CstAddress" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Customer
                    Address</label>
                <textarea id="CstAddress" name="CstAddress" rows="3" value="" autocomplete="off"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Customer Address">{{ old('CstAddress', $cst->CstAddress) }}</textarea>
                @error('CstAddress')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit"
                class="mt-3 w-full text-white bg-gray-950 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-950 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Update
                Customer</button>
        </form>
    </div>

</x-layout>
