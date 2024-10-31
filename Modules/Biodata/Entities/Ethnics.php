<?php

namespace Modules\Biodata\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ethnics extends Model
{
    use HasFactory;

    protected $table = 'ethnics';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
