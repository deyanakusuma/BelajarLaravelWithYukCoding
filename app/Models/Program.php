<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = []; //boleh diisi semua, kalau pakai fillable hanya yang di [] yang bisa diisi

    protected $hidden = ['created_at', 'updated_at']; //misal pakai endpoint api

    public function edulevel()
    {
        return $this->belongsTo('App\Models\Edulavel');
    }
}
