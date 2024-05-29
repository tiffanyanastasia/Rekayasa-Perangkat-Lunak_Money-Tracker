<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = ['jumlah', 'Kategori_id', 'user', 'rekening'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'Kategori_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user');
    }
    public function rekening(){
        return $this->belongsTo(Rekening::class,'rekening');
    }
    
    
}
