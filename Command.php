<?php

abstract class Command
{
    
    private $docServer;
    
    public function __construct(DocServer $docServer)
    {
        $this->docServer = $docServer;
    }
    
    public function generate($id, $content)
    {
        
    }
    
    public function fetch($id)
    {
        
    }
    
    abstract protected function getFilaPrefix();
}