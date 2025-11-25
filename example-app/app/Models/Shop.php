<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
final class shop extends Model
{
 
    protected $table = 'shops';
    protected $fillable = [
        'id',
        'name',
        'address',
        'image'
    ];
}
