<?php

namespace App\Common\Util;


class ResponseUtil
{
    public static function json($data = [], $page = null, $extraData = null, $msg = '', $status = SC_OK)
    {
        // list & page
        if (is_array($page)) {
            $data = [
                'list' => $data,
                'page' => $page,
            ];
        }

        if (is_array($extraData))
            $data = array_merge($data, $extraData);

        // make response array
        $response = [
            'data'      => $data,
            'status'    => $status,
            'msg'       => $msg,
        ];

        $headers = [
            'Access-Control-Allow-Origin'       => 'localhost:3000',
            'Access-Control-Allow-Headers'      => 'Origin, Content-Type, Cookie, Accept',
            'Access-Control-Allow-Methods'      => 'GET, POST, PATCH, PUT, OPTIONS',
            'Access-Control-Allow-Credentials'  => 'true',
            ];

        return response()->json($response, $status);
    }

    public static function error($status = SC_SERVER_ERROR, $msg = '', $data = [], $isJson = true)
    {
        if ($msg === '') {
            switch ($status) {
                case SC_BAD_REQUEST:
                    $msg = '提交的信息有误';
                    break;
                case SC_UNAUTHORIZED:
                    $msg = '用户信息无效';
                    break;
                case SC_FORBIDDEN:
                    $msg = '没有对应的权限';
                    break;
                case SC_NOT_FOUND:
                    $msg = '指定的信息不存在';
                    break;
                case SC_NOT_ALLOWED:
                    $msg = '指定的信息不允许访问';
                    break;
            }
        }
        $response = [
            'data'      => $data,
            'status'    => $status,
            'msg'       => $msg,
        ];

        if ($isJson)
            return response()->json($response, $status);

        return response($msg, $status)->header(HTTP_CT_KEY, HTTP_CT_VALUE_TEXT);
    }

    public static function getData($data, $page = null)
    {
        // list & page
        if (is_array($page))
            $data = [
                'list' => $data,
                'page' => $page,
            ];

        return $data;
    }

    public static function getPage($curPage, $perPage, $total = null, $extra = [])
    {
        $page = [
            'cur_page' => $curPage,
            'per_page' => $perPage,
        ];

        if (!is_null($total)) {
            $maxPage = ceil($total / $perPage);
            $page['max_page'] = ($maxPage < 1) ? 1 : $maxPage;
            $page['total'] = $total;
        }

        if (count($extra) > 0)
            $page = array_merge($page, $extra);

        return $page;
    }

    public static function boolResponse($response, $isJson = true)
    {
        $statusCode = $response->getStatusCode();

        if ($statusCode == SC_OK)
            return true;

        return false;
    }

    public static function badResponse($response)
    {
        $className = get_class($response);

        if ($className != 'Illuminate\Http\JsonResponse')
            return false;

        $statusCode = $response->getStatusCode();

        if ($statusCode == SC_OK)
            return false;

        return true;
    }

    public static function getResponseDataValue($response, $key)
    {
        $responseData = $response->getData();

        if (!is_null($responseData->data)) {
            $data = $responseData->data;
            if (!is_null($data->$key))
                return $data->$key;
        }

        return 0;
    }
}