<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800 tracking-wide">
            🎓 Student Dashboard
        </h2>
    </x-slot>

    <div class="p-8 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <a href="{{ route('student.books') }}"
               class="flex flex-col items-center justify-center p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-200 hover:scale-105">
                <div class="text-blue-500 text-4xl mb-2">📚</div>
                <h3 class="text-lg font-semibold text-gray-800">View All Books</h3>
                <p class="text-sm text-gray-500">Browse and borrow from the library</p>
            </a>

            <a href="{{ route('student.my_borrows') }}"
               class="flex flex-col items-center justify-center p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-200 hover:scale-105">
                <div class="text-green-500 text-4xl mb-2">📖</div>
                <h3 class="text-lg font-semibold text-gray-800">My Borrowed Books</h3>
                <p class="text-sm text-gray-500">Check your borrowed books</p>
            </a>

            <form action="{{ route('logout') }}" method="POST"
                  class="flex flex-col items-center justify-center p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-200 hover:scale-105">
                @csrf
                <button type="submit" class="flex flex-col items-center">
                    <div class="text-red-500 text-4xl mb-2">🚪</div>
                    <h3 class="text-lg font-semibold text-gray-800">Logout</h3>
                    <p class="text-sm text-gray-500">End your session safely</p>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
