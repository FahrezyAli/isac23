<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SoalController extends Controller
{
    // List Semua Soal
    public function list_soal($babak)
    {
        $soals = Soal::where('babak', $babak)->paginate(10);

        return view(
            'admin.soal.list-soal',
            compact(['soals', 'babak'])
        );
    }

    // Add Pilgan
    public function add_pilgan($babak)
    {
        return view(
            'admin.soal.add-pilgan',
            compact('babak')
        );
    }

    // Create Pilgan
    public function create_pilgan($babak, Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'soal' => 'required|unique:soals,soal',
            'gambar_soal' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_1' => 'required',
            'gambar_1' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_2' => 'required',
            'gambar_2' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_3' => 'required',
            'gambar_3' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_4' => 'required',
            'gambar_4' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_5' => 'required',
            'gambar_5' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'benar' => 'required',
            'nilai' => 'required'
        ], [
            'benar.required' => 'Pilihan yang benar wajib diisi'
        ]);
        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek gambar pada soal
        $gambar_soal = null;
        if ($request->gambar_soal) {
            $gambar_soal = Str::random(35) . '.' . $request->gambar_soal->extension();
            $request->gambar_soal->storeAs('public/gambar_soal', $gambar_soal);
        }

        // Bikin soal
        Soal::create([
            'soal' => $request->soal,
            'gambar_soal' => $gambar_soal,
            'jawaban' => $request->benar,
            'nilai' => $request->nilai,
            'babak' => $babak
        ]);

        // Bikin Jawaban
        $id_soal = Soal::latest()->first()->id;
        for ($i = 0; $i <= 4; $i++) {
            $option = 'option_';
            $gambar = 'gambar_';
            $gambar .= strval($i + 1);
            $option .= strval($i + 1);
            $gambar_option = $request->$gambar;
            if ($request->$gambar) {
                $gambar_option = Str::random(35) . '.' . $request->$gambar->extension();
                $request->$gambar->storeAs('public/gambar_option', $gambar_option);
            }
            if ($i + 1 == $request->benar) {
                Option::create([
                    'soal_id' => $id_soal,
                    'isi_option' => $request->$option,
                    'gambar_option' => $gambar_option,
                    'benar' => true
                ]);
            } else {
                Option::create([
                    'soal_id' => $id_soal,
                    'isi_option' => $request->$option,
                    'gambar_option' => $gambar_option
                ]);
            }
        }

        // Redirect
        return redirect()->route('list_soal', ['babak' => $babak]);
    }

    // Edit soal pilgan
    public function edit_pilgan($babak, $soal_id)
    {
        $soal = Soal::where('id', $soal_id)->first();
        // dd($soal->options);
        $options = $soal->options;

        return view('admin.soal.edit-pilgan', [
            'babak' => $babak,
            'soal' => $soal,
            'options' => $options
        ]);
    }

    // Update Soal Pilgan
    public function update_pilgan($babak, $soal_id, Request $request)
    {
        $soal = Soal::where('id', $soal_id)->first();
        $options = $soal->options;

        /*
            Intinya soal harus unik. Kalau soal di db dengan yang di update sama,
            dia dirubah dulu jadi 'a' biar ga sama kayak yang ada di db
        */
        if ($soal->soal == $request->soal) {
            $soal->update(['soal' => 'a']);
            $soal->save();
        }

        $validator = Validator::make($request->all(), [
            'soal' => 'required|unique:soals,soal', 'gambar_soal' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_1' => 'required', 'gambar_1' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_2' => 'required', 'gambar_2' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_3' => 'required', 'gambar_3' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_4' => 'required', 'gambar_4' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_5' => 'required', 'gambar_5' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'benar' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $gambar_soal = $soal->gambar_soal;
        if ($request->gambar_soal) {
            Storage::delete('public/gambar_soal/' . $gambar_soal);
            $gambar_soal = Str::random(35) . '.' . $request->gambar_soal->extension();
            $request->gambar_soal->storeAs('public/gambar_soal', $gambar_soal);
        }

        // Update Soal
        $soal->update([
            'soal' => $request->soal,
            'gambar_soal' => $gambar_soal,
            'jawaban' => $request->benar,
            'nilai' => $request->nilai,
        ]);
        $soal->save();

        // Update Option
        $i = 1;
        foreach ($options as $opsi) {
            $option = 'option_';
            $gambar = 'gambar_';
            $gambar .= strval($i);
            $option .= strval($i);
            $gambar_option = $opsi->gambar_option;

            if ($request->$gambar) {
                Storage::delete('public/gambar_option/' . $gambar_option);
                $gambar_option = Str::random(35) . '.' . $request->$gambar->extension();
                $request->$gambar->storeAs('public/gambar_option', $gambar_option);
            }

            if ($i == $request->benar) {
                $opsi->update([
                    'isi_option' => $request->$option,
                    'gambar_option' => $gambar_option,
                    'benar' => true
                ]);
            } else {
                $opsi->update([
                    'isi_option' => $request->$option,
                    'gambar_option' => $gambar_option,
                    'benar' => false
                ]);
            }
            $opsi->save();
            $i++;
        }

        return redirect()->route('list_soal', compact('babak'));
    }

    // Add Essay
    public function add_essay($babak)
    {
        return view('admin.soal.add-essay', compact('babak'));
    }

    // Create Essay
    public function create_essay($babak, Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'soal' => 'required|unique:soals,soal',
            'gambar_soal' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Rename file gambar biar ga sama
        $gambar_soal = null;
        if ($request->gambar_soal) {
            $gambar_soal = Str::random(35) . '.' . $request->gambar_soal->extension();
            $request->gambar_soal->storeAs('public/gambar_soal', $gambar_soal);
        }

        // Bikin soal
        Soal::create([
            'soal' => $request->soal,
            'gambar_soal' => $gambar_soal,
            'babak' => $babak
        ]);

        return redirect()->route('list_soal', ['babak' => $babak]);
    }

    // Edit essay
    public function edit_essay($babak, $soal_id)
    {
        $soal = Soal::where('id', $soal_id)->first();

        return view('admin.soal.edit-essay', [
            'babak' => $babak,
            'soal' => $soal,
        ]);
    }

    // Update Essay
    public function update_essay($babak, $soal_id, Request $request)
    {
        $soal = Soal::where('id', $soal_id)->first();

        // Sama seperti pilgan
        if ($soal->soal == $request->soal) {
            $soal->update(['soal' => 'a']);
            $soal->save();
        }

        $validator = Validator::make($request->all(), [
            'soal' => 'required|unique:soals,soal',
            'gambar_soal' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $gambar_soal = $soal->gambar_soal;
        if ($request->gambar_soal) {
            Storage::delete('public/gambar_soal/' . $gambar_soal);
            $gambar_soal = Str::random(35) . '.' . $request->gambar_soal->extension();
            $request->gambar_soal->storeAs('public/gambar_soal', $gambar_soal);
        }

        // Update Soal
        $soal->update([
            'soal' => $request->soal,
            'gambar_soal' => $gambar_soal,
        ]);
        $soal->save();

        return redirect()->route('list_soal', compact('babak'));
    }

    // Delete soal
    public function deleteSoal($soal_id)
    {
        $soal = Soal::where('id', $soal_id)->first();

        // Cek apakah soal pilgan
        try {
            // Hapus gambar
            $options = $soal->options;
            foreach ($options as $option) {
                Storage::delete('public/gambar_option/' . $option->gambar_option);
                $option->delete();
            }
        } catch (\Throwable $th) {
        }

        // Delete gambar soal
        Storage::delete('public/gambar_soal/' . $soal->gambar_soal);
        $soal->delete();

        return redirect()->back();
    }
}
