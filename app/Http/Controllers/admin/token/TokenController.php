<?php

namespace App\Http\Controllers\admin\token;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\Center;
use Egulias\EmailValidator\Warning\TLD;
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

        $token = new Token();
        if (isset($request->type) and $request->type == "center") {
            $token->name = $request->COD_CENTER;
            $token->token = $request->token;
        }

        $token->save();

        return redirect()->route('admin.token.index');
    }

    public function edit()
    {
    }

    public function show($id)
    {
        dd($id);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $token = Token::where('id', $id)->first();
        $token->delete();
        return redirect()->route('admin.token.index');
    }
}
