<?php
use yii\grid\GridView;
use yii\helpers\Html;

 
echo GridView::widget([
     'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    "options" => ["class" => "grid-view","style"=>"overflow:auto", "id" => "grid"],
    
      'columns' => [
          [
          "class" => "yii\grid\CheckboxColumn",
          "name" => "id",
          ],
        
         'id', 
          
         'name',  
           
        
         'code',   
         [
                 'attribute'=>'t_status',
                'value'=>function ($model) {
                    return $model->t_status;
                },
                'filter'=>['ok'=>'ok','hold'=>'hold']
            ],
    ],
  
]); 
                
echo Html::a("导出", "javascript:void(0);", ["class" => "btn btn-success mybtn"]);


$js=<<<EOF
$(document).on('click', '.mybtn', function () {
    	//可以把选中的id通过ajax提交到后端，然后借助yii的deleteAll()语句进行删除或操作
		var keys = $("#grid").yiiGridView("getSelectedRows");
		console.log(keys);
    
 
 
var form = $("<form method='post'></form>");
    
 form.attr({"action":"index.php?r=export/selectfield"});
 
       for(i=0;i<keys.length;i++){
        console.log(keys[i])
    
    form.append($("<input type='hidden'>").attr("name", "id[]").val(keys[i]));
    }
    
 

// 这步很重要，如果没有这步，则会报错无法建立连接
$("body").append($(form));
form.submit();
    
    
    });
EOF;
$this->registerJs($js);

