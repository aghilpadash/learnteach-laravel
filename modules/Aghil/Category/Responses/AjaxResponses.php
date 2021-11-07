<?php

namespace Aghil\Category\Responses;

use Illuminate\Http\Response;

/**
 * Created and Developed by Aghil Padash
 **/
class AjaxResponses
{
    public static function SuccessResponse()
    {
        return response()->json(['message' => 'عملیات با موفقیت انجام شد.'], status: Response::HTTP_OK);

    }
}