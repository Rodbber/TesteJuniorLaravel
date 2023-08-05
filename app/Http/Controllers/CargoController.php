<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargo = Cargo::orderByDesc('id')->get();
        return response()->json($cargo);
    }
}
