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


  public function _index()
  {
    return view('dynamic');
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

    // ################# original web version####################

        $org_1 = Str::random(8).'.'.'webp';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);;
        $image_resize->save('images/'. $org_1 );
        $data['image_'.'0']=$org_1;

    for($i=0;$i<1;$i++)
    {
        if($width<1200)
        {

            $org_1 = Str::random(8).'_'.'480'.'.'.'webp';
            $image_resize = Image::make(public_path('images').'/'.$data->original_image);
            $image_resize->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save('images/'. $org_1 );
            $data['image_'.'4']=$org_1;

        }

        if($width>1200 && $width<=1920)
        {

                $org_1 = Str::random(8).'_'.'480'.'.'.'webp';
                $image_resize = Image::make(public_path('images').'/'.$data->original_image);
                $image_resize->resize(480, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save('images/'. $org_1 );
                $data['image_'.'4']=$org_1;


                $org_1 = Str::random(8).'_'.'1200'.'.'.'webp';
                $image_resize = Image::make(public_path('images').'/'.$data->original_image);
                $image_resize->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save('images/'. $org_1 );
                $data['image_'.'5']=$org_1;

        }

        if($width>1920)
        {

                    $org_1 = Str::random(8).'_'.'480'.'.'.'webp';
                    $image_resize = Image::make(public_path('images').'/'.$data->original_image);
                    $image_resize->resize(480, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save('images/'. $org_1 );
                    $data['image_'.'4']=$org_1;


                    $org_1 = Str::random(8).'_'.'1200'.'.'.'webp';
                    $image_resize = Image::make(public_path('images').'/'.$data->original_image);
                    $image_resize->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save('images/'. $org_1 );
                    $data['image_'.'5']=$org_1;


                $org_1 = Str::random(8).'_'.'1920'.'.'.'webp';
                $image_resize = Image::make(public_path('images').'/'.$data->original_image);
                $image_resize->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save('images/'. $org_1 );
                $data['image_'.'6']=$org_1;

        }
    }

// ##################jpg############
for($i=1;$i<2;$i++)
{
    if($width<1200)
    {

        $org_1 = Str::random(8).'_'.'480'.'.'.'jpg';
        $image_resize = Image::make(public_path('images').'/'.$data->original_image);
        $image_resize->resize(480, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save('images/'. $org_1 );
        $data['image_'.'1']=$org_1;

    }


    if($width>1200 && $width<=1920)
    {

            $org_1 = Str::random(8).'_'.'480'.'.'.'jpg';
            $image_resize = Image::make(public_path('images').'/'.$data->original_image);
            $image_resize->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save('images/'. $org_1 );
            $data['image_'.'1']=$org_1;



            $org_1 = Str::random(8).'_'.'1200'.'.'.'jpg';
            $image_resize = Image::make(public_path('images').'/'.$data->original_image);
            $image_resize->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save('images/'. $org_1 );
            $data['image_'.'2']=$org_1;


    }

    if($width>1920)
    {

            $org_1 = Str::random(8).'_'.'480'.'.'.'jpg';
            $image_resize = Image::make(public_path('images').'/'.$data->original_image);
            $image_resize->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save('images/'. $org_1 );
            $data['image_'.'1']=$org_1;



            $org_1 = Str::random(8).'_'.'1200'.'.'.'jpg';
            $image_resize = Image::make(public_path('images').'/'.$data->original_image);
            $image_resize->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save('images/'. $org_1 );
            $data['image_'.'2']=$org_1;


            $org_1 = Str::random(8).'_'.'1920'.'.'.'jpg';
            $image_resize = Image::make(public_path('images').'/'.$data->original_image);
            $image_resize->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save('images/'. $org_1 );
            $data['image_'.'3']=$org_1;

    }
}

    // #####################webp#################


        $data->save();


           return back();
  }
   public function dynamic(Request $request)
   {


            $data['option']=Image_New::select('image_4')->get();
            return response()->json($data);




   }
   public function _dynamic(Request $request)
   {


            $data['option']=Image_New::select('image_1')->get();
            return response()->json($data);




   }


   public function view()
   {
    $data=Image_New::select('original_image','id')->get();
    return view('table',compact('data'));
   }
   public function destroy(Request $request,$id)
   {
       $i = Image_New::findOrFail($id);

        $i->delete();

       return redirect('/test');
   }
}
