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
<script>
    let usergaent=navigator.userAgent.toLowerCase();
    let browser;
    if(usergaent.search('safari') > -1 && !! window.safari ==true)
    {
        browser="safari";
    }
    else
    {
        browser="other";
    }


        const domain='https://assets.techtonic.asia';
        $( document ).ready(function() {
                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: "dynamiccontent",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'support': browser,
                    },
                    success: function(result) {


                                      $.each(result.option, function(key, value) {

                                        if(result.support=='jpg')
                                        {

                                                $.each(result.option, function(key, value) {
                                                    $("#test").append( '<div class="bhreveimg mx-2 my-2"><img class="" src="'+domain+'/images/' +
                                                            value.image_1 +
                                                            '"  alt="'+domain+'/images/' +
                                                            value.image_1 +
                                                            '"> </div>  </div>'
                                                    );
                                                })

                                        }
                                        if(result.support=='webp')
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
                                })

                    }
                });
            });
</script>


</html>
