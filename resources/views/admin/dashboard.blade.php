<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl p-6">
                <h1 class="text-2xl font-bold mb-6 text-gray-700">Welcome Admin!</h1>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <a href="{{ route('admin.books') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-6 rounded-lg text-center shadow transition">
                        Manage Books
                    </a>
                    <a href="{{ route('admin.users') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-6 rounded-lg text-center shadow transition">
                        View Users
                    </a>
                    <a href="{{ route('admin.borrowed') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-6 rounded-lg text-center shadow transition">
                        Borrowed Books
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
