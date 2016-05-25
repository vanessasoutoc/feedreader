<?php

namespace EduardoStuart\FeedReader\Facades;

use Illuminate\Support\Facades\Facade;

class FeedReaderFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'feed-reader';
    }

}