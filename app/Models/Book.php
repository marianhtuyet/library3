<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'subtitle',
        'original',
        'img_src',
        'author_ids',
        'symbol_author',
        'translator_ids',
        'publishing_company_id',
        'year_publishing',
        'republishing',
        'page_number',
        'temporary_content',
        'series',
        'ddc_id',
        'theme_id',
        'summary',
        'language_id',
        'isbn_issn',
        'input_date',
        'type_book_id',
        'cost',
        'site_id',
        'status_id',
        'quantity',
    ];
    public function setAuthorAttribute($value)
    {
        $this->attributes['author_ids'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getAuthorAttribute($value)
    {
        return $this->attributes['author_ids'] = json_decode($value);
    }
}
