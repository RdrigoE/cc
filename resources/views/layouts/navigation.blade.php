<nav>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <ul>
            <li><a href="{{ route('projects.index') }}">Projects</a></li>
        </ul>
    </div>

    <!-- Responsive Settings Options -->
    <ul class="pt-4 pb-1 border-t border-gray-200">
        <li>
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

        </li>
        <!-- Authentication -->
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </li>
    </ul>
</nav>
