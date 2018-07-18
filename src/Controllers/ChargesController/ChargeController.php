<?php
namespace App\Controllers\ChargesController;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\GeneralModel;
use App\Config\Auth;

class ChargeController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        $this->output_format = (new Auth)->output_format;
        $this->method_names = (new GeneralModel)->get_model_methods("ChargesModel\ChargeModel");
    }

    public function tokenize(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 1, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function charge(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 2, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function submitPin(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 3, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function submitOtp(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 4, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function submitPhone(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 5, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function submitBirthday(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 6, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function checkPending(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 7, 'GET', '','reference');
        } catch (\Exception $e) {
            return $e;
        }
    }

}