<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard() {
        return view('student.dashboard');
    }

    public function allBooks() {
        $books = Book::all();
        return view('student.books', compact('books'));
    }

    public function borrowBook(Book $book) {
        if($book->available_copies < 1){
            return redirect()->back()->with('error','No copies available');
        }

        Borrow::create([
            'user_id'=>Auth::id(),
            'book_id'=>$book->id,
            'borrowed_at'=>now(),
            'due_at'=>now()->addDays(7),
        ]);

        $book->decrement('available_copies');

        return redirect()->route('student.dashboard')->with('success','Book borrowed successfully');
    }

    public function myBorrowedBooks() {
                    $borrows = Borrow::where('user_id', auth()->id())
                    ->whereNull('returned_at')
                    ->with('book')
                    ->get();

    return view('student.my_borrows', compact('borrows'));
    }

    public function returnBook(Borrow $borrow) {
        if($borrow->returned_at){
            return redirect()->back()->with('error','Book already returned');
        }

        $borrow->update([
            'returned_at'=>now()
        ]);

        $borrow->book->increment('available_copies');

        return redirect()->route('student.my_borrows')->with('success','Book returned successfully');
    }

public function editProfile() {
    $student = auth()->user();
    return view('student.edit_profile', compact('student'));
}

public function updateProfile(Request $request) {
    $student = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $student->id,
        'password' => 'nullable|string|min:8|confirmed'
    ]);

    $student->name = $request->name;
    $student->email = $request->email;

    if ($request->password) {
        $student->password = bcrypt($request->password);
    }

    $student->save();

    return redirect()->route('student.dashboard')->with('success','Profile updated successfully');
}

}
