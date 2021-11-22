<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Intervention\Image\Facades\Image;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'confirmation_token',
        'firstname',
        'lastname',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getAvatarAttribute($avatar){
        #dd(public_path() . "image/avatars//{$this->id}");
        #dd("image/avatars/{$this->id}.jpg");
        if($avatar)
        {
            return "image/avatars/{$this->id}.jpg";
        }
        else

            return false;
    }

    public function setAvatarAttribute(UploadedFile $avatar){
        if(is_object($avatar) && $avatar->isValid())
        {
            Image::make($avatar)->fit(150,150)->save(public_path() . "/image/avatars/{$this->id}.jpg");
            #$avatar->move(public_path() . "/image/avatars","{$this->id}.{$avatar->getClientOriginalExtension()}");

            $this->attributes["avatar"] = true;
        }
    }
}
