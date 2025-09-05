<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Manage Books
        </h2>
    </x-slot>

    <div class="p-6 bg-white rounded-2xl shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('admin.createBook') }}"
                class="px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition">
                Add New Book
            </a>
        </div>

        @if($books->isEmpty())
            <p class="text-center text-gray-500 py-10">No books available.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($books as $book)
                    <div class="bg-gray-50 rounded-xl shadow-md p-4 hover:shadow-xl transition relative">
                        <h3 class="text-lg font-bold mb-2">{{ $book->title }}</h3>
                        <p class="text-gray-700 mb-1"><strong>Author:</strong> {{ $book->author }}</p>
                        <p class="text-gray-700 mb-3"><strong>Available Copies:</strong> {{ $book->total_copies }}</p>
                        <div class="flex justify-between">
                            <a href="{{ route('admin.editBook', $book) }}"
                                class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition text-sm">
                                Edit
                            </a>
                            <form action="{{ route('admin.deleteBook', $book) }}"
                                method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition text-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
