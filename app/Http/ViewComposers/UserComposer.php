<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\User;

class UserComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('users', User::select('id', 'name')->where('name', '<>', 'admin')->get());
    }
}
