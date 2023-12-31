<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'f_name',
        'l_name',
        'role',
        'profile_pic',
        'image_path',
        'social_id',
        'social_type',
        'status',
        'email',
        'is_verified'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // public function investments(): HasMany
    // {
    //     return $this->hasMany(investments::class);
    // }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'posted_by'); // 'posted_by' is the custom foreign key column
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

}
