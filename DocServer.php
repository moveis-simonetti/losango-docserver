<?php

class DocServer
{
    
    private $session;
    
    /**
     * @var Configutarion
     */
    private $configuration;
    
    public function __construct($session, $configuration)
    {
        $this->session = $session;
        $this->configuration = $configuration;
    }
    
    public function fetchFile($name)
    {
        $filename = $this->configutarion->getDirectory() . '/resp/' . $name;
        if( false === $this->session->getSftp()->exists($filename) ) {
            return false;
        }
        
        $return = $this->session->getSftp()->read(
            $this->configutarion->getDirectory() . '/req/' . $name,
            $content
        );
        
        if(false == $return)
        {
            // todo: exception
        }
        
        return $return;
    }
    
    public function sendFile($name, $content)
    {
        $return = $this->session->getSftp()->write(
            $this->configutarion->getDirectory() . '/req/' . $name,
            $content
        );
        
        if(false == $return)
        {
            // todo: exception
        }
    }
    
    public function runCommand($command)
    {
        $this->session->getSsh()->run(
            $this->configuration->getDirectory() . trim($command)
        );
    }
}