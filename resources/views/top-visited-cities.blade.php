<x-app-layout>
    <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
        <tr class="bg-gray-200">
            <th class="px-6 py-3 text-xs font-medium text-gray-700 uppercase text-center">City</th>
            <th class="px-6 py-3 text-xs font-medium text-gray-700 uppercase text-center">Visit Count</th>
        </tr>
        </thead>
        <tbody>
        @foreach($topCities as $city)
            <tr>
                <td class="px-6 py-4 text-sm text-gray-800 text-center">{{ $city->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-800 text-center">{{ $city->visit_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</x-app-layout>
