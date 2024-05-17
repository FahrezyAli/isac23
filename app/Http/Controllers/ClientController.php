<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class ClientController extends Controller
{
    public function confirmed()
    {
        return view('client.dashboard.dashboard-confirm');
    }

    public function payment()
    {
        $status = Auth::user()->status_bayar;

        switch ($status) {
            case "empty":
                return view('client.dashboard.dashboard-payment');
            case "unverified":
                return view('client.dashboard.dashboard-pending');
            case "verified":
                return view('client.dashboard.dashboard-confirm');
            case "failed":
                return view('client.dashboard.dashboard-failed');
            default:
                return view('client.dashboard.dashboard-payment');
        }
    }

    public function store_payment(Request $request, Account $account)
    {

        $validatedData = $request->validate([
            'bukti_bayar'   => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'bukti_bayar.required' => 'Kolom ini harus diisi'
        ]);

        $validatedData['status_bayar'] = 'unverified';

        $bayarName = Str::uuid() . '.' . $request->bukti_bayar->getClientOriginalExtension();
        $request->bukti_bayar->storeAs('public/images/bukti-bayar/', $bayarName);
        $validatedData['bukti_bayar'] = asset('storage/images/bukti-bayar') . '/' . $bayarName;

        $account->update($validatedData);

        return redirect()->route('profile');
    }

    public function pending()
    {
        return view('client.dashboard.dashboard-pending');
    }

    public function profile()
    {
        $account = Auth::user();
        return view('client.dashboard.dashboard-profile', compact('account'));
    }

    public function tambah_anggota(string $number)
    {
        // $student = Student::where('account_id', Auth::user()->id)->get()->count();
        // dd($student);

        if ($number > 2) {
            return redirect('/tambah-anggota/2');
        }

        if (Auth::user() && Auth::user()->role == 'uiux' && Auth::user()->students->count() == 1 && $number != 2) {
            return redirect('/tambah-anggota/2');
        }

        return view('client.dashboard.reg_dash_ang', [
            'number' => $number,
            'user' => Auth::user()
        ]);
    }

    public function redirect_tambah_anggota()
    {
        if (Auth::user() && Auth::user()->role == 'uiux' && Auth::user()->students->count() == 1) {
            return redirect('/tambah-anggota/2');
        } else {
            return redirect('/tambah-anggota/1');
        }
    }

    public function store_anggota(Request $request)
    {
        // $a = asset('storage/app/images');
        // dd($a);
        $validatedData = $request->validate([
            'nama'          => 'required',
            'telp'          => 'required',
            'status'        => 'required',
            'tgl_lahir'     => 'required',
            'bukti_siswa'   => 'required|image|mimes:jpeg,png,jpg',
            'foto_profil'   => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'nama.required' => 'Nama harus diisi',
            'telp.required' => 'Nomer whatsapp harus diisi',
            'status.required' => 'Status harus diisi',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'bukti_siswa.required' => 'Bukti siswa harus diisi',
            'bukti_siswa.image' => 'Bukti siswa harus berupa gambar',
            'foto_profil.required' => 'Foto profil harus diisi',
            'foto_profil.image' => 'Foto profil harus berupa gambar',
        ]);

        // Rubah nama file
        $buktiName = Str::uuid() . '.' . $request->bukti_siswa->getClientOriginalExtension();
        // dd($buktiName);
        $profilName = Str::uuid() . '.' . $request->foto_profil->getClientOriginalExtension();
        $request->bukti_siswa->storeAs('public/images/bukti-siswa/', $buktiName);
        $request->foto_profil->storeAs('public/images/foto-profil/', $profilName);

        // Masukkan path ke dalam db
        $validatedData['bukti_siswa'] = asset('storage/images/bukti-siswa') . '/' . $buktiName;
        $validatedData['foto_profil'] = asset('storage/images/foto-profil') . '/' . $profilName;

        $validatedData['account_id'] = Auth::user()->id;

        $student = Student::create($validatedData);

        $students = Student::where('account_id', Auth::user()->id)->get();
        if (Auth::user()->role == 'uiux') {

            if ($students->count() < 2) {
                return redirect()->route('tambah-anggota', ['number' => 2]);
            }
        };

        return redirect()->route('profile');
    }

    public function edit_anggota(Student $student)
    {
        return view('client.dashboard.edit_dash_ang', compact('student'));
    }

    public function update_anggota(Request $request, Student $student)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nama'          => 'required',
            'telp'          => 'required',
            'status'        => 'required',
            'tgl_lahir'     => 'required',
            'bukti_siswa'   => 'image|mimes:jpeg,png,jpg',
            'foto_profil'   => 'image|mimes:jpeg,png,jpg',
        ], [
            'nama.required' => 'Nama harus diisi',
            'telp.required' => 'Nomer whatsapp harus diisi',
            'status.required' => 'Status harus diisi',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'bukti_siswa.required' => 'Bukti siswa harus diisi',
            'bukti_siswa.image' => 'Bukti siswa harus berupa gambar',
            'foto_profil.required' => 'Foto profil harus diisi',
            'foto_profil.image' => 'Foto profil harus berupa gambar',
        ]);

        if (isset($validatedData['bukti_siswa'])) {
            $validatedData['foto_profil'] = $student->foto_profil;
        }

        if (isset($validatedData['bukti_siswa'])) {
            $validatedData['bukti_siswa'] = $student->bukti_siswa;
        }

        // Rubah nama file
        if (isset($request->foto_profil)) {
            $profilName = Str::uuid() . '.' . $request->foto_profil->getClientOriginalExtension();
            $request->foto_profil->storeAs('public/images/foto-profil/', $profilName);
            $validatedData['foto_profil'] = asset('storage/images/foto-profil') . '/' . $profilName;
        }

        if (isset($request->bukti_siswa)) {
            $buktiName = Str::uuid() . '.' . $request->bukti_siswa->getClientOriginalExtension();
            $request->bukti_siswa->storeAs('public/images/bukti-siswa/', $buktiName);
            $validatedData['bukti_siswa'] = asset('storage/images/bukti-siswa') . '/' . $buktiName;
        }

        $student->update($validatedData);

        return redirect()->route('profile');
    }
}
