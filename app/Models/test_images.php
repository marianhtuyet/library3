<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test_images extends Model
{
    use HasFactory;
    protected $fillable = ['img_src', 'img_alt', 'author_id'];
}
