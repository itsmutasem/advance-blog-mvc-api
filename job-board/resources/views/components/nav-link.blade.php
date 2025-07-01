@php
    $current = "bg-gray-900 text-white";
    $default = "text-gray-300 hover:bg-gray-700 hover:text-white";
@endphp
<a href="{{ $href }}" class="rounded-md  px-3 py-2 text-sm font-medium {{ request()->is('/') ? $current : $default }}" aria-current="page">
    {{ $slot }}
</a>
