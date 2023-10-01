<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Feedback;
use App\Models\Kuesioner;
use App\Models\Responden;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DasborController extends Controller
{
    public function index()
    {
        $datakuesioners = Kuesioner::all();
        $dataAnswers = Answer::all();
        $dataRespondens = Responden::all();
        $dataFeedbacks = Feedback::all();

        $total = (object) [
            'kuesioner' => $datakuesioners->count(),
            'answer' => $dataAnswers->count(),
            'responden' => $dataRespondens->count(),
            'feedback' => $dataFeedbacks->count()
        ];

        $today = Carbon::now();
        $dateArray = [];
        for ($i = 0; $i <= 7; $i++) {
            $dateArray[] = $today->subDays($i)->toDateString();
        }
        $dateArray = array_reverse($dateArray);

        $dailyAnswers = [];
        foreach ($dateArray as $key => $date) {
            $dailyAnswers[$date] = [
                (object) [
                    'label' => 0,
                    'total' => Answer::where('answer', 1)->whereDate('created_at', $date)->count()
                ],
                (object) [
                    'label' => 1,
                    'total' => Answer::where('answer', 2)->whereDate('created_at', $date)->count()
                ],
                (object) [
                    'label' => 2,
                    'total' => Answer::where('answer', 3)->whereDate('created_at', $date)->count()
                ],
                (object) [
                    'label' => 3,
                    'total' => Answer::where('answer', 4)->whereDate('created_at', $date)->count()
                ],
            ];
        }

        $answers = (object) [
            'total' => $total->answer,
            'details' => [
                [
                    'label' => rateLabel(1),
                    'total' => $dataAnswers->where('answer', 1)->count(),
                    'percentage' => getPercentage($dataAnswers->where('answer', 1)->count(), $total->answer)
                ],
                [
                    'label' => rateLabel(2),
                    'total' => $dataAnswers->where('answer', 2)->count(),
                    'percentage' => getPercentage($dataAnswers->where('answer', 2)->count(), $total->answer)
                ],
                [
                    'label' => rateLabel(3),
                    'total' => $dataAnswers->where('answer', 3)->count(),
                    'percentage' => getPercentage($dataAnswers->where('answer', 3)->count(), $total->answer)
                ],
                [
                    'label' => rateLabel(4),
                    'total' => $dataAnswers->where('answer', 4)->count(),
                    'percentage' => getPercentage($dataAnswers->where('answer', 4)->count(), $total->answer)
                ],
            ],
            'daily' => $dailyAnswers
        ];

        return view('pages.dashboard.index', compact('total', 'answers'));
    }

    public function ikm()
    {
        $data = [];

        $respondens = Responden::all();
        $kuesioners = Kuesioner::all();

        $bobotNilaiTertimbang = 1;
        if (count($kuesioners) > 0) {
            $bobotNilaiTertimbang = 1 / count($kuesioners);
        }

        $nilaiPersepsiPerUnit = [];
        foreach ($respondens as $keyResponden => $responden) {
            foreach ($responden->answers as $keyAnswer => $answer) {
                $nilaiPersepsiPerUnit[$keyResponden][$keyAnswer] = (object) [
                    'question' => $answer->kuesioner->question,
                    'answer' => $answer->answer
                ];
            }
        }

        $totalAnswer = [];
        foreach ($nilaiPersepsiPerUnit as $key => $array) {
            for ($i = 0; $i < count($array); $i++) {
                if (!isset($totalAnswer[$i])) {
                    $totalAnswer[$i] = 0;
                }
                $totalAnswer[$i] += $array[$i]->answer;
            }
        }

        foreach ($totalAnswer as $key => $value) {
            $data[$key] = (object) [
                'question' => $nilaiPersepsiPerUnit[0][$key]->question,
                'totalNilaiPersepsiPerUnit' => $value
            ];
        }

        foreach ($data as $key => $value) {
            $data[$key] = (object) [
                'question' => $value->question,
                'totalNilaiPersepsiPerUnit' => $value->totalNilaiPersepsiPerUnit,
                'NRRPerUnsur' => $value->totalNilaiPersepsiPerUnit / count($respondens)
            ];
        }

        foreach ($data as $key => $value) {
            $data[$key] = (object) [
                'question' => $value->question,
                'totalNilaiPersepsiPerUnit' => $value->totalNilaiPersepsiPerUnit,
                'NRRPerUnsur' => $value->NRRPerUnsur,
                'NRRTertimbangUnsur' => $value->NRRPerUnsur * $bobotNilaiTertimbang
            ];
        }

        $IKM = 0;
        foreach ($data as $value) {
            $IKM += $value->NRRTertimbangUnsur;
        }

        $konversiIKM = $IKM * 25;

        return view('pages.dashboard.ikm.index', compact('data', 'IKM', 'konversiIKM', 'bobotNilaiTertimbang'));
    }
}
