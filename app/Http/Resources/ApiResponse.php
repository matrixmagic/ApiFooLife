<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "success" => $this->success,
            "data" => $this->data,
            "msg" => $this->message,
            "codeMsg" => $this->codeMessage,
            "status" =>$this->status

        ];
    }
}
