<?php

namespace App\Utils;

class Response
{
    public function __construct(
        private ?string $content = '',
        private array   $headers = [],
        private int     $status = 200
    )
    {
    }
    
    public function setContent(string $content)
    {
        $this->content = $content;
    }
    
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }
    
    
    public function setStatus(int $status)
    {
        $this->status = $status;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function getHeaders()
    {
        return $this->headers;
    }
    
    
    public function getStatus()
    {
        return $this->status;
    }


    public function send(): void
    {
        echo $this->content;
    }
}