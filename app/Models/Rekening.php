<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['nama_rekening', 'saldo', 'user'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
