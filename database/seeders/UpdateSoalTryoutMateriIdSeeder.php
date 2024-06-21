<?php
// UpdateSoalTryoutMateriIdSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalTryout;
use App\Models\Materi;

class UpdateSoalTryoutMateriIdSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua data soal_tryout
        $soalTryouts = SoalTryout::all();

        foreach ($soalTryouts as $soalTryout) {
            // Cari data materi yang sesuai dengan kriteria
            $materi = Materi::where('question_type1', $soalTryout->question_type)
                            ->where('tps_type1', $soalTryout->tps_type)
                            ->where('penalaran_type1', $soalTryout->penalaran_type)
                            ->where('penalaran_induktif_detail1', $soalTryout->penalaran_induktif_detail)
                            ->where('penalaran_deduktif_detail1', $soalTryout->penalaran_deduktif_detail)
                            ->where('penalaran_kuantitatif_detail1', $soalTryout->penalaran_kuantitatif_detail)
                            ->where('pemahaman_pemahaman_type1', $soalTryout->pemahaman_pemahaman_type)
                            ->where('pemahaman_type1', $soalTryout->pemahaman_type)
                            ->where('kuantitatif_type1', $soalTryout->kuantitatif_type)
                            ->where('tl_type1', $soalTryout->tl_type)
                            ->where('tl_indonesia_type1', $soalTryout->tl_indonesia_type)
                            ->where('tl_matematika_type1', $soalTryout->tl_matematika_type)
                            ->where('tl_inggris_type1', $soalTryout->tl_inggris_type)
                            ->first();

            // Jika ditemukan materi yang sesuai, update materi_id di soal_tryout
            if ($materi) {
                $soalTryout->materi_id = $materi->id;
                $soalTryout->save();
            }
        }
    }
}