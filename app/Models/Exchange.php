<?php

namespace App\Models;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $fillable = ['name','acronym','mic','operating_mic','website','city','country_code','exchange_status','is_selected'];
    public function stocks() {
        return $this->hasMany(Stock::class);
    }
}
