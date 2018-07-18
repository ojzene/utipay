<?php
namespace App\Models\MiscsModel;
use App\Config\Auth;
use App\Models\GeneralModel as GeneralModel;

class MiscModel
{
    public function __construct()
    {
        $this->address_url = (new Auth)->paygateway_url;
        $this->get_auth = (new Auth)->paygateway_secret_key;
    }

    public function listBank()
    {
        $json_request = (new GeneralModel)->httpGetWithHeader($this->address_url."bank",$this->get_auth);
        return json_decode($json_request, true);
    }

}