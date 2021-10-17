<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'cod';

    protected $table = 'client';

    protected $fillable = [
        'name',
        'city',
        'user_id'
    ];

    protected $casts = [
        'cod' => 'integer'
    ];

    public function cityy(){
        return $this->belongsTo(City::class,'city','cod');
    }

    public function user()
    {
        $this->hasOne(User::class);
    }
}
