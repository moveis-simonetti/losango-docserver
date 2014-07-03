<?php

namespace Simonetti\Losango\DocServer\Document;

use Simonetti\Losango\DocServer\Document as DocumentAbstract;

class SeguroDocument extends DocumentAbstract
{
    protected function getFilePrefix()
    {
        return 'seguro-';
    }
    
    protected function getBin()
    {
        return 'seguro/bin/gerar.sh';
    }
}