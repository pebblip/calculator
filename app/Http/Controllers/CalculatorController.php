<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use pebblip\domain\EnvironmentRepository;

class CalculatorController extends Controller
{
    public function index(Request $request, EnvironmentRepository $environmentRepository) {
        $environmentRepository->get()->clear();
        return view('calculator');
    }

}
