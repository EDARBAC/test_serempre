<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $primaryKey = 'cod';

    protected $table = 'cities';

    protected $fillable = [
        'cod',
        'name'
    ];

    protected $casts = [
        'cod' => 'integer'
    ];

    public function clients()
    {
        $this->hasMany(Client::class);
    }

    public function syncDelete(){
        
        $countClients = Client::where('city',$this->cod)->count();

        if($countClients > 0) return response(['status' => false, 'message' => 'The city cannot be removed']);

        return ['status' => $this->delete()];
    }
}
