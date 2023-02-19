<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $dateFormat = 'Y-m-d H:i:s T';
    protected $table = "boards";
}
