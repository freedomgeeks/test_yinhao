<?php
 use yii\helpers\Html;
use  yii\widgets\ActiveForm;
 
 $form = ActiveForm::begin(['action' => ['export/exportact'],'method'=>'post',]);  
  
 foreach ($data as $v){
        if($v=='id'){
            echo  Html::checkbox('field[]', true, ['label' =>$v.'  (id为必选字段)','value'=>$v,'disabled'=>'disabled']).'<br />';
            echo  Html::checkbox('field[]', true, ['value'=>$v,'hidden'=>'hidden']);
         continue;
        }
            echo  Html::checkbox('field[]', true, ['label' =>$v,'value'=>$v]).'<br />';
     
 }
  
 foreach ($_POST['id'] as $id){
    echo  Html::checkbox('id[]', true,['value'=>$id,'style'=>['display'=>'none']]);
 }
 echo Html::submitButton('提交', ['class'=>'btn btn-primary','name' =>'submit-button']);

  ActiveForm::end();  

 
