<?php
namespace App\Services\Uploads;


class UploadsManager
{

    public function __construct() {

    }


    /** Save lot image to filestorage
     *
     * Example:
     *      $uploadsManager = $this->servicesContainer->uploadsManager;
     *      $fileName = $uploadsManager->saveLotImage($_FILES['lot_image']);
     *
     * WebPath:
     * - origin: /images/lots/{file_name}.{ext}
     * - thumb: /images/lots/{file_name}_150x150.{ext}
     *
     * @param $file - file element from $_FILES array
     * @return string
     */
    public function saveLotImage( $file ) {

        $image = new \Imagick($file['tmp_name']);
        $image->cropThumbnailImage( 150, 150 );

        $fileExtension = pathinfo(
            $file['name'],
            PATHINFO_EXTENSION
        );

        $name = uniqid();
        $filename = $name.'.'.$fileExtension;
        $filenameThumb = $name.'_150x150.'.$fileExtension;
//        echo __DIR__;
        echo SITE_ROOT;
        move_uploaded_file( $file['tmp_name'], SITE_ROOT.'/images/lots/'.$filename );
//        $image->writeImageFile( '../../../images/lots/'.$filenameThumb );
        file_put_contents(SITE_ROOT.'/images/lots/'.$filenameThumb, $image->getImageBlob());

        return $filename;
    }

}