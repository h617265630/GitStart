<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/09/2016
 * Time: 12:05 AM
 */
namespace App\Exceptions;
use App\Exceptions\Contracts\HandlerInterface;

class EmptyBasket implements HandlerInterface
{
    public function handle($event)
    {
        echo('empty baskte');
    }
}