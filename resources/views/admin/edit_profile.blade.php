<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Admin Profile
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h3 class="text-2xl font-bold mb-6 text-gray-700">Update Profile</h3>
            <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-semibold mb-1">Name</label>
                    <input type="text" name="name" value="{{ $admin->name }}" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Email</label>
                    <input type="email" name="email" value="{{ $admin->email }}" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Password (leave blank to keep current)</label>
                    <input type="password" name="password" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="border rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
