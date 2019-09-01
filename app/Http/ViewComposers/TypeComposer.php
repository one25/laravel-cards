<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Type;

class TypeComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('types', Type::select('id', 'type')->get());
    }
}
