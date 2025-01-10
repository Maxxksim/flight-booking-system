<x-app-layout>
    <div class="overflow-x-auto">
        <table
            class="w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
            <thead>
            <tr class="bg-gray-200 dark:bg-gray-700">
                <th class="px-6 py-3 text-xs font-medium text-gray-700 dark:text-gray-300 uppercase text-center">
                    City Name
                </th>
                <th class="px-6 py-3 text-xs font-medium text-gray-700 dark:text-gray-300 uppercase text-center">
                    Visit Count
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($topCities as $city)
                <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 text-center max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap">
                        <span class="cell-value" title="{{ $city->name }}">{{ $city->name }}</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 text-center max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap">
                        <span class="cell-value" title="{{ $city->visit_count }}">{{ $city->visit_count }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
