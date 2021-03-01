<?php

namespace App\Core; 

class Response
{

    private $headers = [];

    public function addHeader(string $name, string $value){
        $this->headers[$name] = $value;
    }

    public function setHeader(string $name, string $value){
        $this->headers[$name] = (string) $value;
    }

    public static function redirect(string $url){
        return header("location: $url");
    }

    private function appendHeader()
    {
        foreach($this->headers as $key => $value) {
            header("{$key}: {$value}");
        }
    }

    public function JsonResponse(array $datas)
    {
        $this->addHeader("Content-Type", "application/json");
        $this->appendHeader();
        echo json_encode($datas);
    }

}