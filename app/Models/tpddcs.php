<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ten class nay nen viet hoa VD: Tpddc
class tpddcs extends Model
{
    use HasFactory;

    protected $table = 'tpddcs';
    protected $fillable = [
      'ddc_name','ddc' 
   ];
}
