<div class="navbar bg-base-200/30 fixed top-0 left-0 z-20 backdrop-blur-sm border-b-2 border-base-200">
    <label for="my-drawer-2" class="btn btn-ghost lg:hidden">
        <x-heroicon-o-bars-3 class="w-6 h-6 text-gray-500"/>
    </label>
    <div class="flex-1">
    </div>
    <div class="flex-none gap-2">
        <div class="form-control">
            <input type="text" placeholder="Search" class="input input-bordered" />
        </div>
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="Your Avatar"/>
                </div>
            </label>
            <ul tabindex="0"
                class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                <li>
                    <a class="justify-between">
                        Profil
                    </a>
                </li>
                <li><a>Pengaturan</a></li>
                <li x-data @click="$store.darkMode.toggle()"><a>Tema</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();">{{ __('Log Out') }}</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
