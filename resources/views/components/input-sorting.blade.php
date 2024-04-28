@props(['sortingOptions'])

<form class="max-w-md mx-auto mb-5" action="{{ route('ecu.index') }}" method="GET">
    @csrf

    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <select id="default-search"
                name="ecuModel"
                type="hidden"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                onchange="this.form.submit()">
            <option value="" disabled selected>Sort by ECU Model</option>
            @foreach($sortingOptions as $model)
                <option value="{{ $model }}" @if(old('ecuModel') == $model) selected @endif>{{ $model }}</option>
            @endforeach
        </select>
    </div>
</form>
