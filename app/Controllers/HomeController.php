<?php

namespace Cart\Controllers;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterFace as Response;
use Psr\Http\Message\ServerRequestInterFace as Request;
use Cart\Models\Product;
use Cart\Basket\Basket;
class HomeController
{
    public function index(Request $request,Response $response,Twig $view,Product $product,Basket $basket)
    {
        
        $products = $product->all();

        return $view->render($response,'home.twig',
            ['products'=>$products]);
    }
}