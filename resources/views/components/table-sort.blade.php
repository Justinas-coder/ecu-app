@props(['column'])

<th scope="col"
    class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900">
    <form action="{{ route('ecu.index') }}" method="GET">
        @csrf
        <input type="hidden" value="{{ old('query') }}" name="query">
        <input type="hidden" value="{{ $column }}" name="sort">
        <input type="hidden"
               value="{{ old('direction') && old('sort') === $column ? (old('direction') === 'desc' ? '' : 'desc')  : 'asc' }}"
               name="direction">
        <button
                 type="submit">
            {{ $slot }}
            @if(old('sort') === $column)
                @if(old('direction') === 'desc')
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-up inline-block"
                         width="44"
                         height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 5l0 14"/>
                        <path d="M16 9l-4 -4"/>
                        <path d="M8 9l4 -4"/>
                    </svg>
                @endif
                @if(old('direction') === 'asc')
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-down inline-block"
                         width="44"
                         height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 5l0 14"/>
                        <path d="M16 15l-4 4"/>
                        <path d="M8 15l4 4"/>
                    </svg>
                @endif
            @endif
        </button>
    </form>
</th>
