<?php
namespace App\Models\TransferRecipientsModel;
use App\Config\Auth;
use App\Models\GeneralModel as GeneralModel;

class TransferRecipientModel
{
    public function __construct()
    {
        $this->address_url = (new Auth)->paygateway_url;
        $this->get_auth = (new Auth)->paygateway_secret_key;
    }

    public function createRecipient($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transferrecipient",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function listRecipient()
    {
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."transferrecipient",$this->get_auth);
        return json_decode($json_request, true);
    }

}