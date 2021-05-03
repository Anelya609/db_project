<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjaxCrud extends Model
{
    use HasFactory;
    protected $table='data';
    protected $fillable = [
        'id','name', 'age', 'photo', 'nationality','potential', 'club', 'club_logo','wage'
       ];
}
