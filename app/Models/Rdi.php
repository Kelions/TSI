<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proyect;

class Rdi extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name_proyect', 'name_sender', 'name_recipient', 'subject',
        'specialization','content','status'
    ];

    public function proyect()
    {
        return $this->belongsTo('App\Models\Proyect'); // assuming this is the path for User model
    }


}
