<?php

namespace SOSBicho\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use \Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function errorMessage(Exception $exception)
    {
        $errorMessage = "Ocorreu um erro. {$exception->getMessage()}";
        return back()->with(compact('errorMessage'));
    }

    protected function successMessage($successMessage, $route, $routeParameters = [])
    {
        return redirect()->route($route, $routeParameters)->with(compact('successMessage'));
    }
}
