<?php

namespace App\Http\Controllers\Back;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\CardRequest,    
    Repositories\CardRepository,
    Repositories\AdminRepository,    
    Traits\TraitList,
    Models\Card
};

class AdminController extends Controller
{
    // Trait - build parameters with request for selected table
    use TraitList;

    /**
     * The namespace.
     *
     * @var string
     */
    protected $namespace; //!!!layout

    /**
     * The CardRepository instance.
     *
     * @var \App\Repositories\CardRepository
     */
    protected $cardRepository;

    /**
     * The AdminRepository instance.
     *
     * @var \App\Repositories\AdminRepository
     */
    protected $adminRepository;    

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
     * Create a new AdminController instance.
     *
     * @param  \App\Repositories\CardRepository $cardRepository    
     * @param  \App\Repositories\AdminRepository $adminRepository
     * @return void
    */
    public function __construct(CardRepository $cardRepository, AdminRepository $adminRepository)
    {
        $this->namespace = 'back'; //!!!layout
        $this->cardRepository = $cardRepository;   
        $this->adminRepository = $adminRepository;          
        $this->nbrPages = config('app.nbrPages.back.cards');
        $this->table = 'cards';

        $this->middleware('admin')->only('store');
    }

     /**
     * Show the form for creating a new card.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.cards.create');
    }

    /**
     * Store a newly created card in storage.
     *
     * @param  \App\Http\Requests\CardRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    {
        $this->adminRepository->store($request);

        return redirect(route('cards.create'))->with('card-ok', __('The card has been successfully created'));
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
       return view('back.cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CardRequest $request
     * @param  \App\Models\Card $card
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, Card $card)
    {
        $this->authorize('manage', $card);

        $this->adminRepository->update($request, $card);

        return redirect(route('dashboard'))->with('card-updated', __('The card has been successfully updated'));
     } 

    /**
     * Remove the card from storage.
     *
     * @param  \App\Models\Card $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $this->authorize('manage', $card);

        $card->delete ();

        return response ()->json ();
    }                

}
