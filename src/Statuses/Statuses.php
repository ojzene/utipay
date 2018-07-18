<?php
    namespace App\Statuses;

    class Statuses
    {
        public function errorCodes()
        {
            $code_array =
                [
                    4001 => "Token cannot be found in the database",
                    4002 => "Token has expired",
                    4003 => "Phone number not found",
                    4004 => "Token for this phone number doesn't exist",
                    4005 => "Phone number already existed in the database",
                    6099 => "Date is required",
                    6088 => "Date not properly formatted, the proper formate is ",
                    6006 => "Some keys or fields are missing",
                    5005 => "Bad request or one of the fields empty",
                    5008 => "Request(s) not allowed",
                    5009 => "Deletion successful",
                    5010 => "operation successful",
                    5011 => "operation failed",
                    7003 => "Client has no incoming shipment",
                    7004 => "User details already existed",
                    7005 => "User details does not exist", // Pin does not exist
                    7006 => "Field cannot be empty",
                    7007 => "pin is blocked",
                    7008 => "Pin is unblocked",
                    7009 => "Pin must be 4 digit ",
                    7011 => "Pin is unlocked but 0000",
                    8002 => "Client not verified",
                    8003 => "Account number is valid",
                    8004 => "Account details successfully updated",
                    8005 => "Account details has not been added",
                    8006 => "Empty Body",
                    8007 => "Account details was successfully added",
                    8008 => "Account details has already been added",
                    8009 => "Card details was successfully added",
                    8010 => "Card details has already been added",
                    8011 => "Card details has not been added",
                    8012 => "Oops this is embarrassing, for some reason we're unable to process your request.",
                    8013 => "Page not found",
                    8014 => "Card details has just been successfully updated",
                    8050 => "We're currently undergoing maintenance, be back with you shortly",
                    8080 => "Method not allowed",
                    8081 => "Error! Please check your internet connection",
                    8082 => "Error! Invalid Request",
                ];
            return $code_array;
        }

        public function getStatusError()
        {
            $status_array =
                [
                    6000 => true,
                    6001 => false
                ];

            return $status_array;
        }

        public function getStatus($code, $object_response=null)
        {
            $code_array = $this->getStatusError();
            $status = $code_array[$code];
            $statusHandler = [ 'code' => $code,'success' => $status, 'data' => $object_response];
            return $statusHandler;
        }

        public function addrStatus($code, $object_response=null)
        {
            $code_array = $this->errorCodes();
            $status = $code_array[$code];
            $statusHandler = [ 'code' => $code,'success' => $status, 'data' => $object_response];
            return $statusHandler;
        }

        public function pageListStatus($statuses, $page=null, $limit=null, $object_response=null)
        {
            $status_array = $this->getStatusError();
            $status = $status_array[$statuses];
            $statusHandler = [ 'success' => $status, 'code' => $statuses, 'page' => $page, 'items_per_page' => $limit, 'data' => $object_response];
            return $statusHandler;
        }

        public function getStatusWithError($statuses, $code)
        {
            $status_array = $this->getStatusError();
            $status = $status_array[$statuses];
            $code_array = $this->errorCodes();
            $status_code = $code_array[$code];
            $statusHandler = [ 'success' => $status, 'code' => $code, 'data' => $status_code ];
            return $statusHandler;
        }

        public function getStatusWithErrors($statuses, $code, $error)
        {
            $status_array = $this->getStatusError();
            $status = $status_array[$statuses];
            $code_array = $this->errorCodes();
            $status_code = $code_array[$code];
            $statusHandler = [ 'success' => $status, 'code' => $code, 'data' => $error];
            return $statusHandler;
        }

        public function getStatusWithErrorAndData($statuses, $code, $format)
        {
            $status_array = $this->getStatusError();
            $status = $status_array[$statuses];
            $code_array = $this->errorCodes();
            $status_code = $code_array[$code];
            $statusHandler = [ 'success' => $status, 'code' => $code, 'data' => $status_code.$format];
            return $statusHandler;
        }

        public function getSmsConfig() {
            $smsarr = [
                "sms_host" => '196.46.244.58',
                "sms_port" => 31110,
                "sms_username" => "2343159ad",
                "sms_password" => "P9dbv/xgk",
                "sms_header" => "SmartLoan"
            ];
            return $smsarr;
        }

    }