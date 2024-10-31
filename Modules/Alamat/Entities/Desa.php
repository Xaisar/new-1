<?php

namespace Modules\Alamat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';
    protected $primarykey = 'id';
    protected $foreignkeykey = 'kecamatans_id';
    protected $fillable = ['name'];
    
}
