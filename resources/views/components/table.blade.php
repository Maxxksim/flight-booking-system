<div class="overflow-x-auto">
    <table
        class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
        <thead>
        <tr class="bg-gray-200 dark:bg-gray-700">
            @foreach($headers as $header)
                <th class="px-6 py-3 text-xs font-medium text-gray-700 dark:text-gray-300 uppercase text-center">
                    {{ $header }}
                </th>
            @endforeach
            <th class="px-6 py-3 text-xs font-medium text-gray-700 dark:text-gray-300 uppercase text-center">Actions
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $index => $row)
            <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @foreach($row as $key => $cell)
                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 text-center">
                        <span class="cell-value">{{ $cell }}</span>
                        <input type="text" class="cell-input hidden" value="{{ $cell }}"
                               name="rows[{{ $index }}][{{ $key }}]"/>
                    </td>
                @endforeach
                <td class="px-6 py-4 text-sm text-center">
                    <form method="POST" action="" class="inline-block mr-2"
                          id="edit-form-{{ $index }}">
                        @csrf
                        <button type="button"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 w-20 edit-btn"
                                data-index="{{ $index }}">Edit
                        </button>
                    </form>
                    <form method="POST" action="" class="inline-block mr-2">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 w-20">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4 bg-gray-100 dark:bg-gray-900 p-4 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
        <form action="" method="POST" class="flex flex-wrap gap-4">
            @csrf
            @foreach($headers as $header)
                @if($header !== 'ID')
                    <div>
                        <label for="{{ strtolower($header) }}"
                               class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ $header }}
                        </label>
                        <input type="text" name="{{ strtolower($header) }}" id="{{ strtolower($header) }}"
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 dark:text-gray-300 dark:bg-gray-800"
                               required>
                    </div>
                @endif
            @endforeach
            <div class="flex items-end">
                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600">Add
                </button>
            </div>
        </form>
    </div>
</div>
