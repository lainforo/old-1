<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = "threads";

    protected $fillable = ["subject", "body", "board"];
}