<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(Client::get());
    }

    public function store(Request $request)
    {
        Client::create($request->input());
        return response()->json([], 201);
    }

    public function update(Request $request, int $id)
    {
        Client::findOrFail($id)->update($request->input());
        return response()->json([], 204);
    }

    public function destroy(int $id)
    {
        Client::findOrFail($id)->delete();
        return response()->json([], 204);
    }
}
