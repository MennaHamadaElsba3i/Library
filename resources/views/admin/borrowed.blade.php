<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Borrowed Books
        </h2>
    </x-slot>

    <div class="p-6 bg-white rounded-2xl shadow-lg">
        @if($borrows->isEmpty())
            <p class="text-center text-gray-500 py-10">No borrowed books found.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($borrows as $borrow)
                    <div class="bg-gray-50 rounded-xl shadow-md p-4 hover:shadow-xl transition">
                        <h3 class="text-lg font-bold mb-2">Borrow ID: {{ $borrow->id }}</h3>
                        <p class="text-gray-700 mb-1"><strong>Student:</strong> {{ $borrow->user->name ?? 'Unknown' }}</p>
                        <p class="text-gray-700 mb-1"><strong>Book:</strong> {{ $borrow->book->title ?? 'Unknown' }}</p>
                        <p class="text-gray-700 mb-1"><strong>Borrowed At:</strong> {{ \Carbon\Carbon::parse($borrow->borrowed_at)->format('Y-m-d') }}</p>
                        <p class="text-gray-700 mb-1"><strong>Due At:</strong> {{ \Carbon\Carbon::parse($borrow->due_at)->format('Y-m-d') }}</p>
                        <p class="text-gray-700 mb-3"><strong>Returned At:</strong> {{ $borrow->returned_at ? \Carbon\Carbon::parse($borrow->returned_at)->format('Y-m-d') : 'Not Returned' }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
