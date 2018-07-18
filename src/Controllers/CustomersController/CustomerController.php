<?php
namespace App\Controllers\CustomersController;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\GeneralModel;
use App\Config\Auth;

class CustomerController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        $this->output_format = (new Auth)->output_format;
        $this->method_names = (new GeneralModel)->get_model_methods("CustomersModel\CustomerModel");
    }

    public function createCustomer(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 1, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function listCustomer(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 2, 'GET');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function fetchCustomer(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 3, 'GET', '','id');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function updateCustomer(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 4, 'PUT', '','id');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function setCustomerRiskAction(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 5, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function deactivateAuthorization(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 6, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

}