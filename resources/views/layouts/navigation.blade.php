<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="url('/')" :active="request()->is('/')">
                        {{ __('Ana Sayfa') }}
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('İlanlarım') }}
                        </x-nav-link>

                        <x-nav-link :href="route('ads.create')" :active="request()->routeIs('ads.create')">
                            {{ __('İlan Ver') }}
                        </x-nav-link>

                        @if(Auth::user()->is_admin)
                            <x-nav-link :href="route('admin.panel')" :active="request()->routeIs('admin.panel')" class="text-red-600 font-bold">
                                {{ __('Admin Paneli') }}
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-6">
                @auth
                    <span class="text-sm font-medium text-gray-600">
                        {{ Auth::user()->name }}
                    </span>

                    <a href="{{ route('profile.edit') }}" class="text-sm text-gray-500 hover:text-gray-700">
                        {{ __('Profil') }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-red-600 hover:text-red-800 border border-red-200 px-3 py-1 rounded-md hover:bg-red-50 transition">
                            {{ __('Çıkış Yap') }}
                        </button>
                    </form>
                @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Giriş Yap</a>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Kayıt Ol</a>
                    </div>
                @endauth
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-50 border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('/')" :active="request()->is('/')">
                {{ __('Ana Sayfa') }}
            </x-responsive-nav-link>
            
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('İlanlarım') }}
                </x-responsive-nav-link>
                @if(Auth::user()->is_admin)
                    <x-responsive-nav-link :href="route('admin.panel')" :active="request()->routeIs('admin.panel')" class="text-red-600 font-bold">
                        {{ __('Admin Paneli') }}
                    </x-responsive-nav-link>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 font-bold">
                        {{ __('Çıkış Yap') }}
                    </x-responsive-nav-link>
                </form>
            @endauth
        </div>
    </div>
</nav>