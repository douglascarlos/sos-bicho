<?php

namespace SOSBicho\Mappers;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadedFileToBase64Mapper {

    public static function map(UploadedFile $file) {
        $contentFile = file_get_contents($file->path());
        return 'data:image/' . $file->extension() . ';base64,' . base64_encode($contentFile);
    }

}
