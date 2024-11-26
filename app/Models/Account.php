<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'total',
    ];

    public function formatedTotal()
    {
        return number_format(($this->total*0.01), 2, ',', '.');
    }
}
