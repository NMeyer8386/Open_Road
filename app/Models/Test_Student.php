<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_Student extends Model
{
    protected $table = 'students'; //returns table not found if this is not here
    use HasFactory;
}
