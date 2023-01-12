<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_New extends Model
{
    use HasFactory;
    protected $table='imgae_galleries';
    public $fillable = ['original_image	', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6'];

    public static function save_jpeg_image($arr)
    {
        $image_1 = $arr;
        $org = time().'.'.'jpeg';
        $destinationPath = public_path('/images/Webimages');
        $image_1->move($destinationPath, $org);
        return   $org;

    }
    public static function save_wep_image($arr)
    {
        $image_1 = $arr;
        $org =Str::random(10) .'.'.'wep';
        $destinationPath = public_path('/images/Webimages');
        $image_1->move($destinationPath, $org);
        return  $org;

    }
    public static function save_namrmal_image($arr)
    {
        $image_1 = $arr;
        $org = time().'.'. $image_1->getClientOriginalExtension();
        $destinationPath = public_path('/images/Webimages');
        $image_1->move($destinationPath, $org);
        return  $org;

    }
}
