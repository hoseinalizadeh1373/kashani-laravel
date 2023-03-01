<?php

namespace App\Services\DocumentUpload;

use Illuminate\Support\Facades\Cache as FacadesCache;

class DocumentUploadLogger{

    public static function setLog($userId,$field){
        $cached = self::getLogged($userId);
        $cached[]=$field;
        self::setCached($userId,$cached);
    }
    
    public static function getLogged($userId){

        $cacheKey = self::getCacheKey($userId);

        $cachedJson = FacadesCache::get($cacheKey,[]);

        return json_decode($cachedJson,true);

    }
    
    private static function setCached($userId,$toCache)
    {
        FacadesCache::put(self::getCacheKey($userId),json_encode($toCache),60*60*24*30);
    }

    private static function getCacheKey($userId){
        return "documents_" . $userId;
    }
}