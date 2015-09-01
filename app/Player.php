<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'rego_start',
        'rego_end',
        'email',
        'team'
    ];

    protected $dates = [
        'rego_start',
        'rego_end'
    ];

    public function getRegoStart() {
        $this->attributes['rego_start']->format('d/m/Y');
    }

    public function getRegoEnd() {
        $this->attributes['rego_end']->format('d/m/Y');
    }

    public function setRegoStartAttribute($date) {

        $this->attributes['rego_start'] = Carbon::parse($date);

    }

    public function setRegoEndAttribute($date) {

        $this->attributes['rego_end'] = Carbon::parse($date);

    }

    public function scopeTeam($query)
    {
        $query->where('sold', '=', true);
    }


}
