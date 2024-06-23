<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    use HasFactory;
    protected $fillable = [
        'user_id',
        'office_id',
        'join_date',
        'phone',
        'salary'
    ];
    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
