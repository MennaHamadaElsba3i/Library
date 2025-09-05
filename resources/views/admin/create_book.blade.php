<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Add New Book
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-lg mt-5">
        <form action="{{ route('admin.storeBook') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-medium mb-1">Title</label>
                <input type="text" name="title" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Author</label>
                <input type="text" name="author" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">ISBN</label>
                <input type="text" name="isbn" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Description</label>
                <textarea name="description" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400"></textarea>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Total Copies</label>
                <input type="number" name="total_copies" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400" min="1" required>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition">
                    Add Book
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
