<?php

namespace Cart\Controllers;
use Slim\Router;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterFace as Response;
use Psr\Http\Message\ServerRequestInterFace as Request;
use Cart\Models\Product;

class ProductController
{
    protected $view;
    public function __construct(Twig $view){
        $this->view=$view;
    }
    public function get($slug,Request $request,Response $response,Twig $view,Product $product,Router $router)
    {
        $product = $product->where('slug','=',$slug)->first();
        if(!$product)
        {
            return $response->withRedirect($router->pathFor('home'));
        }
        return $this->view->render($response,'products/product.twig',['product'=>$product]
        );
    }
}