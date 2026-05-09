<?php

namespace App\Http\Controllers;
use App\Models\Profile;

class BiodataController extends Controller
{
    public function index()
    {
        // Ambil data dari model Profile
        $data = Profile::first();
        return view('about', compact('data'));
    }
}
