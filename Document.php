<?php

abstract class Document
{
    
    private $docServer;
    
    public function __construct(DocServer $docServer)
    {
        $this->docServer = $docServer;
    }
    
    public function generate($id, $content)
    {
        //$this->docServer->
    }
    
    public function fetch($id)
    {
        
    }
    
    abstract protected function getFilePrefix();
    
    abstract protected function getBin();
}