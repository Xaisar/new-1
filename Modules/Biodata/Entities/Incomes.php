<?php

namespace Modules\Biodata\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incomes extends Model
{
    use HasFactory;

    protected $table = 'incomes';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
