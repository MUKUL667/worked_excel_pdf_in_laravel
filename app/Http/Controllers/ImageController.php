<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use File;
use Illuminate\Support\Str;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
  public function index()
  {
    return view('image');
  }
  public function create( Request $request)
  {
    $data=new Image();




    $image_1 = $request->file('image');
    $org = Str::random(8).'.'.$image_1->getClientOriginalExtension();
    $destinationPath = public_path('\images\Webimages');
    $image_1->move($destinationPath, $org);
    $data->original_image=$org;

    for ($i=1;$i<4;$i++) {
        $org_1 = Str::random(8).'.'.'jpeg';
        $newimage=copy($destinationPath.'/'.$org, $destinationPath.'/'.$org_1 );
        $data['image_'.$i]=$org_1;
      }
      for ($i=4;$i<7;$i++) {
        $org_1 = Str::random(8).'.'.'webp';
        $newimage=copy($destinationPath.'/'.$org, $destinationPath.'/'.$org_1 );
        $data['image_'.$i]=$org_1;
      }

        $data->save();

    // $article = Image::where($ok->id)->update([
    //     'image_1' =>  $new_data_1,
    //     'image_2' =>  $new_data,
    //     'image_3' =>  '3',
    //     'image_4' =>  '4',
    //     'image_5' =>  '5',
    //     'image_6' =>  '6',
    //     'original_image' =>$new_data_2
    // ]);




        // $image_1 = $request->file('image');
        // $org = Str::random(8).'.'.$image_1->getClientOriginalExtension();
        // $destinationPath = public_path('/images/Webimages');
        // $image_1->move($destinationPath, $org);

        // $data->org=$org;

        // // jpg 90

    //     $jpeg90 = time().'jpeg90'.'.'.'jpeg';
    //     $destinationPath = public_path('/images/Webimages');
    //     $image_1->move($destinationPath, $jpeg90);



    //     // jpg 500
    //     $image_3 = $request->file('image');
    //     $jpeg500 = time().'jpeg500'.'.'.'jpeg';
    //     $destinationPath = public_path('/images/Webimages');
    //     $image_3->move($destinationPath, $jpeg500);

    //      // jpg 1000
    //      $image_4 = $request->file('image');
    //      $jpeg1000 = time().'jpeg1000'.'.'.'jpeg';
    //      $destinationPath = public_path('/images/Webimages');
    //      $image_4->move($destinationPath, $jpeg1000);



    //          // wepp 90
    //    $image_5 = $request->file('image');
    //     $webp90 = time().'webp90'.'.'.'webp';
    //     $destinationPath = public_path('/images/Webimages');
    //     $image_5->move($destinationPath, $webp90);

    //     // wepp 500
    //     $image_6 = $request->file('image');
    //     $webp500 = time().'webp500'.'.'.'webp';
    //     $destinationPath = public_path('/images/Webimages');
    //     $image_6->move($destinationPath, $webp500);

    //      // wepp 1000
    //      $image_7 = $request->file('image');
    //      $webp1000 = time().'webp1000'.'.'.'webp';
    //      $destinationPath = public_path('/images/Webimages');
    //      $image_7->move($destinationPath, $webp1000);


    //      $data->original_image=$org;

    // $data=Image::save_image($request->file('image'));

    //     // }
    //     $data->save();
    //     $status= Image::where('id',$data->id)->update([
    //         'image_1'=> $data,

    //        ]);


           return back();
  }
}
