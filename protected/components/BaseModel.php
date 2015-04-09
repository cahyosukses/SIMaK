<?php
class BaseModel extends CActiveRecord
{	
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
     
    public function behaviors()
    {
        return array(
            'datetimeI18NBehavior'=>array(
                'class'=>'application.extensions.DateTimeI18NBehavior'
            ),
        );
    }
	
	protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                if ($this->hasAttribute('created_date')) {
                    $this->created_date = time();
                    $this->created_by = yii::app()->user->id;
                }
                if ($this->hasAttribute('updated_date')) {
                    $this->updated_date = time();
                    $this->updated_by = yii::app()->user->id;
                }
            } else {
                if ($this->hasAttribute('updated_date')) {
                    $this->updated_date = time();
                    $this->updated_by = yii::app()->user->id;
                }
            }
            return true;
        } else
            return false;
    }
}