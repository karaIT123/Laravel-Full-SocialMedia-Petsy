<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Pet extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    public $dates = ["created_at", "updated_at", "birthday"];

    public function species(){
        return $this->belongsTo('App\Models\Species');
    }

    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y', $birthday);
    }

    public function getAgeAttribute($birthday)
    {
        return $this->birthday->diffInYears();
    }

    public function getAvatarAttribute($avatar){
        #dd(public_path() . "image/avatars//{$this->id}");
        #dd("image/avatars/{$this->id}.jpg");
        if($avatar)
        {
            return "image/avatars/pets/" . ceil($this->id / 1000) . "/{$this->id}.jpg";
        }
        else

            return false;
    }

    public function setAvatarAttribute(UploadedFile $avatar)
    {
        if (is_object($avatar) && $avatar->isValid()) {

            $dir = public_path() . "/image/avatars/pets/" . ceil($this->id / 1000) ;

            if(!file_exists($dir)){
                mkdir($dir,0777,true);
            }

            Image::make($avatar)->fit(150, 150)->save( "$dir/{$this->id}.jpg");
            #$avatar->move(public_path() . "/image/avatars","{$this->id}.{$avatar->getClientOriginalExtension()}");

            $this->attributes["avatar"] = true;
        }
    }
}
