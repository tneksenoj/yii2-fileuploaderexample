<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use dpodium\filemanager\widgets\FileBrowse;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    public $dataProvider;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 4],
        ];
    }

    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $location = 'uploads/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($location);
                $record = new File();
                $record->uploadFile($file);
                $record->save();
            }
            return true;
        } else {
            return false;
        }
    }
}