<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ECU Table') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <x-input-search></x-input-search>
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                @if(count($ecus) > 0)
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead>
                                        <tr>
                                            <x-table-sort column="dump_id">Dump ID</x-table-sort>
                                            <x-table-sort column="ecu">ECU ID</x-table-sort>
                                            <x-table-sort column="attribute">Attribute</x-table-sort>
                                            <x-table-sort column="value">Value</x-table-sort>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 text-center">
                                        @foreach($ecus as $ecu)
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                    {{ $ecu->dump_id }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $ecu->ecu }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $ecu->attribute }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $ecu->value }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $ecus->withQueryString()->links() }}
                                @else
                                    <p>{{ __('No data found.')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
