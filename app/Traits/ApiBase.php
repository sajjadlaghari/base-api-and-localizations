<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

trait ApiBase
{
    //Validate Respose Redirector
    protected $Response = [];

    protected function Response($request, $rules)
    {
        // validation
        $validation = Validator::make($request->all(), $rules);
        $this->Response['flag'] = 1;
        // check if true ya not
        if ($validation->fails()) {
            $er = $validation->messages()->all();
            $this->Response['errors'] = $er;
            $this->Response['flag'] = 0;
        }

        return $this->Response;
    }
    // get shop_

    protected function redirectIfNotAvailable($status, $err, $Flag = 0)
    {
        return response()->json([
            'flag' => $Flag,
            'errors' => [
                $err,
            ],
        ], $status);
    }

}
