<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasFactory, Notifiable;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
        'status',
        'category'
    ];

    const PUBLISHED = 1;
    const DRAFT = 0;

    public function statusLabel()
    {
        return $this->status === self::PUBLISHED
            ? 'Publicado'
            : 'Borrador';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public function checkLike(User $user){
        return $this->likes->contains('user_id', $user->id);
    }

}
