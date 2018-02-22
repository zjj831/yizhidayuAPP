<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class CommonModel extends RelationModel
{
    public function saveData($data)
    {
        if (empty($data['id'])){
            unset($data['id']);
            $res = $this->add($data);
        }else{
            $res = $this->save($data);
        }
        return $res;
    }
}