<?php
namespace App\Controllers\TransferRecipientsController;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\GeneralModel;
use App\Config\Auth;

class TransferRecipientController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        $this->output_format = (new Auth)->output_format;
        $this->method_names = (new GeneralModel)->get_model_methods("TransferRecipientsModel\TransferRecipientModel");
    }

    public function createRecipient(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 1, 'POST');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function listRecipient(Request $request, Response $response)
    {
        try {
            return (new GeneralModel)->reqres_parser($request, $response, $this->method_names, 2, 'GET');
       } catch (\Exception $e) {
            return $e;
        }
    }
    
}