<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV to Database in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div class="container mt-5 text-center id="droppable">

        <div class="d-flex">
            <button type="button" class="btn btn-primary" id="data" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
              </button>

        </div>

            <div class="modal left fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Media Library</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div><div class="modal-body "><ul class="data_pend" id="media-gallery"></ul></div></div> </div> </div></div>


        <form action="{{ route('savetest') }}"   method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;"  >
                <div class="custom-file text-left">
                    <input type="file" name="image"  id="drop-zone" >
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary">Import data</button>
        </form>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
  var domain='http://127.0.0.1:8000'
  var data=[];

        $("#data").click(function() {
            $(".data_pend").empty();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('dynamic_contact') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': 'all',
                },
                success: function(result) {
                    $.each(result.option, function(key, value) {

                            $(".data_pend").append(
                                ' <li class="bhreveimg"><img  class="media-thumbnail" src="'+domain+'/images/' +
                                    value.original_image +
                                    '"  alt="'+domain+'/images/' +
                                    value.original_image +
                                    '"> </li>');

                    })
                }
            });
        });
    </script>
    <script>


        $('.data_pend').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old',
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10
        });

</script>
</html>
