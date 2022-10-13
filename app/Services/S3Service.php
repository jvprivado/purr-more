<?php

namespace App\Services;

use Aws\S3\S3Client;

class S3Service
{
    private $s3 = null;

    /**
     * @param  string  $version
     * @param  string  $region
     */
    function __construct(string $version = 'latest',string $region) {

        if(!$this->s3) {
            $this->s3 = new S3Client([
                'version' => $version,
                'region' =>  $region
            ]);
        }
    }
    
    /**
     * Upload the file to s3
     * 
     * @param  string  $fileName
     * @param  $contents
     * @return boolen
     */
    public function upload(string $bucket ,string $key, $contents)
    {  
        $result = $this->s3->putObject([
            'Bucket' =>  $bucket,            
            'Key' => $key,
            'Body' => $contents
        ]);

        return $result;
    }

    /**
     * Get a signed URL from S3
     * 
     * @param  string  $bucket
     * @param  string  $key
     * @param  string  $time
     * @return string
     */
    public function getSignedURL(string $bucket,string $key,string $time)
    {       
        $cmd = $this->s3->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key' => $key
        ]);
        $request = $this->s3->createPresignedRequest($cmd, $time);  
        $presignedUrl = (string) $request->getUri();

        return $presignedUrl;
    }

     /**
     * Get Key From S3 Url
     * 
     * @param  string  $url
     * @param  string $folders
     * @return string
     */
    public function getKeyFromS3Url(string $url,string $folders)
    {
        $urlSplit = explode("/",$url);         
        $key = $folders . end($urlSplit);  
        return $key;
    }

     /**
     * Does Object Exist
     * 
     * @param  string  $bucket
     * @param  string $folder 
     * @param  string $path
     * @return boolean
     */
    public function doesObjectExist(string $bucket,string $folder,string $path)
    {        
        $sp = explode("/",$path);
        $fileName = end($sp);
        return $this->s3->doesObjectExist($bucket, $folder  . $fileName);
    }
}