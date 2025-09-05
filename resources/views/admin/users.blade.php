<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            All Students
        </h2>
    </x-slot>

    <div class="p-6 bg-white rounded-2xl shadow-lg">
        <div class="mb-6">
            <form action="{{ route('admin.student_details') }}" method="GET" class="flex items-center space-x-2">
                <input type="text" name="student_id" placeholder="Enter Student ID"
                    class="border border-gray-300 rounded-lg p-2 w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition">
                     Search
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse rounded-lg overflow-hidden shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left border-b">ID</th>
                        <th class="px-4 py-2 text-left border-b">Name</th>
                        <th class="px-4 py-2 text-left border-b">Email</th>
                        <th class="px-4 py-2 text-left border-b">Student ID</th>
                        <th class="px-4 py-2 text-center border-b">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-700">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2 border-b">{{ $user->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->student_id }}</td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="{{ route('admin.student.view', ['id' => $user->id]) }}"
                                class="inline-block px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded-lg shadow transition">
                                 View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @if($users->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">
                            No students found.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
