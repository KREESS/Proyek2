<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'materi';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'question_type1',
        'tps_type1',
        'penalaran_type1',
        'penalaran_induktif_detail1',
        'penalaran_deduktif_detail1',
        'penalaran_kuantitatif_detail1',
        'pemahaman_pemahaman_type1',
        'pemahaman_type1',
        'kuantitatif_type1',
        'tl_type1',
        'tl_indonesia_type1',
        'tl_matematika_type1',
        'tl_inggris_type1',
        'judul',
        'isi_materi',
    ];
}
