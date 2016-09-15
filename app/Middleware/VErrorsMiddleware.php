<?php
namespace Cart\Middleware;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterFace as Response;
use Psr\Http\Message\ServerRequestInterFace as Request;

class VErrorsMiddleware
{

    protected $view;
    public function __construct(Twig $view)
    {
        $this->view=$view;
    }
    public function __invoke($request,$response,$next)
    {
        if(isset($_SESSION['errors'])){
            $this->view->getEnvironment()->addGlobal('errors',$_SESSION['errors']);
            unset($_SESSION['errors']);
        }
        $response=$next($request,$response);
        return $response;
    }
}