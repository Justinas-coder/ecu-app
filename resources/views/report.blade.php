<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Totals') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <x-table-sort column="dump_id">ECU Model</x-table-sort>
                                        <x-table-sort column="ecu">Total Number</x-table-sort>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 text-center">
                                    @foreach($ecuData as $data)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                {{ $data->ecu }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->count }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" mb-8">
        <div class="mx-auto max-w-7xl">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    @push('scripts')
        <script>
            const data = {
                labels: @json($ecuData->map(fn ($ecuData) => $ecuData->ecu)),
                datasets: [{
                    label: 'Number of ECU',
                    backgroundColor: 'rgb(255, 99, 132, 0.3)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: @json($ecuData->map(fn ($ecuData) => $ecuData->count)),
                }]
            };

            const config = {
                type: 'bar',
                data: data
            };
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
    @endpush
</x-app-layout>
