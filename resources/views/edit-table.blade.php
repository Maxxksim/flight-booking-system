
<x-app-layout>
    <div class="container mx-auto py-8">
        @if(Auth::user()->name == 'admin')
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">{{ $table }}</h2>
            <x-edit-table :headers="$headers" :rows="$rows" :table="$table"/>
        @else
            <p class="text-white">You do not have permission to view this page.</p>
        @endif
    </div>
</x-app-layout>
