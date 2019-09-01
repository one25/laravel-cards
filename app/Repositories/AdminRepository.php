<?php

namespace App\Repositories;

use App\Models\ {
    Card
};

class AdminRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;


    /**
     * Create a new CardRepository instance.
     *
     * @param  \App\Models\Card $card
     */
    public function __construct(Card $card)
    {
        $this->model = $card;
    }

    /**
     * Store post.
     *
     * @param  \App\Http\Requests\CardRequest $request
     * @return void
     */
    public function store($request)
    {
        $request->merge(['active' => $request->has('active')]);
        
        $card = Card::create($request->all());
    }

    /**
     * Update card.
     *
     * @param  \App\Models\Card  $card
     * @return void
     */
    public function update($request, $card)
    {
        $request->merge(['active' => $request->has('active')]);

        $card->update($request->all());
    }

}
