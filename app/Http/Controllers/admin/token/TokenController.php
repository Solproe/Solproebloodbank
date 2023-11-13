<?php

namespace App\Http\Controllers\admin\token;

use App\Http\Controllers\Controller;
use App\Models\ApiWhatsapp\Token;
use App\Models\Center;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    
    public function index()
    {
        $centers = Center::all();
        $tokens = Token::all();
        return view('admin.tokens.index', compact('tokens', 'centers'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        
    }

    public function edit()
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {

    }
}
