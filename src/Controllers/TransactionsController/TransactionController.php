<?php
namespace App\Controllers\TransactionsController;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\GeneralModel;
use App\Config\Auth;

class TransactionController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        $this->output_format = (new Auth)->output_format;
        $this->method_names = (new GeneralModel)->get_model_methods("TransactionsModel\TransactionModel");
    }

    public function initializeTransaction(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 1, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function verifyTransaction(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 2, 'GET', '','reference');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function listTransaction(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 3, 'GET');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function fetchTransaction(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 4, 'GET', '','id');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function chargeAuthorization(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 5, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function transactionTimeline(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 6, 'GET', '','reference');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function transactionTotal(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 7, 'GET');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function exportTransaction(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 8, 'GET');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function requestReauthorization(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 9, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function checkAuthorization(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 10, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

}