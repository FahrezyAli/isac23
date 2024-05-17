<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Option;
use App\Models\Soal;
use App\Models\Summary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompetitionController extends Controller
{
    public function competition()
    {
        switch (Auth::user()->status) {
            case "penyisihan":
                $viewName =
                    (Auth::user()->role == 'uiux' && Auth::user()->hasil_uiux != null)
                    ? 'afterForm'
                    : (Auth::user()->role == 'uiux'
                        ? 'uiux.penyisihan-uiux'
                        : 'olim.penyisihan-olim');

                break;
            case "semifinalis":
                ((Auth::user()->role == 'olymp' && date('Y-m-d') < '2023-09-30') || (Auth::user()->role == 'uiux'))
                    ? $viewName = 'lolos'
                    : $viewName = 'olim.semifinal-olim';
                break;
            case "finalis":
                $viewName = 'lolos';
                break;
            case "gagal_penyisihan":
                $viewName = 'gagal';
                break;
            case "gagal_semifinal":
                $viewName = 'gagal';
                break;
            default:
                return redirect()->route('profile');
        }
        return view("client.dashboard.competition.$viewName");
    }

    public function attempt_penyisihan($no)
    {
        $account = Account::find(Auth::user()->id);
        $date = date('Y-m-d H:i:s');

        if ($account->penyisihan_end_time == null) {
            $account->update(['penyisihan_start_time' => date('H:i:s'), 'penyisihan_end_time' => date('H:i:s', strtotime("+90 Minutes"))]);
        }


        if (!is_null($account->nilai_penyisihan)) {
            return redirect()->route('afterForm');
        }

        if (Summary::where('account_id', $account->id)->count() == 0) {
            $questions = Soal::where('babak', 'penyisihan')->inRandomOrder()->limit(40)->get();
            foreach ($questions as $question) {
                Summary::create([
                    'soal_id' => $question->id,
                    'account_id' => $account->id,
                    'no_soal' => $questions->search($question) + 1,
                    'current_soal' => $questions->search($question) == 0 ? true : false
                ]);
            }
        }

        $summaries = Summary::where('account_id', $account->id)->get();
        $summaries = $summaries->filter(function ($summary) {
            return $summary->soal->babak == 'penyisihan';
        });

        if ($date > '2023-09-23 12:00:00' && is_null($account->nilai_penyisihan)) {
            $correct_answer = 0;
            $wrong_answer = 0;
            foreach ($summaries as $summary) {
                if (is_null($summary->answer_status)) {
                    $summary->update(['score' => 0]);
                } else {
                    if ($summary->answer_status) {
                        $summary->update(['score' => $summary->soal->nilai]);
                        $correct_answer = $correct_answer + $summary->score;
                    } else if (!$summary->answer_status) {
                        $summary->update(['score' => -1]);
                        $wrong_answer = $wrong_answer + $summary->score;
                    }
                }
            }
            $summary->update(['current_soal' => false]);
            $account->update(['nilai_penyisihan' => $correct_answer + $wrong_answer, 'penyisihan_duration' => gmdate("H:i:s", 5400)]);
            return redirect()->route('afterForm');
        }

        if ($date < '2023-09-23 09:00:00' || $date > '2023-09-23 12:00:00') {
            return redirect()->route('profile');
        }

        if ($no > $summaries->count()) {
            return redirect()->route('attempt_penyisihan', $summaries->where('current_soal', true)->first()->no_soal);
        }

        $question = Soal::where('id', $summaries[$no - 1]->soal_id)->first();

        $attempt = Summary::where([
            ['account_id', $account->id],
            ['soal_id', $question->id]
        ])->first();
        $options = Option::where('soal_id', $question->id)->get();

        $currentTime = date('H:i:s');
        $endTime = $account->penyisihan_end_time;
        $timeLeft = strtotime($endTime) - strtotime($currentTime);

        if ($timeLeft <= 0) {
            $correct_answer = 0;
            $wrong_answer = 0;
            foreach ($summaries as $summary) {
                if (is_null($summary->answer_status)) {
                    $summary->update(['score' => 0]);
                } else {
                    if ($summary->answer_status) {
                        $summary->update(['score' => $summary->soal->nilai]);
                        $correct_answer = $correct_answer + $summary->score;
                    } else if (!$summary->answer_status) {
                        $summary->update(['score' => -1]);
                        $wrong_answer = $wrong_answer + $summary->score;
                    }
                }
            }
            $summary->update(['current_soal' => false]);
            $account->update(['nilai_penyisihan' => $correct_answer + $wrong_answer, 'penyisihan_duration' => gmdate("H:i:s", 5400)]);
            return redirect()->route('afterForm');
        }

        if (!$summaries[$no - 1]->current_soal) {
            return redirect()->route('attempt_penyisihan', $summaries->where('current_soal', true)->first()->no_soal);
        }


        return view('client.dashboard.competition.olim.attempt', compact('question', 'options', 'no', 'timeLeft', 'attempt', 'summaries'));
    }

    public function answer_penyisihan(Request $request, $no)
    {
        $account = Account::find(Auth::user()->id);
        $summaries = Summary::where('account_id', $account->id)->get();
        $summaries = $summaries->filter(function ($summary) {
            return $summary->soal->babak == 'penyisihan';
        });

        Summary::where([
            'soal_id' => $request->soal_id,
            'account_id' => Auth::user()->id
        ])->update(['option_id' => $request->option_id, 'answer_status'  =>
        $request->option_id
            ? (Option::find($request->option_id)->benar
                ? true
                : false)
            : null]);

        $summaries = Summary::where('account_id', $account->id)->get();
        $summaries = $summaries->filter(function ($summary) {
            return $summary->soal->babak == 'penyisihan';
        });

        if ($request->action == "selesai") {
            $correct_answer = 0;
            $wrong_answer = 0;
            foreach ($summaries as $summary) {
                if (is_null($summary->answer_status)) {
                    $summary->update(['score' => 0]);
                } else {
                    if ($summary->answer_status) {
                        $summary->update(['score' => $summary->soal->nilai]);
                        $correct_answer = $correct_answer + $summary->score;
                    } else if (!$summary->answer_status) {
                        $summary->update(['score' => -1]);
                        $wrong_answer = $wrong_answer + $summary->score;
                    }
                }
                $summary->update(['current_soal' => false]);
            }
            $currentTime = date('H:i:s');
            $startTime = $account->penyisihan_start_time;
            $timeElapsed = strtotime($currentTime) - strtotime($startTime);
            $timeElapsed = gmdate("H:i:s", $timeElapsed);

            $account->update(['nilai_penyisihan' => $correct_answer + $wrong_answer, 'penyisihan_duration' => $timeElapsed]);
            return redirect()->route('afterForm');
        }

        $summaries[$no - 1]->update(['current_soal' => false]);

        if ($no != $summaries->count()) {
            $summaries[$no]->update(['current_soal' => true]);
            return redirect()->route('attempt_penyisihan', $no + 1);
        } else {
            return redirect()->route('afterForm');
        }
    }

    public function attempt_semifinal($no)
    {
        $account = Account::find(Auth::user()->id);
        $date = date('Y-m-d H:i:s');


        if ($account->semifinal_end_time == null) {
            $account->update(['semifinal_start_time' => date('H:i:s'), 'semifinal_end_time' => date('H:i:s', strtotime("+90 Minutes"))]);
        }


        if (!is_null($account->nilai_semifinal)) {
            return redirect()->route('afterForm');
        }

        $summaries = Summary::where('account_id', $account->id)->get();
        $summaries = $summaries->filter(function ($summary) {
            return $summary->soal->babak == 'semifinal';
        });

        if ($summaries->count() == 0) {
            $questions = Soal::where('babak', 'semifinal')->whereNotNull('jawaban')->inRandomOrder()->limit(30)->get();
            $essayQuestions = Soal::where('babak', 'semifinal')->whereNull('jawaban')->inRandomOrder()->limit(2)->get();
            foreach ($questions as $question) {
                Summary::create([
                    'soal_id' => $question->id,
                    'account_id' => $account->id,
                    'no_soal' => $questions->search($question) + 1,
                    'current_soal' => $questions->search($question) == 0 ? true : false
                ]);
            }
            foreach ($essayQuestions as $essayQuestion) {
                Summary::create([
                    'soal_id' => $essayQuestion->id,
                    'account_id' => $account->id,
                    'no_soal' => $questions->count() + $essayQuestions->search($essayQuestion) + 1
                ]);
            }
        }

        $summaries = Summary::where('account_id', $account->id)->get();
        $summaries = $summaries->filter(function ($summary) {
            return $summary->soal->babak == 'semifinal';
        });

        if ($date > '2023-09-30 10:40:00' && is_null($account->nilai_semifinal)) {
            $correct_answer = 0;
            $wrong_answer = 0;
            foreach ($summaries as $summary) {
                if (is_null($summary->answer_status)) {
                    $summary->update(['score' => 0]);
                } else {
                    if ($summary->answer_status) {
                        $summary->update(['score' => $summary->soal->nilai]);
                        $correct_answer = $correct_answer + $summary->score;
                    } else if (!$summary->answer_status) {
                        $summary->update(['score' => -1]);
                        $wrong_answer = $wrong_answer + $summary->score;
                    }
                }
            }
            $summary->update(['current_soal' => false]);
            $account->update(['nilai_semifinal' => $correct_answer + $wrong_answer, 'semifinal_duration' => gmdate("H:i:s", 5400)]);
            return redirect()->route('afterForm');
        }

        if ($date < '2023-09-30 09:10:00' || $date > '2023-09-30 10:40:00') {
            return redirect()->route('profile');
        }

        if ($no > $summaries->count()) {
            return redirect()->route('attempt_semifinal', $summaries->where('current_soal', true)->first()->no_soal);
        }

        $question = Soal::where(
            'id',
            $summaries->where('no_soal', $no)->first()->soal_id
        )->first();

        $attempt = Summary::where([
            ['account_id', $account->id],
            ['soal_id', $question->id]
        ])->first();
        $options = Option::where('soal_id', $question->id)->get();

        $currentTime = date('H:i:s');
        $endTime = $account->semifinal_end_time;
        $timeLeft = strtotime($endTime) - strtotime($currentTime);


        if ($timeLeft <= 0) {
            $correct_answer = 0;
            $wrong_answer = 0;
            foreach ($summaries as $summary) {
                if (is_null($summary->answer_status)) {
                    $summary->update(['score' => 0]);
                } else {
                    if ($summary->answer_status) {
                        $summary->update(['score' => $summary->soal->nilai]);
                        $correct_answer = $correct_answer + $summary->score;
                    } else if (!$summary->answer_status) {
                        $summary->update(['score' => -1]);
                        $wrong_answer = $wrong_answer + $summary->score;
                    }
                }
            }
            $summary->update(['current_soal' => false]);
            $account->update(['nilai_semifinal' => $correct_answer + $wrong_answer, 'semifinal_duration' => gmdate("H:i:s", 5400)]);
            return redirect()->route('afterForm');
        }


        if (!$summaries->where('no_soal', $no)->first()->current_soal) {
            return redirect()->route('attempt_semifinal', $summaries->where('current_soal', true)->first()->no_soal);
        }


        if ($question->jawaban == null) {
            return view('client.dashboard.competition.olim.attempt-essay', compact('question', 'options', 'no', 'timeLeft', 'attempt', 'summaries'));
        } else {
            return view('client.dashboard.competition.olim.attempt', compact('question', 'options', 'no', 'timeLeft', 'attempt', 'summaries'));
        }
    }

    public function answer_semifinal(Request $request, $no)
    {
        $account = Account::find(Auth::user()->id);
        $summaries = Summary::where('account_id', $account->id)->get();
        $summaries = $summaries->filter(function ($summary) {
            return $summary->soal->babak == 'semifinal';
        });

        Summary::where([
            'soal_id' => $request->soal_id,
            'account_id' => Auth::user()->id
        ])->update(['option_id' => $request->option_id, 'answer' => $request->answer, 'answer_status'  =>
        $request->option_id
            ? (Option::find($request->option_id)->benar
                ? true
                : false)
            : null]);

        $account = Account::find(Auth::user()->id);
        $summaries = Summary::where('account_id', $account->id)->get();
        $summaries = $summaries->filter(function ($summary) {
            return $summary->soal->babak == 'semifinal';
        });

        if ($request->action == "selesai") {
            $correct_answer = 0;
            $wrong_answer = 0;
            foreach ($summaries as $summary) {
                if (is_null($summary->answer_status)) {
                    $summary->update(['score' => 0]);
                } else {
                    if ($summary->answer_status) {
                        $summary->update(['score' => $summary->soal->nilai]);
                        $correct_answer = $correct_answer + $summary->score;
                    } else if (!$summary->answer_status) {
                        $summary->update(['score' => -1]);
                        $wrong_answer = $wrong_answer + $summary->score;
                    }
                }
                $summary->update(['current_soal' => false]);
            }
            $currentTime = date('H:i:s');
            $startTime = $account->semifinal_start_time;
            $timeElapsed = strtotime($currentTime) - strtotime($startTime);
            $timeElapsed = gmdate("H:i:s", $timeElapsed);

            $account->update(['nilai_semifinal' => $correct_answer + $wrong_answer, 'semifinal_duration' => $timeElapsed]);
            return redirect()->route('afterForm');
        }

        $summaries->where('no_soal', $no)->first()->update(['current_soal' => false]);

        if ($no != $summaries->count()) {
            $summaries->where('no_soal', $no + 1)->first()->update(['current_soal' => true]);
            return redirect()->route('attempt_semifinal', $no + 1);
        } else {
            return redirect()->route('afterForm');
        }
    }

    public function attempt_uiux(Request $request)
    {
        $date = date('Y-m-d H:i:s');
        if ($date > '2023-10-04 15:00:00') {
            return redirect()->route('profile');
        }
        $request->validate(['hasil_uiux' => 'required|url']);
        $account = Account::find(Auth::user()->id);
        $account->update(['hasil_uiux' => $request->hasil_uiux]);

        return redirect()->route('afterForm');
    }

    public function afterForm()
    {
        return view('client.dashboard.competition.afterForm');
    }
}
