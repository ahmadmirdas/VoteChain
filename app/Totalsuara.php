<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Totalsuara extends Model
{
    protected $table = 'totalsuara';
    protected $guarded = [];

    public function kandidat()
    {
    	return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }
}
