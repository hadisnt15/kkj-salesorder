<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:titleHeader>{{ $titleHeader }}</x-slot:titleHeader>


    <div class="border border-zinc-600 py-2 px-2 rounded-md sm:max-w-xl mx-auto">
        <nav class="flex mb-4 px-5 py-3 border rounded-lg bg-red-700 border-red-800 opacity-75" aria-label="Breadcrumb"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/employee"
                        class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-red-400">
                        <i class="ri-user-follow-fill"></i>Employee
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-white md:ms-2"><i
                                class="ri-add-box-fill me-1"></i>Create Employee</span>
                    </div>
                </li>
            </ol>
        </nav>
        <form class="mx-auto" action="{{ route('employee.create') }}" method="post"> @csrf
            <div class="mb-2">
                <label for="EmpCode" class="mb-2 text-sm font-medium text-red-950">Employee
                    Code</label>
                <input type="number" id="EmpCode" name="EmpCode" value="{{ old('EmpCode') }}" autocomplete="off"
                    class="opacity-75 bg-red-300 border-red-600 placeholder-red-700 text-red-950 focus:ring-red-900 focus:border-red-900 border text-sm rounded-lg w-full p-2.5"
                    placeholder="Employee Code" required />
                @error('EmpCode')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-2">
                <label for="EmpUsrId" class="mb-2 text-sm font-medium text-red-950">Employee User ID</label>
                <select id="EmpUsrId" name="EmpUsrId"
                    class="opacity-75 bg-red-300 border-red-600 placeholder-red-700 border text-sm rounded-lg text-red-700 focus:ring-red-900 focus:border-red-900 block w-full p-2.5 ">
                    <option selected>Select Employee User ID</option>
                    @foreach ($user as $usr)
                        <option value="{{ $usr->id }}" data-nama="{{ $usr->name }}">{{ $usr->id }} -
                            {{ strtoupper($usr->name) }} - {{ strtoupper($usr->level) }}</option>
                    @endforeach
                </select>
                @error('EmpUsrId')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-2">
                <div class="mb-2">
                    <label for="div" class="mb-2 text-sm font-medium text-red-950">Division</label>
                    <select id="div" name="div"
                        class="opacity-75 bg-red-300 border-red-600 placeholder-red-700 border text-sm rounded-lg text-red-950 focus:ring-red-900 focus:border-red-900 block w-full p-2.5 ">
                        <option selected value="">
                            Select Division</option>
                        <option value="LUBRICANT IDS">LUBRICANT IDS</option>
                        <option value="LUBRICANT RTL">LUBRICANT RTL</option>
                        <option value="SPAREPART">SPAREPART</option>
                        <option value="GENERAL">GENERAL</option>
                    </select>
                    @error('division')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="mt-3 w-full opacity-75 bg-red-900 hover:bg-red-700 font-medium text-white rounded-lg text-sm px-5 py-2.5 text-center">Create
                Employee</button>
        </form>
    </div>

</x-layout>
