<?php
namespace Home\Model;
use Think\Model\RelationModel;
class NotepadModel extends RelationModel{
    protected $_link = array(
	"users" => array(
	    'mapping_type'=>self::BELONGS_TO,	//关联类型
	    'foreign_key'=>'uid',//关联的外键名称
		'class_name'    => 'users',	//要关联的模型类名
	    'mapping_fields'=>'username,phone,email',	//关联要查询的字段
	    //'as_fields'=>'phone,email'	//直接把关联的字段值映射成数据对象中的某个字段
		),
    );
}
