<?php

abstract class Document
{
    
    private $docServer;
    
    public function __construct(DocServer $docServer)
    {
        $this->docServer = $docServer;
    }
    
    protected function createFilename($id)
    {
        return $this->getFilePrefix() . $id;
    }
    
    public function generate($id, $content)
    {
        $filename = $this->createFilename($id);
        
        $this->docServer->sendFile($filename, $content);
        
        $command = sprintf(
            '%s %s',
            $this->getBin(),
            $filename
        );
        
        $this->docServer->runCommand($command);
    }
    
    public function fetch($id)
    {
        return $this->docServer->fetchFile(
            $this->createFilename($id)
        );
    }
    
    abstract protected function getFilePrefix();
    
    abstract protected function getBin();
}