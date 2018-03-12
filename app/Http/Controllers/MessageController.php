<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comments;
class MessageController extends Controller
{

    public function insert_message(Request $request) {
        $msg_info = $request->all();
        $name = trim($msg_info['name']);
        $msg = trim($msg_info['message']);
        if($name == '' || $msg == '')  return responseToJson(1,'请输入昵称或留言');
        else if(mb_strlen($name,'utf-8')>=10)  return responseToJson(1,'昵称长度不能超过10个字符');
        else if(mb_strlen($msg,'utf-8') >= 45) return responseToJson(1,'留言长度不能超过45个字符');
        $ist_boo = comments::insert_msg($name,$msg);

        //当留言成功时向嵌入太返回成功的留言
        return $ist_boo ? responseToJson(0,'留言成功',$msg_info) : responseToJson(1,'留言失败');
    }


    public function select_message(Request $request) {
        $all_msg = comments::get_all_msg();
        return $all_msg ? responseToJson(0,'',$all_msg) : responseToJson(1,'查询失败');
    }

    public function delete_message(Request $request) {
        $msg_ids = $request->all();
        if(is_array($msg_ids)) {
            if(count($msg_ids)) { //数组不为空
                $del_boo = comments::delete_msgs($msg_ids);
                return $del_boo ? responseToJson(0,'删除成功') : responseToJson(1,'删除失败');
            }else {
                return responseToJson(1,'请选择要删除的留言');
            }
        }else return responseToJson(1,'格式错误');
    }

}