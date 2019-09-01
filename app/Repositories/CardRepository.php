<?php

namespace App\Repositories;

use App\Models\ {
    Card
};

class CardRepository
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
     * Create a query for Card.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function queryActiveOrderByDate($parameters)
    {
        return $this->model
            ->select('id', 'user_id', 'number', 'type_id')
            ->whereHas('user', function ($q) use ($parameters) {  
                $q->where('name', 'like', '%' . $parameters['searchname'] . '%');
            })            
            ->orderBy ($parameters['order'], $parameters['direction']);
    }

    /**
     * Get active cards collection paginated.
     *
     * @param  int  $nbrPages
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getActiveOrderByDate($parameters, $nbrPages)
    {
        return $this->queryActiveOrderByDate($parameters)->paginate($nbrPages);        
    }

}
