<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPengguna1 extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'soal_tryout_id_1', 'jawaban_1',
        'soal_tryout_id_2', 'jawaban_2',
        'soal_tryout_id_3', 'jawaban_3',
        'soal_tryout_id_4', 'jawaban_4',
        'soal_tryout_id_5', 'jawaban_5',
        'soal_tryout_id_6', 'jawaban_6',
        'soal_tryout_id_7', 'jawaban_7',
        'soal_tryout_id_8', 'jawaban_8',
        'soal_tryout_id_9', 'jawaban_9',
        'soal_tryout_id_10', 'jawaban_10',
        'soal_tryout_id_11', 'jawaban_11',
        'soal_tryout_id_12', 'jawaban_12',
        'soal_tryout_id_13', 'jawaban_13',
        'soal_tryout_id_14', 'jawaban_14',
        'soal_tryout_id_15', 'jawaban_15',
        'soal_tryout_id_16', 'jawaban_16',
        'soal_tryout_id_17', 'jawaban_17',
        'soal_tryout_id_18', 'jawaban_18',
        'soal_tryout_id_19', 'jawaban_19',
        'soal_tryout_id_20', 'jawaban_20',
        'soal_tryout_id_21', 'jawaban_21',
        'soal_tryout_id_22', 'jawaban_22',
        'soal_tryout_id_23', 'jawaban_23',
        'soal_tryout_id_24', 'jawaban_24',
        'soal_tryout_id_25', 'jawaban_25',
        'soal_tryout_id_26', 'jawaban_26',
        'soal_tryout_id_27', 'jawaban_27',
        'soal_tryout_id_28', 'jawaban_28',
        'soal_tryout_id_29', 'jawaban_29',
        'soal_tryout_id_30', 'jawaban_30',
    ];

    /**
     * Get the user that owns the answers.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optionally, define relationships for each question and answer if needed
}
