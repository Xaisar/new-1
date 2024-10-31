<?php

namespace Modules\Alamat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatans';
    protected $primarykey = 'id';
    protected $foreignkeykey = 'kabupatens_id';
    protected $fillable = ['name'];
}
