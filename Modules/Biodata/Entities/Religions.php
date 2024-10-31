<?php

namespace Modules\Biodata\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Religions extends Model
{
    use HasFactory;

    protected $table = 'religions';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
