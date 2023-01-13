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
    $width=Image::make($image_1)->width();
    $org = Str::random(8).'.'.'png';
    $destinationPath = public_path('images');
    $image_1->move($destinationPath, $org);
    $data->original_image=$org;
    if($width<1200)
    {
    for ($i=1;$i<2;$i++) {
        $org_1 = Str::random(8).'.'.'400'.'.'.'jpeg';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }
    }

    if($width>1200 && $width<1920)
    {
    for ($i=2;$i<3;$i++) {
        $org_1 = Str::random(8).'.'.'1200'.'.'.'jpeg';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }
    }

    if($width>1920)
    {
    for ($i=3;$i<4;$i++) {
        $org_1 = Str::random(8).'.'.'1920'.'.'.'jpeg';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(1920, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }
    }

      if($width<1200)
    {
      for ($i=4;$i<5;$i++) {
        $org_1 = Str::random(8).'.'.'400'.'.'.'webp';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }
    }
    if($width>1200 && $width<1920)
    {
      for ($i=5;$i<6;$i++) {
        $org_1 = Str::random(8).'.'.'1200'.'.'.'webp';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.$i]=$org_1;
      }
    }
    if($width>1920)
    {
        for ($i=6;$i<7;$i++) {
            $org_1 = Str::random(8).'.'.'1920'.'.'.'webp';
            $image_resize = Image::make(public_path('images').'/'.$data->original_image);
            $image_resize->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save('images/'. $org_1 );
            $data['image_'.$i]=$org_1;
          }
    }

        $data->save();


           return back();
  }
   public function dynamic()
   {


        $data['option']=Image_New::select('original_image')->get();
        return response()->json($data);

   }
}
