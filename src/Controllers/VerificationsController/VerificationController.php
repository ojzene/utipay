<?php
namespace App\Controllers\VerificationsController;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\GeneralModel;
use App\Config\Auth;

class VerificationController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        $this->output_format = (new Auth)->output_format;
        $this->method_names = (new GeneralModel)->get_model_methods("VerificationsModel\VerificationModel");
    }

    public function resolveBvn(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 1, 'GET', '', 'bvn');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function matchBvn(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 2, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function resolveAccountNumber(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 3, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function resolveCardBin(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 4, 'GET', '', 'bin');
       } catch (\Exception $e) {
            return $e;
        }
    }

    public function resolvePhoneNumber(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 5, 'POST');
       } catch (\Exception $e) {
            return $e;
        }
    }

}