<?php

namespace App\Models;
use App\Models\Exchange;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['company_name', 'symbol', 'exchange_id'];

    public function exchange() {
        return $this->belongsTo(Exchange::class);
    }
}
