<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Bootply snippet - Bootstrap Slider / carousel with thumbnail navigation</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap twitter bootstrap slider with carousel navigation example." />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  
    <!-- CSS code from Bootply.com editor -->

    <style type="text/css">
        .selected img {
            opacity:0.5;
        }

        .carousel-inner>.item>img, .carousel-inner>.item>a>img{
            height:150px;
            weight:175px;
        }
    </style>
</head>

<!-- HTML code from Bootply.com editor -->

<body >
<?php use App\Http\Controllers\GirlsController;
$test=GirlsController::testFunction();
//  echo $test;
$vip=GirlsController::getVip();
echo "vip names:";
echo "<br>";
foreach ($vip as $vipGirl){
    echo $vipGirl->name;
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6" id="slider">
            <div class="col-md-6" id="carousel-bounding-box">
                <div id="myCarousel" class="carousel slide" data-interval="5000" data-ride="carousel">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item" data-slide-number="0">
                            <a href="{{route('createGirlPage')}}">
                                <img  src="<?php echo asset("public/images/anketa.jpeg")?>" class="img-responsive"  >
                              </a>
                        </div>

                        @foreach($vip as $girl)
                            <div class="item" data-slide-number="0">
                                <a href="{{route('showGirl',['id'=>$girl->id])}}">
                                    <img  src="<?php echo asset("public/images/upload/$girl->main_image")?>" class="img-responsive" >
                             </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- main slider carousel nav controls -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>

                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!--/main slider carousel-->

</div>

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>







<!-- JavaScript jQuery code from Bootply.com editor  -->

<script type='text/javascript'>

    $(document).ready(function() {

        $('#myCarousel').carousel({
            interval: 4000
        });

// handles the carousel thumbnails
        $('[id^=carousel-selector-]').click( function(){
            var id_selector = $(this).attr("id");
            var id = id_selector.substr(id_selector.length -1);
            id = parseInt(id);
            $('#myCarousel').carousel(id);
            $('[id^=carousel-selector-]').removeClass('selected');
            $(this).addClass('selected');
        });

// when the carousel slides, auto update
        $('#myCarousel').on('slid', function (e) {
            var id = $('.item.active').data('slide-number');
            id = parseInt(id);
            $('[id^=carousel-selector-]').removeClass('selected');
            $('[id=carousel-selector-'+id+']').addClass('selected');
        });

    });

</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-40413119-1', 'bootply.com');
    ga('send', 'pageview');
</script>


</body>
</html>