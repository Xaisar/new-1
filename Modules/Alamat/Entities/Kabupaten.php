<?php

namespace Modules\Alamat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupatens';
    protected $primarykey = 'id';
    protected $fillable = ['name'];
}
