<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800 tracking-wide">
            📖 My Borrowed Books
        </h2>
    </x-slot>

    <div class="p-8 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl">
        @if($borrows->isEmpty())
            <div class="text-center py-12">
                <div class="text-5xl mb-4">📚</div>
                <p class="text-gray-600 text-lg font-medium">You have not borrowed any books yet.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Book</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Borrowed At</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Due At</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Returned At</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($borrows as $borrow)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 text-gray-900 font-medium">
                                {{ $borrow->book->title }}
                            </td>

                            <td class="px-6 py-4 text-gray-700">
                                {{ \Carbon\Carbon::parse($borrow->borrowed_at)->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-sm font-medium
                                    {{ \Carbon\Carbon::parse($borrow->due_at)->isPast() && !$borrow->returned_at ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                    {{ \Carbon\Carbon::parse($borrow->due_at)->format('d M Y') }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                @if($borrow->returned_at)
                                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-700">
                                        {{ \Carbon\Carbon::parse($borrow->returned_at)->format('d M Y') }}
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-700">
                                        Not Returned
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-center">
                                @if(!$borrow->returned_at)
                                <form action="{{ route('student.return', $borrow) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-4 py-2 bg-gradient-to-r from-red-400 to-red-600 text-white rounded-lg shadow hover:scale-105 transition-transform duration-200">
                                        Return
                                    </button>
                                </form>
                                @else
                                    <span class="text-gray-400 italic">✔ Returned</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>

