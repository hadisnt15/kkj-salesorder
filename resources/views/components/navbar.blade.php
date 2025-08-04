<nav class="bg-red-900" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="hidden md:block">
            <div class="grid grid-cols-[1fr_2fr_1fr] h-16 items-center">
                <div class="hidden md:block">
                    <div class="shrink-0 flex">
                        <img class="size-8 bg-red-100 rounded-full w-10 h-10 p-1" src="/img/kkj.png" alt="Your Company" />
                        <div class="rounded-md px-3 py-2 text-sm font-medium text-white">
                            PT. KAPUAS KENCANA JAYA
                        </div>
                    </div>
                </div>
                <div class="hidden md:block mx-auto">
                    <div class="flex items-baseline space-x-1">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link href="/" :active="request()->is('/')"><i
                                class="ri-home-office-fill"></i>Dashboard</x-nav-link>
                        <x-nav-link href="/order" :active="request()->is('order')"><i class="ri-bill-fill"></i>Order</x-nav-link>
                        <x-nav-link href="/item" :active="request()->is('item')"><i class="ri-settings-4-fill"></i>Item</x-nav-link>
                        <x-nav-link href="/customer"
                            class="{{ Route::is('customer', 'customer.create', 'customer.edit', 'customer.delete') ? 'bg-red-500 text-white' : 'text-white hover:bg-red-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                            <i class="ri-account-circle-2-fill"></i>Customer
                        </x-nav-link>
                        <x-nav-link href="/employee" class="{{ Route::is('employee', 'employee.create', 'employee.edit', 'employee.delete') ? 'bg-red-500 text-white' : 'text-white hover:bg-red-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"><i class="ri-group-2-fill"></i>Employee</x-nav-link>
                        <x-nav-link href="/user" class="{{ Route::is('user', 'user.create', 'user.edit', 'user.delete') ? 'bg-red-500 text-white' : 'text-white hover:bg-red-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"><i
                                class="ri-user-follow-fill"></i>User</x-nav-link>
                    </div>
                </div>
                <div class="hidden md:block ml-auto">
                    <div class="ml-4 flex items-center md:ml-6">
                        {{-- @auth
                        <div class="rounded-md px-3 py-2 text-sm font-medium text-white">
                            Halo, {{ auth()->user()->name }}
                        </div>
                    @else
                        <div class="rounded-md px-3 py-2 text-sm font-medium text-white">
                            Halo, anda belum login!
                        </div>
                    @endauth --}}
                        <div class="rounded-md px-3 py-2 text-sm font-medium text-white">
                            Halo, Hadi Santoso
                        </div>
                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <div>
                                <button type="button" @click="isOpen = !isOpen"
                                    class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-hidden focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="size-8 rounded-full"
                                        src="/img/hadi.png"
                                        alt="" />
                                </button>
                            </div>


                            <!--
                    Dropdown menu, show/hide based on menu state.

                    Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100 outline-hidden", Not Active: "" -->
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">My Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-1">Settings</a>
                                {{-- @auth
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700">Logout</button>
                                </form>
                            @else
                                <a href="/login" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">Login</a>
                                <a href="/register" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">Register</a>
                            @endauth --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="md:hidden">
            <!-- Mobile menu button -->
            <div class="grid grid-cols-[3fr_1fr] h-16 items-center">
                <div class="shrink-0 flex">
                    <img class="size-8 bg-gray-400 rounded-full w-10 h-10 p-1" src="/img/kkj.png" alt="Your Company" />
                    <div class="rounded-md px-3 py-2 text-sm font-medium text-white">
                        PT. KAPUAS KENCANA JAYA
                    </div>
                </div>
                <div class="ml-auto">
                    <button @click="isOpen = !isOpen" type="button"
                        class="relative inline-flex items-center justify-center rounded-md bg-red-700 p-2 text-white hover:bg-red-600 hover:text-white focus:ring-2"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                            data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                            data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="px-4">
            <div class="flex justify-between space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav-link href="/"
                    class="{{ Route::is('/') ? 'bg-red-600 text-white' : 'text-white hover:bg-red-700 hover:text-white' }} rounded-md px-1 py-3 text-sm font-medium">Dashboard</x-nav-link>
                <x-nav-link href="/order"
                    class="{{ Route::is('/order') ? 'bg-red-600 text-white' : 'text-white hover:bg-red-700 hover:text-white' }} rounded-md px-1 py-2 text-sm font-medium">Order</x-nav-link>
                <x-nav-link href="/item"
                    class="{{ Route::is('item') ? 'bg-red-600 text-white' : 'text-white hover:bg-red-700 hover:text-white' }} rounded-md px-1 py-2 text-sm font-medium">Item</x-nav-link>
                <x-nav-link href="/customer"
                    class="{{ Route::is('customer', 'customer.create', 'customer.edit', 'customer.delete') ? 'bg-red-600 text-white' : 'text-white hover:bg-red-700 hover:text-white' }} rounded-md px-1 py-2 text-sm font-medium">
                    Customer
                </x-nav-link>
                <x-nav-link href="/employee"
                    class="{{ Route::is('employee', 'employee.create', 'employee.edit', 'employee.delete') ? 'bg-red-600 text-white' : 'text-white hover:bg-red-700 hover:text-white' }} rounded-md px-1 py-2 text-sm font-medium">Employee</x-nav-link>
                <x-nav-link href="/user"
                    class="{{ Route::is('user', 'user.create', 'user.edit', 'user.delete') ? 'bg-red-600 text-white' : 'text-white hover:bg-red-700 hover:text-white' }} rounded-md px-1 py-2 text-sm font-medium">User</x-nav-link>
            </div>
            {{-- <div class="grid grid-rows-2">
                <div class="grid grid-cols-3">
                    <x-nav-link href="/" :active="request()->is('/')"><i
                            class="ri-home-office-fill"></i>Dashboard</x-nav-link>
                    <x-nav-link href="/order" :active="request()->is('order')"><i class="ri-bill-fill"></i>Order</x-nav-link>
                    <x-nav-link href="/item" :active="request()->is('item')"><i class="ri-settings-4-fill"></i>Item</x-nav-link>
                </div>
            </div>
            <div class="grid grid-rows-2">
                <div class="grid grid-cols-3">
                    <x-nav-link href="/customer"
                        class="{{ Route::is('customer', 'customer.create', 'customer.edit', 'customer.delete') ? 'bg-gray-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium mx-auto">
                        <i class="ri-account-circle-2-fill"></i>Customer
                    </x-nav-link>
                    <x-nav-link href="/sales"
                        class="{{ Route::is('employee') ? 'bg-gray-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium mx-auto"><i
                            class="ri-group-2-fill"></i>Sales</x-nav-link>
                    <x-nav-link href="/user"
                        class="{{ Route::is('user') ? 'bg-gray-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium mx-auto"><i
                            class="ri-user-follow-fill"></i>User</x-nav-link>
                </div>
            </div> --}}
        </div>
        <div class="border-t border-red-200 pt-4 pb-3">
            <div class="flex items-center px-5">
                <div class="shrink-0">
                    <img class="size-10 rounded-full"
                        src="/img/hadi.png"
                        alt="" />
                </div>
                <div class="ml-3">
                    <div class="text-base/5 font-medium text-white">Hadi Santoso</div>
                    <div class="text-sm font-medium text-white">hadisnt15@gmail.com</div>
                </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white">Your
                    Profile</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white">Settings</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white">Sign
                    out</a>
            </div>
        </div>
    </div>
</nav>
