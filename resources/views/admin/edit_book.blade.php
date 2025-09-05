<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Book
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h3 class="text-2xl font-bold mb-6 text-gray-700">Edit Book Details</h3>
            <form action="{{ route('admin.updateBook', $book) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-semibold mb-1">Title</label>
                    <input type="text" name="title" value="{{ $book->title }}" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Author</label>
                    <input type="text" name="author" value="{{ $book->author }}" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">ISBN</label>
                    <input type="text" name="isbn" value="{{ $book->isbn }}" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Description</label>
                    <textarea name="description" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400">{{ $book->description }}</textarea>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Total Copies</label>
                    <input type="number" name="total_copies" value="{{ $book->total_copies }}" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400" min="1" required>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                        Update Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
