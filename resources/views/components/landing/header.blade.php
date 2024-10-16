<header
    class="absolute inset-x-0 top-0 z-40 scroll-smooth"
    x-data="{ sidebarOpen: false }"
>
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Hai La Olimpiadă>
                <img
                    class="h-12 w-auto"
                    src="/static/logo.svg"
                    alt="Logo"
                >
            </a>
        </div>
        <div class="flex lg:hidden">
            <button
                type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                @click="sidebarOpen = !sidebarOpen"
            >
                <span class="sr-only">Deschide meniul principal</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="#{{ __("despre") }}" class="text-sm font-semibold leading-6 text-gray-900">{{ __("Despre") }}</a>
            <a href="#{{ __("contact") }}" class="text-sm font-semibold leading-6 text-gray-900">{{ __("Contact") }}</a>
        </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                @guest
                    <a
                        href="{{ route("login") }}"
                        class="text-sm font-semibold leading-6 text-gray-900"
                    >
                        {{ __("Loghează-te") }} <span aria-hidden="true">&rarr;</span>
                    </a>
                @endguest
                @auth
                    <a
                        href="{{ route(request()->user()->role . ".dashboard") }}"
                        class="text-sm font-semibold leading-6 text-gray-900"
                    >
                        {{ __("Dashboard") }} <span aria-hidden="true">&rarr;</span>
                    </a>
                @endauth
            </div>
    </nav>
    <div
        class="lg:hidden"
        x-show="sidebarOpen"
        role="dialog"
        aria-modal="true"
    >
        <div class="fixed inset-0 z-50"></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="{{ route("index") }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Hai La Olimpiadă</span>
                    <img
                        class="h-8 w-auto"
                        src="/static/logo.svg"
                        alt="Logo"
                    >
                </a>
                <button
                    type="button"
                    class="-m-2.5 rounded-md p-2.5 text-gray-700"
                    @click="sidebarOpen = false"
                >
                    <span class="sr-only">{{ __("Închide meniul") }}</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="#despre" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ __("Despre") }}</a>
                        <a href="#contact" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ __("Contact") }}</a>
                    </div>
                    <div class="py-6">
                        @guest
                            <a href="{{ route("login") }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ __("Loghează-te") }}</a>
                        @endguest
                        @auth
                            <a
                                href="{{ route(request()->user()->role . ".dashboard") }}"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                            >{{ __("Dashboard") }}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
