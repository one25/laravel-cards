<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller,
    Repositories\CardRepository,
    Traits\TraitList
};

class CardController extends Controller
{
    // Trait - build parameters with request for selected table
    use TraitList;

    /**
     * The namespace.
     *
     * @var string
     */
    protected $namespace;

    /**
     * The CardRepository instance.
     *
     * @var \App\Repositories\CardRepository
     */
    protected $cardRepository;

    /**
     * The pagination number.
     *
     * @var int
     */
    protected $nbrPages;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table;

    /**
     * Create a new CardController instance.
     *
     * @param  \App\Repositories\CardRepository $cardRepository
     * @return void
    */
    public function __construct(CardRepository $cardRepository)
    {
        $this->namespace = 'front'; 
        $this->cardRepository = $cardRepository;
        $this->nbrPages = config('app.nbrPages.front.cards');
        $this->table = 'cards';
    }

}
