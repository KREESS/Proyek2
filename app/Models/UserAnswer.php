<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = [
        'user_id',
        'soal_tryout_id1',
        'jawaban1',
        'soal_tryout_id2',
        'jawaban2',
        'soal_tryout_id3',
        'jawaban3',
        'soal_tryout_id4',
        'jawaban4',
        'soal_tryout_id5',
        'jawaban5',
    ];    

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soalTryout1()
    {
        return $this->belongsTo(SoalTryout::class, 'soal_tryout_id1');
    }

    public function soalTryout2()
    {
        return $this->belongsTo(SoalTryout::class, 'soal_tryout_id2');
    }

    public function soalTryout3()
    {
        return $this->belongsTo(SoalTryout::class, 'soal_tryout_id3');
    }

    public function soalTryout4()
    {
        return $this->belongsTo(SoalTryout::class, 'soal_tryout_id4');
    }

    public function soalTryout5()
    {
        return $this->belongsTo(SoalTryout::class, 'soal_tryout_id5');
    }
}
