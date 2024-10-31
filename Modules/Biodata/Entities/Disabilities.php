<?php

namespace Modules\Biodata\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disabilities extends Model
{
    use HasFactory;

    protected $table = 'disabilities';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
