<?php

namespace cmq\sdk;

final class Signature
{
    private $Secretkey;
    private $SignatureMethod;

    public function __construct()
    {
        $this->Secretkey = config('cmq.secret_key');
        $this->SignatureMethod = config('cmq.signature_method');
    }

}