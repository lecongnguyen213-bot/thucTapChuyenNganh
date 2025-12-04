<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
final class Product extends Model
{
 
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'title',
        'image',
        'price',
        'description',
        'status',
        'category_id',
        'content',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
