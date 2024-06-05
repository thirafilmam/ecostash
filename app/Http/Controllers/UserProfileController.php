<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('penggunas.profil.profil');
    }

    public function edit()
    {
        return view('penggunas.profil.profil');
    }

    public function update(Request $request)
    {

    }
}
