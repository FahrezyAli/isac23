<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $guarded=[
        'id',
        'timestamps'
    ];

    // Relationship dengan option
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    // Helper pada list-soal
    public function jawaban($soal_id)
    {
        // Karena kemaren eror brutal, jadi ku tambahi ty catch
        try
        {
            // Pilgan
            return Option::where([
                'soal_id'=>$soal_id,
                'benar'=>true
            ])->first()->isi_option;
        }
        catch (\Throwable $th)
        {
            // Essay
            return null;
        }

    }

    public function jawaban_gambar($soal_id)
    {
        // Karena kemaren eror brutal, jadi ku tambahi ty catch
        try
        {
            // Pilgan
            return Option::where([
                'soal_id'=>$soal_id,
                'benar'=>true
            ])->first()->gambar_option;
        }
        catch (\Throwable $th)
        {
            // Essay
            return null;
        }
    }
}
