<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Get Cities by Province from API.
     */

    public function getCitiesByProvince($provinceId)
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/' . $provinceId . '.json');
        $cities = json_decode($response, true);
        return response()->json($cities);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil city dari API
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
        $provincies = json_decode($response, true);

        // tampilin halaman register
        return view('auth.register', compact('provincies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tim'  => 'required|unique:accounts',
            'email'     => 'required|email|unique:accounts',
            'password'  => 'required|string|min:8',
            'role'      => 'required',
            'asal_sekolah' => 'required',
            'provinsi'  => 'required',
            'kabupaten' => 'required'
        ], [
            'nama_tim.required'     => 'Nama tim harus diisi',
            'nama_tim.unique'       => 'Nama tim telah digunakan',
            'email.required'        => 'Email harus diisi',
            'email.unique'          => 'Email telah digunakan',
            'email.email'           => 'Format email harus benar',
            'password.required'     => 'Password harus diisi',
            'password.min'          => 'Password berisi minimal 8 karakter',
            'role.required'         => 'Jenis lomba harus diisi',
            'asal_sekolah.required' => 'Nama sekolah harus diisi',
            'provinsi.required'     => 'Provinsi harus diisi',
            'kabupaten.required'    => 'Kota/Kabupaten harus diisi',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $account = Account::create($validatedData);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
