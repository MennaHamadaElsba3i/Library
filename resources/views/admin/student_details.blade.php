<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Student Details
        </h2>
    </x-slot>

    <div class="p-6 space-y-8">
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Student Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                <div><span class="font-semibold">ID:</span> {{ $student->id }}</div>
                <div><span class="font-semibold">Student ID:</span> {{ $student->student_id }}</div>
                <div><span class="font-semibold">Name:</span> {{ $student->name }}</div>
                <div><span class="font-semibold">Email:</span> {{ $student->email }}</div>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Borrow History</h3>
            @if($borrows && count($borrows) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($borrows as $borrow)
                        <div class="bg-gradient-to-tr from-white to-gray-50 rounded-3xl shadow-lg p-5 hover:shadow-2xl transition transform hover:-translate-y-1">
                            <h4 class="text-lg font-bold text-gray-800 mb-2">{{ $borrow->book->title ?? 'Unknown Book' }}</h4>
                            <p class="text-gray-600 mb-1"><span class="font-semibold">Borrowed:</span> {{ $borrow->created_at->format('Y-m-d') }}</p>
                            <p class="mb-2">
                                <span class="font-semibold">Returned:</span>
                                @if($borrow->returned_at)
                                    <span class="text-green-600">{{ $borrow->returned_at->format('Y-m-d') }}</span>
                                @else
                                    <span class="text-red-500 font-semibold">Not Returned</span>
                                @endif
                            </p>
                            <div class="h-1 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full @if($borrow->returned_at) bg-green-500 @else bg-red-500 @endif w-full transition-all"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-6">No borrow history for this student.</p>
            @endif
        </div>
    </div>
</x-app-layout>
