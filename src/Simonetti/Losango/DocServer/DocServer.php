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
            throw new \Exception("Erro ao ler o arquivo. Metodo: " . __METHOD__);
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
            throw new \Exception("Erro ao escrever o arquivo. Metodo: " . __METHOD__);
        }

        return $filapath;
    }
    
    public function runCommand($command)
    {
        try {
            $output = $this->session->getExec()->run(
                $this->configuration->getDirectory() . trim($command)
            );
        } catch( \Exception $e) {
            $output = $e->getMessage();
        }
        
        return $this->processCommandOutput($output);
    }
    
    protected function processCommandOutput($output)
    {
        $return = '';
        foreach(explode(PHP_EOL, $output) as $line) {
            if(false !== stripos($line, 'p11-kit') ) {
                continue;
            }
            
            $return .= $line;
        }
        
        if(false === stripos($return, 'Exception') ) {
            return true;
        }
        
        throw new Exception($return);
    }
}