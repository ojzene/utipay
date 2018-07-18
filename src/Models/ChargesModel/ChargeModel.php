<?php
namespace App\Models\ChargesModel;
use App\Config\Auth;
use App\Models\GeneralModel as GeneralModel;

class ChargeModel
{
    public function __construct()
    {
        $this->address_url = (new Auth)->paygateway_url;
        $this->get_auth = (new Auth)->paygateway_secret_key;
    }

    public function tokenize($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."charge/tokenize",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function charge($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."charge",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function submitPin($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."charge/submit_pin",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function submitOtp($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."charge/submit_otp",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function submitPhone($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."charge/submit_phone",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function submitBirthday($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."charge/submit_birthday",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function checkPending($data)
    {
        $parsed_attr = (string)$data[0];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."charge/".$parsed_attr,$this->get_auth);
        return json_decode($json_request, true);
    }

}