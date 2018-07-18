<?php
namespace App\Models\TransfersModel;
use App\Config\Auth;
use App\Models\GeneralModel as GeneralModel;

class TransferModel
{
    public function __construct()
    {
        $this->address_url = (new Auth)->paygateway_url;
        $this->get_auth = (new Auth)->paygateway_secret_key;
    }

    public function initiateTransfer($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transfer",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function listTransfer()
    {
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."transfer",$this->get_auth);
        return json_decode($json_request, true);
    }

    public function fetchTransfer($data)
    {
        $parsed_attr = (string)$data[0];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."transfer/".$parsed_attr,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function finalizeTransfer($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transfer/finalize_transfer",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function bulkTransfer($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."transfer/bulk",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

}