<?php

namespace App\Models;

use App\Scopes\BuyerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends User
{
    use HasFactory;

//    protected function bootIfNotBooted()
//    {
//        parent::boot();
//        static::addGlobalScope(new BuyerScope());
//    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
