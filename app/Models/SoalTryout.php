<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalTryout extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'soal_tryout';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'question_type',
        'tps_type',
        'penalaran_type',
        'penalaran_induktif_detail',
        'penalaran_deduktif_detail',
        'penalaran_kuantitatif_detail',
        'pemahaman_pemahaman_type',
        'pemahaman_type',
        'kuantitatif_type',
        'tl_type',
        'tl_indonesia_type',
        'tl_matematika_type',
        'tl_inggris_type',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'option_e',
        'correct_answer',
        'answer_explanation',
        'materi_id',
    ];
}
