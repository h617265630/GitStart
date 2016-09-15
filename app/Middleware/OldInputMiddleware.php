<?php
namespace Cart\Middleware;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterFace as Response;
use Psr\Http\Message\ServerRequestInterFace as Request;

class OldInputMiddleware
{

    protected $view;
    public function __construct(Twig $view)
    {
        $this->view=$view;
    }
    public function __invoke($request,$response,$next)
    {
        if(isset($_SESSION['old'])){
            $this->view->getEnvironment()->addGlobal('old',$_SESSION['old']);
        }
        $_SESSION['old']=$request->getParams();
        $response=$next($request,$response);
        return $response;
    }
}