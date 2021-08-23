<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'receptor_id'];

    //RELACION 1 : MUCHOS INVERSA
    public function sender()
    {
        return $this->belongsTo(User::class);
    }

    public function receptor()
    {
        return $this->belongsTo(User::class);
    }
}
