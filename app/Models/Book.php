<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Book extends Model
// {
//     use HasFactory;

//     public function borrows() {
//         return $this->hasMany(Borrow::class);
//     }
// }
class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'published_year',
        'copies',
        'description',
    ];
}
