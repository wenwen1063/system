<?php

namespace App\Common\Base\Controllers;

use App\Builder\Common\Data\Respondable;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

abstract class AbstractResourceController extends Controller
{
    use DispatchesJobs, ValidatesRequests, AuthorizesRequests;
    use Respondable;





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $result
     * @param bool $json
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($result, $json = true)
    {
        return response()->json($result);
    }

    public function getOptions(Request $request, $extras = [], $inJson = false)
    {
        // default
        $options = [];

        if ($request->has('options_json'))
            $options = json_decode($request->input('options_json'), true);
        else {

            if ($request->has('options'))
                $options = $request->input('options');

            if ($inJson)
                $options = json_decode($options, true);
        }

        // reset
        if (!is_array($options))
            $options = [];

        if (is_array($extras) && count($extras) > 0)
            $options = array_merge($options, $extras);

        return $options;
    }

    /**
     * 请求参数验证过后，获取options的数组值
     * @param array $request
     * @return array
     */
    public function getValidatorOptions($request, $extras = [], $inJson = false)
    {
        // default
        $options = [];

        if (is_array($request) && !empty($request['options']))
            $options = $request['options'];

        if ($inJson)
            $options = json_decode($options, true);

        // reset
        if (!is_array($options))
            $options = [];

        if (is_array($extras) && count($extras) > 0)
            $options = array_merge($options, $extras);

        return $options;
    }
}
