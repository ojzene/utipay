<?php
namespace App\Models\TransactionsModel;
use App\Config\Auth;
use App\Models\GeneralModel as GeneralModel;

class TransactionModel
{
    public function __construct()
    {
        $this->address_url = (new Auth)->paygateway_url;
        $this->get_auth = (new Auth)->paygateway_secret_key;
    }

    public function initializeTransaction($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transaction/initialize",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function verifyTransaction($data)
    {
        $parsed_attr = (string)$data[0];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."transaction/verify/".$parsed_attr,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function listTransaction()
    {
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."transaction",$this->get_auth);
        return json_decode($json_request, true);
    }

    public function fetchTransaction($data)
    {
        $parsed_attr = (string)$data[0];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."transaction/".$parsed_attr,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function chargeAuthorization($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transaction/charge_authorization",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function transactionTimeline($data)
    {
        $parsed_attr = (string)$data[0];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."transaction/timeline/".$parsed_attr,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function transactionTotal()
    {
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."transaction/totals",$this->get_auth);
        return json_decode($json_request, true);
    }

    public function exportTransaction()
    {
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."transaction/export",$this->get_auth);
        return json_decode($json_request, true);
    }

    public function requestReauthorization($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transaction/request_reauthorization",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function checkAuthorization($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transaction/check_authorization",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

}