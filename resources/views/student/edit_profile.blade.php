<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800 tracking-wide">
            ✏️ Edit Student Profile
        </h2>
    </x-slot>

    <div class="p-8 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl max-w-2xl mx-auto mt-5">
        <form action="{{ route('student.profile.update') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
                <input type="text" name="name" value="{{ $student->name }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 p-3" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ $student->email }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 p-3" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password
                    <span class="text-gray-500 text-xs">(leave blank to keep current)</span>
                </label>
                <input type="password" name="password"
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 p-3">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 p-3">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition duration-200">
                    💾 Update Profile
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
