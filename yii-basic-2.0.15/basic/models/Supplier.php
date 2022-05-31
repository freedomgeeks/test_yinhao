<?php

namespace app\models;

use yii;
use yii\db\ActiveRecord;

class Supplier extends ActiveRecord{
    public static function tableName()
    {
        return 'supplier';
    }
    
    public static function tableField(){
        return ['id','name','code','t_status'];
    }
 
   /* function scenarios(){
        return [
            'create'=>['title','content'],
            'update'=>['title']
        ];
    }
    public function rules()
    {
        return [
            // name, email, subject 和 body 属性必须有值
            [['title', 'content'], 'required','on'=>'create'],
            [['title'], 'required','on'=>'update'],


        ];
    }*/
//     //根据留言去查对应用户信息
//     function getUser(){
// //        return  $this->hasOne(User::className(),['uid'=>'user_id'])->asArray()->One();
//   return  $this->hasOne(User::className(),['uid'=>'user_id'])->asArray();

//     }
}
