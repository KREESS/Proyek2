<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\UserAnswer;
use App\Models\SoalTryout;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan halaman belajar
    public function belajar()
    {
        // Mengambil semua data materi dari database
        $materis = Materi::all();

        // Mengirim data materi ke view 'user.belajar'
        return view('user.belajar', compact('materis'));
    }

    // Menampilkan halaman tryout
    public function tryout()
    {
        // Logika untuk menampilkan halaman tryout
        return view('user.tryout');
    }

    // Menampilkan halaman history tryout
    public function historyTryout()
    {
        // Logika untuk menampilkan halaman history tryout
        return view('user.history_tryout');
    }

    // Menampilkan halaman feedback
    public function feedback()
    {
        // Logika untuk menampilkan halaman feedback
        return view('user.feedback');
    }

    public function show($id)
    {
        // Mengambil data materi berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Mengirim data materi ke view 'materi_show'
        return view('user.materi_show', compact('materi'));
    }

    public function historySoalLatihan()
    {
        // Get the logged-in user's ID
        $userId = auth()->id();

        // Get the user's answers with the related tryout questions
        $userAnswers = UserAnswer::with(['soalTryout1', 'soalTryout2', 'soalTryout3', 'soalTryout4', 'soalTryout5'])
                                    ->where('user_id', $userId)
                                    ->get();

        // Calculate the correct answers for each user answer
        foreach ($userAnswers as $userAnswer) {
            $correctCount = 0;

            // Iterate through each soalTryout and corresponding jawaban
            for ($i = 1; $i <= 5; $i++) {
                $soalTryout = 'soalTryout' . $i;
                $jawaban = 'jawaban' . $i;

                if ($userAnswer->$soalTryout && $userAnswer->$jawaban === $userAnswer->$soalTryout->correct_answer) {
                    $correctCount++;
                }
            }

            $userAnswer->correctCount = $correctCount;
        }

        return view('user.history_soal_latihan', compact('userAnswers'));
    }


    public function historySoalDetail($id)
    {
        $userAnswer = UserAnswer::with(['soalTryout1', 'soalTryout2', 'soalTryout3', 'soalTryout4', 'soalTryout5'])
                                ->findOrFail($id);

        // Extract each soalTryout and its corresponding jawaban
        $questions = [];
        for ($i = 1; $i <= 5; $i++) {
            $soalTryout = $userAnswer->{'soalTryout'.$i};
            $jawaban = $userAnswer->{'jawaban'.$i};
            if ($soalTryout) {
                $questions[] = [
                    'question' => $soalTryout,
                    'jawaban' => $jawaban
                ];
            }
        }

        return view('user.history_soal_detail', compact('questions'));
    }
}
