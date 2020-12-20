<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WinnerResource extends JsonResource
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
            'id' => $this->id,
            'event' => $this->event->title,
            'code' => $this->code->code,
            'mobile' => $this->mobile->mobile,
            'win' => $this->is_win ? 'Yes': 'No',
            'created_at' => $this->created_at
        ];
    }
}
