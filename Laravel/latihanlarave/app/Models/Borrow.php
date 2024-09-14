<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $table = 'borrows';
    protected $fillable = ['book_id', 'user_id','tanggal_peminjaman','tanggal_pengembalian'];
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
