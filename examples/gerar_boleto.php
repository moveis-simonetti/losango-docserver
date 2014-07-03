<?php
require __DIR__ . '/../vendor/autoload.php';

$configuration = new Ssh\Configuration('192.168.1.214');
$authentication = new Ssh\Authentication\Password('vinicius', 'mestre');

$session = new \Ssh\Session($configuration, $authentication);

class Config implements \Simonetti\Losango\DocServer\Configuration
{
    public function getDirectory()
    {
        return '/home/vinicius/DocServer/';
    }
}

$docServer = new \Simonetti\Losango\DocServer\DocServer($session, new Config());
$boletoDocument = new \Simonetti\Losango\DocServer\Document\BoletoDocument($docServer);

$content = file_get_contents(__DIR__ . '/boleto.txt');
/*
$boletoDocument->generate(
    'teste',
    $content
);
*/
file_put_contents(__DIR__ . '/boleto.pdf', $boletoDocument->fetch('teste'));