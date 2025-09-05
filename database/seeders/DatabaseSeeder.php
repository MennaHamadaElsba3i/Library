<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🟢 Admin User
        User::create([
            'name' => 'Library Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // 🟢 Student User
        User::create([
            'name' => 'Test Student',
            'email' => 'student@example.com',
            'password' => bcrypt('123456'),
            'role' => 'student',
        ]);

        // 🟢 Example Books
        Book::create([
            'title' => 'Clean Code',
            'author' => 'Robert C. Martin',
            'published_year' => 2008,
            'copies' => 5,
            'description' => 'A Handbook of Agile Software Craftsmanship.',
        ]);

        Book::create([
            'title' => 'The Pragmatic Programmer',
            'author' => 'Andrew Hunt, David Thomas',
            'published_year' => 1999,
            'copies' => 3,
            'description' => 'Your Journey to Mastery.',
        ]);

        Book::create([
            'title' => 'Design Patterns',
            'author' => 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides',
            'published_year' => 1994,
            'copies' => 2,
            'description' => 'Elements of Reusable Object-Oriented Software.',
        ]);
    }
}
