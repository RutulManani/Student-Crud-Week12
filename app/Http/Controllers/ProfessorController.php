<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::with('course')->get();
        return view('professors.index', compact('professors'));
    }
}