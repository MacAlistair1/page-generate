<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBuilder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $columnsWithTypes = [
        'logo' => 'image',
        'bg_color' => 'string',
        'heading_bg_color' => 'string',
        'heading_text_color' => 'string',
        'heading' => 'string',
        'website' => 'string',
        'linkedin' => 'string',
        'instagram' => 'string',
        'facebook' => 'string',
        'generated_image' => 'image',
    ];

}
