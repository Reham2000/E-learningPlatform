<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    function getCourseById($id)
    {
        return Course::find($id);
    }
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_title',
        'course_brief',
        'course_price',
        'category_id',
        'admin_id',
        
    ];
}
