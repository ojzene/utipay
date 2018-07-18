<?php
namespace App\Models\VerificationsModel;
use App\Config\Auth;
use App\Models\GeneralModel as GeneralModel;

class VerificationModel
{
    public function __construct()
    {
        $this->address_url = (new Auth)->paygateway_url;
        $this->get_auth = (new Auth)->paygateway_secret_key;
    }

    public function resolveBvn($data)
    {
        $parsed_attr = (string)$data[0];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."bank/resolve_bvn/".$parsed_attr,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function matchBvn($data)
    {
        $parsed_body = json_decode(json_encode($data), true);
        $account_number = $parsed_body['account_number'];
        $bank_code = $parsed_body['bank_code'];
        $bvn = $parsed_body['bvn'];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."bank/match_bvn?account_number=".$account_number."&bank_code=".$bank_code."&bvn=".$bvn,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function resolveAccountNumber($data)
    {
        $parsed_body = json_decode(json_encode($data), true);
        $account_number = $parsed_body['account_number'];
        $bank_code = $parsed_body['bank_code'];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."bank/resolve?account_number=".$account_number."&bank_code=".$bank_code,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function resolveCardBin($data)
    {
        $parsed_attr = (string)$data[0];
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."decision/bin/".$parsed_attr,$this->get_auth);
        return json_decode($json_request, true);
    }

    public function resolvePhoneNumber($data)
    {
        $parsed_body = json_encode($data);
        $json_request = (new GeneralModel)->httpPostWithHeader($this->address_url."verifications",$parsed_body,$this->get_auth);
        return json_decode($json_request, true);
    }

}