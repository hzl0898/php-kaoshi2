<?php
namespace app\home\controller;

use think\facade\Session;

class Index
{
    public function index()
    {
        /*获取科目*/
        $courseModel = model('Course');
        $data = $courseModel->paginate(4);

        /*获取new*/
        $newModel = model('News');
        $new = $newModel->paginate(4);
        foreach ($new as $item) {
            $item['createTime'] = date('Y-m-d H:m:s', $item['createTime']);
            $item['desc'] = mb_substr(strip_tags($item['content']), 0, 100);
        }
        return view('home@/Index/index', ['data' => $data,'new' => $new]);
    }
}
