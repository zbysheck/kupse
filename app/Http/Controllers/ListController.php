<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Fusonic\OpenGraph\Consumer;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function show(){
        $products = Product::all();

        return view('list', ['products' => $products]);
    }

    public function post(Request $request){
        //var_dump($request);
        $url = $request->input("url");
        $consumer = new Consumer();
        $consumer->useFallbackMode = true;
        $object = $consumer->loadUrl($url);
        //dd(1);
        //dd($url);

        //dd($object);
        $product =Product::firstOrCreate([
            'title' => $object->title,
            'url' => $object->url,
        ]);
        $product->title = $object->title;
        $product->description = $object->description;
        $product->image = $object->images[0]->url;
        $product->site_name = $object->siteName;
        $product->save();
        return $this->show();
    }
}
