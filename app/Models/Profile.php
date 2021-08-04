<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'titration', 'cpf', 'rg', 'created_by', 'updated_by'];

    public function users(){
        return $this->belongsTo(User::class);
    }
    
}
