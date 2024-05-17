<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Soal;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet;
use SebastianBergmann\CodeUnit\FunctionUnit;

class AdminController extends Controller
{
    public function dashboard_admin()
    {
        $accounts = Account::where('role', '!=', 'admin')->get();
        return view('admin.dashboard-admin', [
            'accounts' => $accounts->count(),
            'participants' => Student::all()->count(),
            'olympiad' => $accounts->where('role', 'olymp')->count(),
            'olympiadVerified' => $accounts->where('role', 'olymp')->where('status_bayar', 'verified')->count(),
            'uiux' => $accounts->where('role', 'uiux')->count(),
            'uiuxVerified' => $accounts->where('role', 'uiux')->where('status_bayar', 'verified')->count(),
        ]);
    }

    public function verify()
    {
        $accounts = Account::where('role', '!=', 'admin')->get();
        return view('admin.verify', [
            "accounts" => $accounts,
            "olymp" => $accounts->where('role', 'olymp'),
            "uiux" => $accounts->where('role', 'uiux')
        ]);
    }

    public function download()
    {

        $accounts = Account::where('role', '!=', 'admin')->get();
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->getStyle('A1:M500')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $activeWorksheet->mergeCells('A1:A2');
        $activeWorksheet->mergeCells('B1:B2');
        $activeWorksheet->mergeCells('C1:D1');
        $activeWorksheet->mergeCells('E1:F1');
        $activeWorksheet->mergeCells('G1:G2');
        $activeWorksheet->mergeCells('H1:H2');
        $activeWorksheet->mergeCells('I1:I2');
        $activeWorksheet->mergeCells('J1:J2');
        $activeWorksheet->setCellValue('A1', 'No.');
        $activeWorksheet->setCellValue('B1', 'Nama Tim');
        $activeWorksheet->setCellValue('C1', 'Olympiad');
        $activeWorksheet->setCellValue('E1', 'UI/UX');
        $activeWorksheet->setCellValue('C2', 'Verifikasi');
        $activeWorksheet->setCellValue('D2', 'Nilai');
        $activeWorksheet->setCellValue('E2', 'Verifikasi');
        $activeWorksheet->setCellValue('F2', 'Hasil');
        $activeWorksheet->setCellValue('G1', 'Bukti Bayar');
        $activeWorksheet->setCellValue('H1', 'Asal Sekolah');
        $activeWorksheet->setCellValue('I1', 'Created At');
        $activeWorksheet->setCellValue('J1', 'Batch');

        foreach ($accounts as $key => $account) {
            $number = strval($key + 1);
            $row = strval($key + 3);
            $activeWorksheet->setCellValue('A' . $row, $number);
            $activeWorksheet->setCellValue('B' . $row, $account->nama_tim);
            $activeWorksheet->setCellValue('G' . $row, $account->bukti_bayar);
            $activeWorksheet->setCellValue('H' . $row, $account->asal_sekolah);
            $activeWorksheet->setCellValue('I' . $row, $account->created_at);
            if ($account->created_at < '2023-08-05 00:00:00') {
                $activeWorksheet->setCellValue('J' . $row, 'Batch 1');
            } else if ($account->created_at > '2023-08-12 00:00:00' && $account->created_at < '2023-08-26 00:00:00') {
                $activeWorksheet->setCellValue('J' . $row, 'Batch 2');
            } else if ($account->created_at > '2023-09-02 00:00:00' && $account->created_at < '2023-09-11 00:00:00') {
                $activeWorksheet->setCellValue('J' . $row, 'Batch 3');
            } else {
                $activeWorksheet->setCellValue('J' . $row, 'Diluar waktu pendaftaran.');
            }

            if ($account->role == 'olymp') {
                $activeWorksheet->setCellValue('C' . $row, $account->status_bayar);
                $activeWorksheet->setCellValue('D' . $row, '100/100');
            } else {
                $activeWorksheet->setCellValue('E' . $row, $account->status_bayar);
                $activeWorksheet->setCellValue('F' . $row, 'link');
            }
        };

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="myfile.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    // navbar dropdown
    public function olympiad()
    {
        $accounts = Account::where('role', 'olymp')->get();
        $sertifLengkap = 0;
        foreach ($accounts as $account) {
            foreach ($account->students as $student) {
                if ($student->sertifikat == 'sudah') {
                    $sertifLengkap = $sertifLengkap + 1;
                }
            }
        }
        $sertifKurang = $accounts->count() - $sertifLengkap;

        return view('admin.olympiad', [
            "accounts" => $accounts,
            'lengkap' => $sertifLengkap,
            'kurang' => $sertifKurang
        ]);
    }

    public function uiux()
    {
        $accounts = Account::where('role', 'uiux')->get();
        $sertifLengkap = 0;
        foreach ($accounts as $account) {
            $count = 0;
            foreach ($account->students as $student) {
                if ($student->sertifikat == 'sudah') {
                    $count = $count + 1;
                }
            }
            if ($count == 2) {
                $sertifLengkap = $sertifLengkap + 1;
            }
        }
        $sertifKurang = $accounts->count() - $sertifLengkap;
        return view('admin.uiux', [
            "accounts" => $accounts,
            'lengkap' => $sertifLengkap,
            'kurang' => $sertifKurang
        ]);
    }

    public function info(string $id)
    {
        $account = Account::find($id);
        return view('admin.info', [
            'account' => $account,
            'students' => $account->students->all()
        ]);
    }

    public function updateStatusBayar(Request $request)
    {
        $account_id = $request->accountId;
        $account = Account::find($account_id);
        $status_bayar = $request->status_bayar;
        $account->update(['status_bayar' => $status_bayar]);
        return redirect()->route('tabel-verify')->with('success', 'Status tim <strong> 	&nbsp;' . $account->nama_tim . "&nbsp;</strong> telah diupdate menjadi " . $status_bayar);
    }

    public function tambahKwitansi(Request $request, Account $account)
    {
        $kwitansiName = Str::uuid() . '.' . $request->kwitansi->getClientOriginalExtension();
        $request->kwitansi->storeAs('public/images/kwitansi/', $kwitansiName);
        $validatedData['kwitansi'] = asset('storage/images/kwitansi') . '/' . $kwitansiName;

        $account->update($validatedData);
        return redirect()->back()->with('success', 'Kwitansi berhasil ditambahkan');
    }

    public function tambahSertif(Request $request, Student $student)
    {
        $sertifikatName = Str::uuid() . '.' . $request->sertifikat->getClientOriginalExtension();
        $request->sertifikat->storeAs('public/images/sertif/', $sertifikatName);
        $validatedData['sertifikat'] = asset('storage/images/sertif') . '/' . $sertifikatName;

        $student->update($validatedData);
        return redirect()->back()->with('success', 'Kwitansi berhasil ditambahkan');
    }



    public function hasil_uiux()
    {
        $accounts = Account::where('role', 'uiux')->get();
        $accounts = $accounts->where('status_bayar', 'verified');

        return view('admin.hasil-uiux', [
            "accounts" => $accounts
        ]);
    }

    public function hasil_olim()
    {
        $accounts = Account::where('role', 'olymp')->get();
        $accounts = $accounts->where('status_bayar', 'verified');


        return view('admin.hasil-olim', [
            "accounts" => $accounts
        ]);
    }

    public function hasil_olim_penyisihan_desc()
    {
        $accounts = Account::where('role', 'olymp')->get();
        $accounts = $accounts->where('status_bayar', 'verified');
        $accounts = $accounts->sortByDesc('nilai_penyisihan');


        return view('admin.hasil-olim', [
            "accounts" => $accounts
        ]);
    }

    public function hasil_olim_semifinal_desc()
    {
        $accounts = Account::where('role', 'olymp')->get();
        $accounts = $accounts->where('status_bayar', 'verified');
        $accounts = $accounts->sortByDesc(function ($account, $key) {
            return $account->nilai_semifinal + $account->nilai_essay;
        });

        return view('admin.hasil-olim', [
            "accounts" => $accounts
        ]);
    }

    public function penilaian_essay(string $id)
    {
        $account = Account::find($id);
        $essays = $account->summaries->where('answer', '!=', null);

        return view('admin.penilaian-essay', [
            "account" => $account,
            "essays" => $essays
        ]);
    }

    public function detail_penyisihan(string $id)
    {
        $account = Account::find($id);
        $soals = Soal::where('babak', 'penyisihan')->get();
        $summaries = $account->summaries->whereIn('soal_id', $soals->pluck('id'));

        return view('admin.detail-hasil-olim', [
            "account" => $account,
            "summaries" => $summaries
        ]);
    }

    public function detail_semifinal(string $id)
    {
        $account = Account::find($id);
        $soals = Soal::where('babak', 'semifinal')->get();
        $summaries = $account->summaries->whereIn('soal_id', $soals->pluck('id'));

        return view('admin.detail-hasil-olim', [
            "account" => $account,
            "summaries" => $summaries
        ]);
    }

    public function isi_nilai(Request $request, $id)
    {

        $account = Account::find($id);

        $essays = $account->summaries->where('answer', '!=', null);

        $i = 1;
        foreach ($essays as $essay) {
            $essay->update([
                'score' => $request->input('nilai_' . $i)
            ]);
            $i++;
        }

        $account->update([
            'nilai_essay' => $essays->sum('score')
        ]);
        return redirect()->route('hasil_olim')->with('success', 'Nilai berhasil diupdate');
    }
}
