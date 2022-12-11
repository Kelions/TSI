<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rdi;
  
class Proyect extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'detail'
    ];

    public function rdis()
    {
        return $this->hasMany('App\Models\Rdi'); // assuming this is the path for Log model
    }

}