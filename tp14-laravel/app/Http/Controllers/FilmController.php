<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    private $api;

    public function __construct()
    {
        $this->api = env('API_BASE_URL') . '/films';
    }

    public function index()
    {
        $films = Http::get($this->api)->json();
        return view('films.index', compact('films'));
    }

    public function store(Request $request)
    {
        Http::post($this->api, $request->all());
        return redirect()->route('films.index');
    }

    public function edit($id)
    {
        $film = Http::get("$this->api/$id")->json();
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, $id)
    {
        Http::put("$this->api/$id", $request->all());
        return redirect()->route('films.index');
    }

    public function destroy($id)
    {
        Http::delete("$this->api/$id");
        return redirect()->route('films.index');
    }
}
