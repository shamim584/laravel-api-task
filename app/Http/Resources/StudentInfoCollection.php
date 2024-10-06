<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentInfoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    // public function toArray($request): array|\JsonSerializable|Arrayable
    // {
    //     return [
    //         'full_name' => $this->full_name,
    //         'email_id' => $this->email_id,
    //         'phone_number' => $this->phone_number
    //     ];
    // }

    public function toArray($request)
    {
        return $this->collection;
    }

}