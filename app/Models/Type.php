<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

    public $timestamps = false;

    /**
     * One to Many !right relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function card()
    {
        return $this->hasMany(Card::class); 
    }

}
