<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IkanResource extends JsonResource
{

    // mendefinisikan properti status dan message
    public $status;
    public $message;
    public $statuscode;

    public function __construct($status, $message,  $resource, $statuscode)
    {
        // memanggil parent construct
        parent::__construct($resource);
        // mengisi properti status dan message
        $this->status = $status;
        $this->message = $message;
        $this->statuscode = $statuscode;
    }


    public function toArray(Request $request): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'statuscode' => $this->statuscode,
            'data' => $this->resource,
        ];
    }
}
