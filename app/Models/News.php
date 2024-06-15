<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    
    // informa o diretório padrão para salvar as imagens das notícias
    const IMAGE_DIRECTORY = 'news-image';

    protected $fillable = [
        'title',
        'description',
        'image_path'    
    ];

    public function getDateAttribute()
    {
        return $this->created_at->format('d M Y, H:i');
    }

    public function getSmallDateAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    /**
     * Get the user that owns the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
