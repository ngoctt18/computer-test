<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Apriori extends Model
{
    protected $table = 'apriori';
    protected $fillable = [
        'antecedent','consequent','support','confidence'
    ];

}