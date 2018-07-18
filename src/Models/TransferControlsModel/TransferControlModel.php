<?php
namespace App\Models\TransferControlsModel;
use App\Config\Auth;
use App\Models\GeneralModel as GeneralModel;

class TransferControlModel
{
    public function __construct()
    {
        $this->address_url = (new Auth)->paygateway_url;
        $this->get_auth = (new Auth)->paygateway_secret_key;
    }

    public function checkBalance()
    {
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."balance",$this->get_auth);
        echo $json_request;
    }

    public function resendOtp($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transfer/resend_otp",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function disableOtp()
    {
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transfer/disable_otp","",$this->get_auth);
        return json_decode($json_request, true);
    }

    public function disableOtpFinalize($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transfer/disable_otp_finalize",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function enableOtp($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transfer/enable_otp",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

}