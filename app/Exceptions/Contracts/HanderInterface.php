<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/09/2016
 * Time: 12:03 AM
 */
namespace App\Exceptions\Contracts;

interface HandlerInterface
{
    public function handle($event);
}