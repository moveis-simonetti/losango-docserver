<?php
class BoletoDocument extends Document
{
    protected function getFilePrefix()
    {
        return 'boleto-';
    }
    
    protected function getBin()
    {
        return 'boleto/gerar.sh';
    }
}