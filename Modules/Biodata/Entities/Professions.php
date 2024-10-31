<?php

namespace Modules\Biodata\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professions extends Model
{
    use HasFactory;

    protected $table = 'professions';
    protected $primaryKey = 'id';
    protected $fillable = ['code','name'];
}
