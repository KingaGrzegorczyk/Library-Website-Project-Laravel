<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    protected $table = 'library';
    public $timestamps = true;
    protected $fillable = ['id', 'userId', 'bookId', 'expirationDate', 'status', 'created_at', 'updated_at'];
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
