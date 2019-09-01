<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model {

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
         'user_id', 'number', 'type_id', 'active'
    ];

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
