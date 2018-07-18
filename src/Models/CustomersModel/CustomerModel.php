<?php
namespace App\Models\CustomersModel;
use App\Config\Auth;
use App\Models\GeneralModel as GeneralModel;

class CustomerModel
{
    public function __construct()
    {
        $this->address_url = (new Auth)->paygateway_url;
        $this->get_auth = (new Auth)->paygateway_secret_key;
    }

    public function createCustomer($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."customer",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function listCustomer()
    {
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."customer",$this->get_auth);
        return json_decode($json_request, true);
    }

    public function fetchCustomer($data)
    {
        $parsed_attr = (string)$data[0];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."customer/".$parsed_attr,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function updateCustomer($data)
    {
        $parsed_attr = (string)$data[0];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."customer/".$parsed_attr,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function setCustomerRiskAction($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."customer/set_risk_action",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function deactivateAuthorization($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."customer/deactivate_authorization",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

}