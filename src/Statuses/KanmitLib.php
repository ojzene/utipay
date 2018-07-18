<?php
namespace App\Statuses;

class KanmitLib
{
    public function merCode()
    {
        $merchantdetails = [
            "url" => "https://172.24.90.5:6543/MicroLoan?LOGIN=test&PASSWORD=c8a4ba359067e473",
            "live_url" => "40.68.250.245:4672/manager/index.php/api/v1",
            "msisdn" => "0000111101",
            "msisdnd" => "0000111102",
            "nickname" => "0000111101",
            "sms_host" => '196.46.244.58',
            "sms_port" => 31110,
            "sms_username" => "2343159ad",
            "sms_password" => "P9dbv/xgk",
            "sms_header" => "SmartLoan",
            "pin" => "1234",
            "staging_url" => "http://52.232.39.7:4672/aledinpay/api/v1"
        ];
        return $merchantdetails;
    }

    public function respCode()
    {
        $allcode = [
            "00" => "Operation Successful",
            "01" => "Operation Failed",
            "02" => "Operation Empty or null",
            "03" => "System Error",
            "04" => "No Loan Debtor Found",  // for Web backend
            "05" => "No Transaction Found",  // for Web backend
            "06" => "No Such Phone Number Found",  // for web backend
            "07" => "No Amount Found",
            "08" => "One of these Fields empty",
            "09" => "Outstanding Loan Available",
            "10" => "Amount Exceeds Loan Limit",
            "11" => "Dear Customer, You are not eligible for SmartCredit at this time. To qualify, continue using your Airtel line everyday", // Loan Request Not Eligible
            "12" => "Dear Customer, You have no outstanding debt on SmartCredit",  // No Record Of Active Loan
            "13" => "No Previous Transactions", // For Check Loan History
            "14" => "No Duration Provided" // For Check Loan History
        ];
        return $allcode;
    }
}