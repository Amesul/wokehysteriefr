<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    public static function findLatest()
    {
        $episodes = Episode::all()->sortByDesc('id')->where("published");
        return $episodes->first();
    }
}
