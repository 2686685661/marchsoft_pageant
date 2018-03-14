<?php

/**
 * 页面json输出
 */
function responseToJson($code = 0, $msg = '', $paras = null) {
    $res["code"] = $code;
    $res["msg"] = $msg;
    $res["result"] = $paras;

    return response()->json($res);
}

/**
 * 上传文件名 生成
 *
 * @param int $code
 * @param $msg
 * @param $paras
 */
function getFilename($ext)
{
    $filename = time() . '-' . uniqid() . '.' . $ext;
    return $filename;
}

function is_stat($gift_id,$stat) {

    foreach($stat as $id=>$price) {
        if($gift_id == $id)
        return true;
    }
    return false;
}