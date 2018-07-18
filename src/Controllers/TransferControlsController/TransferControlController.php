<?php
namespace App\Controllers\TransferControlsController;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\GeneralModel;
use App\Config\Auth;

class TransferControlController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        $this->output_format = (new Auth)->output_format;
        $this->method_names = (new GeneralModel)->get_model_methods("TransferControlsModel\TransferControlModel");
    }

    public function checkBalance(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 1, 'GET');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function resendOtp(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 2, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function disableOtp(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 3, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function disableOtpFinalize(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 4, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function enableOtp(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 5, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

}