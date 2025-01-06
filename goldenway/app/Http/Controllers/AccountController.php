<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function manage()
{
    // Logic for managing the account
    return view('account.manage');
}

}
