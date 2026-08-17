<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Сохранить нового пользователя.
     */
    public function store(Request $request): RedirectResponse
    {
        $name = $request->input('name');

        // Сохранить пользователя

        return redirect('/users');
    }

    public function update(string $id)
    {

    }
}



