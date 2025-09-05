<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800 tracking-wide">
            📚 All Books
        </h2>
    </x-slot>

    <div class="p-8 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Author</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Available Copies</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($books as $book)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-gray-700 font-medium">{{ $book->id }}</td>
                        <td class="px-6 py-4 text-gray-900 font-semibold">{{ $book->title }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $book->author }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-sm font-medium
                                {{ $book->available_copies > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $book->available_copies }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($book->available_copies > 0)
                            <form action="{{ route('student.borrow', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 bg-gradient-to-r from-green-400 to-green-600 text-white rounded-lg shadow hover:scale-105 transition-transform duration-200">
                                    Borrow
                                </button>
                            </form>
                            @else
                            <span class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg text-sm font-medium shadow">
                                Not Available
                            </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
