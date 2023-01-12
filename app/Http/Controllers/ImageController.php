<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use App\Models\Image_New;

use Illuminate\Http\Request;

class ImageController extends Controller
{
  public function index()
  {
    return view('image');
  }
  public function create( Request $request)
  {
    $data=new Image_New();

    $image_1 = $request->file('image');
    $org = Str::random(8).'.'.'png';
    $destinationPath = public_path('images');
    $image_1->move($destinationPath, $org);
    $data->original_image=$org;

    for ($i=1;$i<2;$i++) {
        $org_1 = Str::random(8).'.'.'jpeg';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }

    for ($i=2;$i<3;$i++) {
        $org_1 = Str::random(8).'.'.'jpeg';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }

    for ($i=3;$i<4;$i++) {
        $org_1 = Str::random(8).'.'.'jpeg';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }
      for ($i=4;$i<5;$i++) {
        $org_1 = Str::random(8).'.'.'webp';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }
      for ($i=5;$i<6;$i++) {
        $org_1 = Str::random(8).'.'.'webp';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }
      for ($i=6;$i<7;$i++) {
        $org_1 = Str::random(8).'.'.'webp';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }
        $data->save();


           return back();
  }
}
