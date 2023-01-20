<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="content">
    <div class="container">
<div id="test" class="d-flex justify-content-center align-item-center flex-wrap ">

</div>
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/modernizr-custom.js') }}"></script>

<script>
   var domain='https://assets.techtonic.asia'
  Modernizr.on('webp', function (result) {
    $.ajax({
      type: "get",
      dataType: "json",
      url: "dynamiccontent",
      data: {
          "_token": "{{ csrf_token() }}",
      },
      success: function(data) {

    if(result)
    {
      $.each(result.option, function(key, value) {


        $("#test").append('<div class="bhreveimg mx-2 my-2"><img src="'+domain+'/images/' +
          value.image_4 +
          '" ></img></div>  </div>'
        );




})
    }
    else{
      $.each(result.option, function(key, value) {


        $("#test").append('<div class="bhreveimg mx-2 my-2"><img src="'+domain+'/images/' +
          value.image_1+
          '" ></img></div>  </div>'
        );




})
    }
  }
  })
});
</script>



</html>
