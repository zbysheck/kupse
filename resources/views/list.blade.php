<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='http://codepen.io/ChynoDeluxe/pen/eJPeEL'>

    <link rel="stylesheet" href="css/style.css">

    <meta property="og:description">super fajna lista prezentów</head>
    <meta property="og:title">Pysiolista</head>
</head>
<body>
    @foreach($products as $product)
        <div class="blog-card" style="background: url('{{$product->image}}') left no-repeat; background-size: 33% ">
            <div class="photo photo1"></div>
            <ul class="details">
             @if(false)
                <li class="author"><a href="#">John Doe</a></li>
                <li class="date">Aug. 24, 2015</li>
                <li class="tags">
                    <ul>
                        <li><a href="#">Learn</a></li>
                        <li><a href="#">Code</a></li>
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                    </ul>
                </li>
                 @endif
                <li></li>
            </ul>
            <div class="description">
                <h1>{{str_limit($product->title, 30)}}</h1>
                <h2>{{$product->price ?: '~'}} zł</h2>
                <p class="summary">{{str_limit($product->description, 120)}}</p>
                <a href="{{$product->url}}">Kup {{$product->site_name ? ("w " . $product->site_name) : "online" }}</a>
            </div>
        </div>
    @endforeach

    <form method="post" action="">
        {{ csrf_field()}}
        <input type="text" name="url">
        <input type="submit">
    </form>

</body>
</html>