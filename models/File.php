<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\ActiveRecord;

/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property string $location
 * @property string $orig_name
 * @property string $alias_name
 */
class File extends \yii\db\ActiveRecord
{
    public static $counter;
    public $dataProvider;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location', 'orig_name', 'alias_name'], 'required'],
            [['location'], 'string', 'max' => 2056],
            [['orig_name', 'alias_name'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location' => 'Location',
            'orig_name' => 'Orig Name',
            'alias_name' => 'Alias Name',
        ];
    }

    /**
     * @inheritdoc
     */
    public function delete()
    {

        if (file_exists(Yii::getAlias('@webroot/uploads/') . $this->alias_name))
        {
            //error_log(print_R(Yii::getAlias('@webroot/uploads/') . $this->alias_name, TRUE), 3, 'C://xampp/htdocs/basic/web/log/dbg.log');
            //chmod(Yii::getAlias('@webroot/uploads/') . $this->alias_name , 0777)
            unlink(Yii::getAlias('@webroot/uploads/') . $this->alias_name);
        }
        return parent::delete();

    }

    public function uploadFile($file)
    {
        File::$counter++;
        //error_log(print_R($this->id, TRUE), 3, 'C://xampp/htdocs/basic2/web/log/dbg.log');
        $this->location = Yii::getAlias('@webroot/uploads/');
        $this->orig_name =  $file->baseName . '.' . $file->extension;
        $this->alias_name = Yii::$app->security->generateRandomString($length=20) . strval(time()) . strval(File::$counter) . "." .  $file->extension;
        if ( ! rename($this->location . $this->orig_name, $this->location . $this->alias_name ) )
            return false;
    }
    
    public function getImageurl()
    {
        return Yii::getAlias('@web') .'/uploads/' . $this->alias_name;
    }

}

File::$counter = 0;