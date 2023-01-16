<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="content">
    <div class="container">
<div id="test" class="d-flex justify-content-center align-item-center ">

</div>
    </div>
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
        localStorage.setItem('mykey', mukul)
    });

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var k= 0;
        var s_data = localStorage.getItem('mykey');
        console.log(s_data);
        const domain='http://127.0.0.1:8000';
        $( document ).ready(function() {

                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: "dynamiccontent",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'support': s_data,
                    },
                    success: function(result) {
                        console.log(result);
                        if(result.support='webp')
                        {

                            if(true)
                            {
                                $.each(result.option, function(key, value) {

                                    $("#test").append( '<div class="bhreveimg mx-2 my-2"><img class="" src="'+domain+'/images/' +
                                            value.image_4 +
                                            '"  alt="'+domain+'/images/' +
                                            value.image_4 +
                                            '"> </div>  </div>'
                                    );

                                })
                            }

                        }
                        else
                        {


                                      $.each(result.option, function(key, value) {
                                        if(true)
                                {

                                                        $("#test").append( '<div class="bhreveimg mx-2 my-2"><img class="" src="'+domain+'/images/' +
                                                                value.image_1 +
                                                                '"  alt="'+domain+'/images/' +
                                                                value.image_1 +
                                                                '"> </div>  </div>'
                                                        );
                                }

                                })



                        }

                    }
                });
            });

</script>
</html>
