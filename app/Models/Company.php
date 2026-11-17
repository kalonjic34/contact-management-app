<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name','email','phone','address','company_id'];
    
    function contacts(){
        return $this->hasMany(Contact::class);
    }
}