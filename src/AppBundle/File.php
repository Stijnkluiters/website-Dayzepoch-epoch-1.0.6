<?php
/**
 * Created by PhpStorm.
 * User: stijn
 * Date: 20-1-2017
 * Time: 08:05
 */

namespace AppBundle;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class File
{
    private $targetDir;

    public function __construct($targetDir)
    {
        try {
            $this->targetDir = $targetDir;
        } catch (Exception $exception) {
            $slack = new Slack();
            $slack->Exception($exception);
        }
    }

    public function upload(UploadedFile $file)
    {
        try {
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move($this->targetDir, $fileName);

            return $fileName;
        } catch (Exception $exception) {
            $slack = new Slack();
            $slack->Exception($exception);
        }
    }
}