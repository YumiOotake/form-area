<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [ #どのカラムを保存していいか
        'name',
        'email',
        'tel',
        'know',
        'content',
    ];
    protected $casts = [ #DBの値をどんな型で扱うか　これを書くだけでDBでJSONとして扱ってくれる
        'know' => 'array',
    ];
}
