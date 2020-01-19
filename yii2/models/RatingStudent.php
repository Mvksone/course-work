<?php
namespace app\models;

use yii\db\ActiveRecord;

class RatingStudent extends ActiveRecord{
    
    /*public $id;
    public $name;
    public $grade;
    public $olymp;*/
    
    public static function tableName()
    {
        return 'ratingstudents';
    }
    
    /*public function rules()
    {
        return [
            [['name', 'model'], 'required'],
            [['name', 'model', 'description'], 'trim'],
            [['name', 'model'], 'string', 'max' => 255],
            ['description', 'string', 'max' => 500],
        ];
    }*/
    
    public function behaviors()
    {
        return [
            //TimestampBehavior::className(),
        ];
    }
    
    
    public static function getStudentsByRaiting()
    {
        $query = "SELECT * FROM `ratingstudents` ORDER BY `grade` + `olymp` DESC";
        $result = RatingStudent::findBySql($query)->all();
        return $result;
    }
    //
    
    public function deleteStudent($id)
    {
        $model = RatingStudent::find()->where(['id' => $id])->one();
        $model->delete();
    }
}
?>
