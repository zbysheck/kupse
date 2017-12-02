<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <table>
        <th width="100">nazwa</th>
        <th width="100">opis</th>
        <th width="100">strona</th>
        <th width="100">obrazek</th>
    @foreach($products as $product)
        <tr>
        <td>{{$product->title}}</td>
        <td>{{$product->description}}</td>
        <td><a href="{{$product->url}}">Kup {{$product->site_name ? ("w " . $product->site_name) : "online" }}</a></td>
        <td><img src="{{$product->image}}" height="100px"></td>
        </tr>
    @endforeach
    </table>
    <form method="post" action="">
        {{ csrf_field()}}
        <input type="text" name="url">
        <input type="submit">
    </form>

</body>
</html>