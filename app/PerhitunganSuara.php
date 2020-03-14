<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerhitunganSuara extends Model
{
    protected $table = 'perhitungan_suara';
    protected $guarded = [];

    public function kandidat()
    {
    	return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }

    public function tps()
    {
    	return $this->belongsTo(Tps::class, 'tps_id', 'id');
    }
}
