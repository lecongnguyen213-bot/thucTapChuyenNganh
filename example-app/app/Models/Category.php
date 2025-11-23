<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
final class Category extends Model
{
 
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'name'
    ];
}
