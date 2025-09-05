<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrow;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function allBooks() {
        $books = Book::all();
        return view('admin.books', compact('books'));
    }

    public function createBook(Request $request) {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'total_copies'=>'required|integer|min:1'
        ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'total_copies' => $request->total_copies,
            'available_copies' => $request->total_copies,
        ]);

        return redirect()->route('admin.books')->with('success', 'Book added successfully');
    }

    public function editBook(Book $book) {
        return view('admin.edit_book', compact('book'));
    }

    public function updateBook(Request $request, Book $book) {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'total_copies'=>'required|integer|min:1'
        ]);

            $borrowedCount = Borrow::where('book_id', $book->id)
                           ->whereNull('returned_at')
                            ->count();
            $newAvailable = $request->total_copies - $borrowedCount;

        $book->update([
            'title'=>$request->title,
            'author'=>$request->author,
            'isbn'=>$request->isbn,
            'description'=>$request->description,
            'total_copies'=>$request->total_copies,
            'available_copies'=>max($newAvailable, 0),
        ]);

        return redirect()->route('admin.books')->with('success','Book updated successfully');
    }

    public function deleteBook(Book $book) {
        $book->delete();
        return redirect()->route('admin.books')->with('success','Book deleted successfully');
    }

    public function allUsers() {
        $users = User::where('is_admin', false)->get();
        return view('admin.users', compact('users'));
    }

    public function viewStudent($id) {
        $student = User::findOrFail($id);
        $borrows = $student->borrows;
        return view('admin.student_details', compact('student','borrows'));
    }

    public function borrowedBooks() {
        $borrows = Borrow::whereNotNull('borrowed_at')->get();
        return view('admin.borrowed', compact('borrows'));
    }

    public function createBookForm() {
        return view('admin.create_book');
}



public function searchStudent(Request $request) {
    $request->validate([
        'student_id' => 'required'
    ]);

    $student = User::where('id', $request->student_id)
                   ->where('is_admin', false)
                    ->first();

    if (!$student) {
        return redirect()->back()->with('error', 'Student not found');
    }

    $borrows = $student->borrows ?? [];
    return view('admin.student_details', compact('student', 'borrows'));

}


public function editProfile() {
    $admin = auth()->user();
    return view('admin.edit_profile', compact('admin'));
}


public function updateProfile(Request $request) {
    $admin = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
        'password' => 'nullable|string|min:8|confirmed'
    ]);

    $admin->name = $request->name;
    $admin->email = $request->email;

    if ($request->password) {
        $admin->password = bcrypt($request->password);
    }

    $admin->save();

    return redirect()->route('admin.dashboard')->with('success','Profile updated successfully');
}

}
