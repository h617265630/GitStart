<?php

namespace Cart\Controllers;

use Psr\http\Message\ResponseInterface as Response;
use Braintree_ClientToken;
class BraintreeController
{
    public function token(Response $response)
    {
        return $response->withJson([
            'token'=>Braintree_ClientToken::generate()
        ]);
    }
    
}