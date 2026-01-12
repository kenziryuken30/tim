<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Borrowing;   

class Returning extends Model
{
    use HasFactory;

    protected $table = 'returns';
    protected $fillable = ['borrowing_id','tanggal_kembali'];

    public function borrowing() {
        return $this->belongsTo(Borrowing::class);
    }
}

