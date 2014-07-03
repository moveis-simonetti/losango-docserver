<?php

namespace Simonetti\Losango\DocServer\Document;

use Simonetti\Losango\DocServer\Document as DocumentAbstract;

class CDebitoDocument extends DocumentAbstract
{
    protected function getFilePrefix()
    {
        return 'cdebito-';
    }
    
    protected function getBin()
    {
        return 'cdebito/bin/gerar.sh';
    }
}