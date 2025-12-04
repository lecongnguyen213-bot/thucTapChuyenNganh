<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
final class Category extends Model
{
 
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'name',
        'image',
        'status'
    ];
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
