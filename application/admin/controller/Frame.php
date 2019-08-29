<?php 

namespace app\admin\controller;

use app\admin\model\Frame as FrameModel;
/**
 * 管理

 *	ControllerList
 */

class Frame extends LoginBase
{
    private $Model;

    /**
     * 构造函数
     **/
	public function __construct()
	{
		parent::__construct();
        $this->Model = new FrameModel;
        $this->assign('modeltext','模块名');
	}


    /**
     * 数据列表
     * @param int   $page           页数
     * @param int   $limit          条数
     **/
	public function index()
	{
        $map = [];

        //数据筛选
        $condition['name'] = '';

        $name = input('param.name');
        if($name && $name !== ""){
        	$condition['name'] = $name;
            $map['field_name'] = ['like',"%" . $name . "%"];
        }

        //查询数据
        $Nowpage 	= input('page') ? input('page') : 1;
        $limits  	= input('limit') ? input('limit') : 15;
        $count 		= $this->Model->GetCount($map);
        $allpage 	= intval(ceil($count / $limits));
        $data 		= $this->Model->GetListByPage($map,$Nowpage,$limits);

        foreach ($data as $key => $value) {
            //循环操作
        }

        if(input('page'))
        {
            return json(
                ['code'=>0, 'msg'=>'', 'count'=>$count, 'data'=>$data,'datas'=>$map,'condition'=>$condition]
            );
        }
        $this->assign('condition',$condition);
        return $this->fetch();	
	}


    /**
     * 添加数据
     **/
    public function create()
    {
        return request()->isPost() ? $this->Model->CreateData(input('post.')) : view();
    }


    /**
     * 修改数据
     * @param int   $id     主键
     **/
    public function update($id = 0)
    {
        $this->assign('data',$this->Model->GetOneDataById($id));
        return request()->isPost() ? $this->Model->UpdateData(input('post.')) : view();
    }


    /**
     * 更改状态
     * @param int   $id     主键
     **/
    public function change($id)
    {
        $data = $this->Model->GetOneDataById($id);

        if(!$data) return array('code'=>0,'msg'=>'数据不存在');

        $update['rotate_id'] = $id;
        $update['rotate_status'] = $data['rotate_status'] == 1 ? 0 : 1;

        return $this->Model->UpdateData($update);
    }


    /**
     * 删除数据
     * @param int   $id     主键
     **/
    public function delete($id)
    {
        return $this->Model->DeleteData($id);
    }
}