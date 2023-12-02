<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'admin_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'brief',
        'qualification',
        'image',
        'num_of_published_couress',
        'blocked',

    ];
}
