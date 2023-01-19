<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV to Database in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">



    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div class="container mt-5 text-center" id="droppable">


        <form action="{{ route('savetest') }}"   method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;"  >

                    <input type="file" name="image" >
            </div>
            <button class="btn btn-primary">Import data</button>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    let support=1;
     let data=''
    $( document ).ready(function() {

        let useWebp = false;
        if (typeof document === 'object') {
          // Client side rendering
          const canvas = document.createElement('canvas');

          if (
            canvas.getContext &&
            canvas.getContext('2d') &&
            canvas.toDataURL('image/webp').indexOf('data:image/webp') === 0
          ) {
            useWebp = true;
          }
        }
        localStorage.setItem('mykey', useWebp)
    });
    var s_data = localStorage.getItem('mykey');

</script>

</html>
