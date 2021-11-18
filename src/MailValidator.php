<?php

class MailValidator
{
    private $regExp = '/^(([\wА-Яа-я]{1,})@([\wА-Яа-я]{1,}\.)+[A-Za-zА-Яа-я]{2,})$/ui';
    private $mailAddress;

    public function validate($mailAddress)
    {
        $this->mailAddress = $mailAddress;
        if($this->validateMailAddress()) {
            if ($this->checkMXRecord()) {
                throw new \Exception('Mail is valid');
            }
        }
        throw new \Exception('Mail is invalid');
    }

    private function validateMailAddress()
    {
        return preg_match($this->regExp, $this->mailAddress);
    }
    
    private function checkMxRecord()
    {
        $arMailAddress = explode('@', $this->mailAddress);
        return getmxrr($arMailAddress[1], $hosts);
    }
}
