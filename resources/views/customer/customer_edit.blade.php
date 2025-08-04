<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:titleHeader>{{ $titleHeader }}</x-slot:titleHeader>




    <div class="border border-zinc-600 py-2 px-2 rounded-md sm:max-w-xl mx-auto">
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
                        <span class="ms-1 text-sm font-medium text-white md:ms-2"><i
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
                        class="opacity-75 bg-red-300 border-red-600 placeholder-red-700 text-red-950 focus:ring-red-900 focus:border-red-900 border text-sm rounded-lg w-full p-2.5"
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
                       class="opacity-75 bg-red-300 border-red-600 placeholder-red-700 text-red-950 focus:ring-red-900 focus:border-red-900 border text-sm rounded-lg w-full p-2.5"
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
                        class="opacity-75 bg-red-300 border-red-600 placeholder-red-700 text-red-950 focus:ring-red-900 focus:border-red-900 border text-sm rounded-lg w-full p-2.5"
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
                       class="opacity-75 bg-red-300 border-red-600 placeholder-red-700 text-red-950 focus:ring-red-900 focus:border-red-900 border text-sm rounded-lg w-full p-2.5"
                        placeholder="Customer Phone Number" required />
                    @error('CstPhoneNum')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-2">
                    <label for="CstStateId" class="mb-2 text-sm font-medium text-red-950">Customer
                        State</label>
                    <select id="CstStateId" name="CstStateId"
                        class="opacity-75 bg-red-300 border-red-600 placeholder-red-700 border text-sm rounded-lg text-red-700 focus:ring-red-900 focus:border-red-900 block w-full p-2.5 ">
                        <option selected value="{{ old('CstState', $cst->CstState) }}">{{ old('CstState', $cst->CstState) }}</option>
                        @foreach ($state as $stt)
                            <option value="{{ $stt['id'] }}" data-nama="{{ $stt['name'] }}">{{ $stt['name'] }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="CstState" id="CstState" value="{{ old('CstState', $cst->CstState) }}">
                    @error('CstState')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="CstCity" class="mb-2 text-sm font-medium text-red-950">Customer
                        City</label>
                    <select id="CstCity" name="CstCity"
                        class="opacity-75 bg-red-300 border-red-600 placeholder-red-700 border text-sm rounded-lg text-red-700 focus:ring-red-900 focus:border-red-900 block w-full p-2.5 ">
                        <option selected value="{{ old('CstCity', $cst->CstCity) }}">{{ old('CstCity', $cst->CstCity) }}</option>

                        @error('CstCity')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror
                    </select>
                </div>
            </div>
            <div>
                <label for="CstAddress" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Customer
                    Address</label>
                <textarea id="CstAddress" name="CstAddress" rows="3" value="" autocomplete="off"
                    class="opacity-75 block p-2.5 w-full text-sm rounded-lg border bg-red-300 border-red-600 placeholder-red-700 text-red-700 focus:ring-red-900 focus:border-red-900 "
                    placeholder="Customer Address">{{ old('CstAddress', $cst->CstAddress) }}</textarea>
                @error('CstAddress')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit"
                class="mt-3 w-full opacity-75 bg-red-900 hover:bg-red-700 font-medium text-white rounded-lg text-sm px-5 py-2.5 text-center">Update
                Customer</button>
        </form>
    </div>

</x-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#CstStateId').on('change', function() {
        const stateId = $(this).val();
        const stateName = $(this).find(':selected').data('nama');

        $('#CstState').val(stateName);  
        $('#CstCity').html('<option value="">Loading...</option>');
        if (stateId) {
            $.get('/get-cities/' + stateId, function(data) {
                $('#CstCity').empty().append('<option value="">City</option>');
                $.each(data, function(i, city) {
                    $('#CstCity').append(`<option value="${city.name}">${city.name}</option>`);
                });
            });
        } else {
            $('#CstCity').html('<option value="">City</option>');
        }
    });
</script>
