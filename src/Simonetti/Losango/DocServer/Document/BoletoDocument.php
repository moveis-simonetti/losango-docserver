<?php

namespace Simonetti\Losango\DocServer\Document;

use Simonetti\Losango\DocServer\Document as DocumentAbstract;

class BoletoDocument extends DocumentAbstract
{
    protected function getFilePrefix()
    {
        return 'boleto-';
    }
    
    protected function getBin()
    {
        return 'boleto/bin/gerar.sh';
    }
}