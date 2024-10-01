@props(['url', 'hasForm' => false, 'formId' => null])

<li>
    <a href="{{ $url }}"
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
        {{ $attributes }}>
        {{ $slot }}
    </a>

    @if ($hasForm)
        <form action="{{ $url }}" method="post" id="{{ $formId }}">
            @csrf
        </form>
    @endif
</li>
