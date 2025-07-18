<div x-data="{ open: false }" class="relative inline-block">
    <button @click="open = !open" class="px-4 py-2 bg-blue-500 rounded hover:bg-blue-700">
        {{ strtoupper(LaravelLocalization::getCurrentLocale()) }}
    </button>
    <ul x-show="open" @click.away="open = false" class="absolute mt-2 bg-white text-black rounded shadow-lg">
        <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="block px-4 py-2 hover:bg-gray-200">English</a></li>
        <li><a href="{{ LaravelLocalization::getLocalizedURL('fr') }}" class="block px-4 py-2 hover:bg-gray-200">Français</a></li>
    </ul>
</div>