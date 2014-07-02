<?php

class DocServer
{
    
    private $session;
    
    private $configuration;
    
    public function __construct($session, $configuration)
    {
        $this->session = $session;
        $this->configuration = $configuration;
    }
    
    public function fetchFile($name)
    {
        
    }
    
    public function sendFile($name, $content)
    {
        
    }
    
    public function runCommand($command)
    {
        
    }
}