<?php
namespace App\Traits;

use App\Http\Resources\Traits\ApiTraitsResource;


Trait Apitraits
{
    /**
     * @param array $data
     * @param $codeEnum
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */

    public function apiReturn(array $data, $codeEnum)
    {
        return  response([
            'status'    => (int) $codeEnum[0],
            'message'   => (string) $codeEnum[1],
            'data' => new ApiTraitsResource($data)
        ], $codeEnum[0]);
    }

}
