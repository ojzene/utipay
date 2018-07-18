<?php
namespace App\Controllers\TransfersController;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\GeneralModel;
use App\Config\Auth;

class TransferController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        $this->output_format = (new Auth)->output_format;
        $this->method_names = (new GeneralModel)->get_model_methods("TransfersModel\TransferModel");
    }

    public function initiateTransfer(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 1, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function listTransfer(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 2, 'GET', '','reference');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function fetchTransfer(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 3, 'GET', '','code');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function finalizeTransfer(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 4, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function bulkTransfer(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 5, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }
    
}