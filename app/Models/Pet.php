<?php

namespace App\Models;

use App\Http\Requests\PetsRequest;
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
    public $fillable = ["avatar","name","species_id","user_id","birthday","gender"];


    public static function boot(){
        parent::boot();
        static::deleted(function($instance){

            if($instance->avatar){
                unlink($instance->avatar);
            }
            return true;
        });
    }

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

    public function setAvatarAttribute($avatar)
    {
        #dd($this);
        #die();
        if (is_object($avatar) && $avatar->isValid()) {
            static::saved(function($instance) use ($avatar){
                $dir = public_path() . "/image/avatars/pets/" . ceil($instance->id / 1000) ;

                if(!file_exists($dir)){
                    mkdir($dir,0777,true);
                }

                Image::make($avatar)->fit(150, 150)->save( "$dir/{$instance->id}.jpg");
                #$avatar->move(public_path() . "/image/avatars","{$this->id}.{$avatar->getClientOriginalExtension()}");

            });

            #$this->attributes["avatar"] = true;
        }
    }


    public function getAvatarAttribute($avatar){
        #dd(public_path() . "image/avatars//{$this->id}");
        #dd("image/avatars/{$this->id}.jpg");

        return "image/avatars/pets/" . ceil($this->id / 1000) . "/{$this->id}.jpg";

    }

}
