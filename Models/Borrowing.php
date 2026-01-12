<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Item;
use App\Models\Returning;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','item_id','jumlah','tanggal_pinjam','status'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function returns() {
        return $this->hasMany(Returning::class, 'borrowing_id');
    }
}


