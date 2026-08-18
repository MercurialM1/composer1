<?php

namespace App\Http\Controllers;

use App\Models\User;

class PageController extends Controller
{
    public function showDataTable()
    {
        $users = User::all();

        return view('admin.datatable', compact('users'));
    }
}
