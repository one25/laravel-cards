<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait TraitList
{
    /**
     * Display a listing of the cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cards = $this->cardRepository->getActiveOrderByDate($this->getParameters($request), $this->nbrPages);
        $links = $cards->appends ($this->getParameters($request))->links ('front.pagination');
        $layout = $this->namespace;
        // Ajax response
        if ($request->ajax ()) {
            return response ()->json ([
                'table' => view ("front.brick-standard", ['cards' => $cards, 'layout' => $layout])->render (),
                'pagination' => $links->toHtml (),
            ]);
        }

        return view('front.index', compact('cards', 'links', 'layout'));
    }

     /**
     * Get parameters.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function getParameters($request)
    {
        // Default parameters for selected table
        $parameters = config("parameters.$this->table");

        // Build parameters with request for selected table
        foreach ($parameters as $parameter => &$value) {
            if (isset($request->$parameter)) {
                $value = $request->$parameter;
            }
        }

        return $parameters;
    }
}