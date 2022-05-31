<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
 
use yii\data\ActiveDataProvider;
use app\models\Supplier;
use app\models\PostSearch;

use m35\thecsv\theCsv;
use yii\base\BaseObject;


class ExportController extends Controller
{
     
    public $enableCsrfValidation = false;
    
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

 
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    
    function actionDatalist(){
        $query = Supplier::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '20',
            ]
        ]);
        
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        
          return $this->render('export',['dataProvider'=>$dataProvider,'searchModel'=>$searchModel]);
    }
    
    function actionSelectfield(){
        
       $field=Supplier::tableField();
         return $this->render('select_field',['data'=>$field]);
        
      
    }
    
    function actionExportact(){
       $field=$_POST['field'];
      $id=$_POST['id'];
  
       $data=(new \yii\db\Query())->select($field)->from('supplier')->where(['in','id',$id])->all();
           
   
        set_time_limit(0);
        $filename='supplier.csv';
        $title=$field;
         $filename=iconv("UTF-8", "GB2312",$filename);
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=".$filename);
        header("Pragma: no-cache");
        header("Expires: 0");
         
      
        if (!empty($title)){
            foreach ($title as $k => $v) {
                $title[$k]=iconv("UTF-8", "GB2312",$v);
            }
            $title= implode(",", $title);
            echo "$title\n";
        }
  
        if (!empty($data)){
            foreach($data as $key=>$val){
                foreach ($val as $ck => $cv) {
                    $data[$key][$ck]=mb_convert_encoding($cv, "gb2312","UTF-8");
                }
                $data[$key]=implode(",", $data[$key]);
            }
            echo implode("\n",$data);
        
        }
     
       
     }

}
