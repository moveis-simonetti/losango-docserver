<?php

namespace Simonetti\Losango\DocServer;

use Ssh\Session;

class DocServer
{
    /**
     * @var \Ssh\Session
     */
    private $session;
    
    /**
     * @var Configutarion
     */
    private $configuration;
    
    public function __construct(Session $session, Configuration $configuration)
    {
        $this->session = $session;
        $this->configuration = $configuration;
    }
    
    public function fetchFile($name)
    {
        $filename = $this->configuration->getDirectory() . '/resp/' . $name;
        if( false === $this->session->getSftp()->exists($filename) ) {
            return false;
        }
        
        $return = $this->session->getSftp()->read($filename);
        
        if(false == $return)
        {
            // todo: exception
        }
        
        return $return;
    }
    
    public function sendFile($name, $content)
    {
        $filapath = $this->configuration->getDirectory() . '/req/' . $name;

        $return = $this->session->getSftp()->write(
            $this->configuration->getDirectory() . '/req/' . $name,
            $content
        );
        
        if(false == $return)
        {
            // todo: exception
        }

        return $filapath;
    }
    
    public function runCommand($command)
    {
        return $this->session->getExec()->run(
            $this->configuration->getDirectory() . trim($command)
        );
    }
}