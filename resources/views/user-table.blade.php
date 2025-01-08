{{-- resources/views/user-table.blade.php --}}

<x-app-layout>
    <div class="container mx-auto py-8">
        @if(Auth::user()->name == 'admin')
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Users</h2>
            <x-table :headers="$headers" :rows="$rows"/>
        @else
            <p class="text-white">You do not have permission to view this page.</p>
        @endif
    </div>
</x-app-layout>
