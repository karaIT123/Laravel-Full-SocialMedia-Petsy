<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;


class Post extends Model
{
    public $fillable = ['name','content','image','pets_id','user_id'];
    use HasFactory;

    public function pets(){
        return $this->belongsToMany('App\Models\Pet');
    }

    public function image($size){
        return '/'. $this->getImageDir() . '/' . $this->id . '_' . $size . '.jpg';
    }

    public function getImageDir()
    {
        return 'image/photo/' . ceil($this->id / 1000);
    }

    public function setImageAttribute(UploadedFile $image){
        if(is_object($image) && $image->isValid()) {
            if(!empty($this->image)){
                unlink($this->getImageDir() . "/{$this->id}.{$this->image}");
            }
            static::saved(function($instance) use ($image){
                $image = $image->move($instance->getImageDir() ,   "{$instance->id}.{$image->getClientOriginalExtension()}");
                Image::make($image)->fit(360)->save($instance->getImageDir() . "/" . $instance->id . '_thumb.jpg');
                Image::make($image)->fit(940)->save($instance->getImageDir() . "/" . $instance->id . '_large.jpg');
            });
           $this->attributes['image'] = $image->getClientOriginalExtension();
        }
    }

    public function setPetsIdAttribute($pets_id){
        static::saved(function($instance) use ($pets_id){
            $instance->pets()->sync($pets_id);
        });
    }

    public function getPetsIdAttribute($pets_id){
        if($this->id){
            #dd($this->pets()->id);
            return $this->pets->pluck('id');
        }
        return [];
    }

}
