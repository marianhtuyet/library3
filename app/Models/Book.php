<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'original',
        'temporary_content',
        'type_book_id',
        'language_id',
        'ddc_id',
        'author_id',
        'chapter',
        'summary',
        'series',
        'publishing_company_id',
        'republishing',
        'year_publishing',
        'page_number',
        'input_date',
        'cost',
        'status_id'
    ];
}
