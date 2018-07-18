<?php

if ($mode == 'production' || $mode == 'debug')
{
    // ALEDIN LOAN MANAGER/COMVIVA API ROUTES
    $app->group('/api', function () use ($app) {
        $app->group('/v1', function () use ($app){

            $app->group('/transaction', function () use ($app){
                $app->post('/initialize', 'TransactionController:initializeTransaction');
                $app->get('/verify/{reference}', 'TransactionController:verifyTransaction');
                $app->get('/list', 'TransactionController:listTransaction');
                $app->get('/fetch/{id}', 'TransactionController:fetchTransaction');
                $app->post('/charge_authorization', 'TransactionController:chargeAuthorization');
                $app->get('/timeline/{reference}', 'TransactionController:transactionTimeline');
                $app->get('/total', 'TransactionController:transactionTotal');
                $app->get('/export', 'TransactionController:exportTransaction');
                $app->post('/request_reauthorization', 'TransactionController:requestReauthorization');
                $app->post('/check_authorization', 'TransactionController:checkAuthorization');
            });

            $app->group('/customer', function () use ($app){
                $app->post('', 'CustomerController:createCustomer');
                $app->get('/list', 'CustomerController:listCustomer');
                $app->get('/fetch/{id}', 'CustomerController:fetchCustomer');
                $app->put('/update/{id}', 'CustomerController:updateCustomer');
                $app->post('/setCustomerRiskAction', 'CustomerController:setCustomerRiskAction');
                $app->post('/deactivate_authorization', 'CustomerController:deactivateAuthorization');
            });

            $app->group('/charge', function () use ($app){
                $app->post('', 'ChargeController:charge');
                $app->post('/tokenize', 'ChargeController:tokenize');
                $app->post('/submit_pin', 'ChargeController:submitPin');
                $app->post('/submit_otp', 'ChargeController:submitOtp');
                $app->post('/submit_phone', 'ChargeController:submitPhone');
                $app->post('/submit_birthday', 'ChargeController:submitBirthday');
                $app->get('/{reference}', 'ChargeController:checkPending');
            });

            $app->group('/transferrecipient', function () use ($app){
                $app->post('', 'TransferRecipientController:createRecipient');
                $app->get('', 'TransferRecipientController:listRecipient');
            });

            $app->group('/transfer', function () use ($app){
                $app->post('/initiate', 'TransferController:initiateTransfer');
                $app->get('/list', 'TransferController:listTransfer');
                $app->get('/fetch/{code}', 'TransferController:fetchTransfer');
                $app->post('/finalize_transfer', 'TransferController:finalizeTransfer');
                $app->post('/bulk', 'TransferController:bulkTransfer');
            });

            $app->get('/balance', 'TransferControlController:checkBalance');

            $app->group('/transfer', function () use ($app){
                $app->post('/resend_otp', 'TransferControlController:resendOtp');
                $app->post('/disable_otp', 'TransferControlController:disableOtp');
                $app->post('/disable_otp_finalize', 'TransferControlController:disableOtpFinalize');
                $app->post('/enable_otp', 'TransferControlController:enableOtp');
            });

            $app->group('/bank', function () use ($app){

                $app->get('', 'MiscController:listBank');

                $app->get('/resolve_bvn/{bvn}', 'VerificationController:resolveBvn');
                $app->post('/match_bvn', 'VerificationController:matchBvn');
                $app->post('/resolve', 'VerificationController:resolveAccountNumber');
                $app->post('/decision/bin/{bin}', 'VerificationController:resolveCardBin');
                $app->post('/verifications', 'VerificationController:resolvePhoneNumber');
            });


        });
    });
}