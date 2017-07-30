<?php

namespace EduardoStuart\FeedReader\Engines;

use EduardoStuart\FeedReader\Engines\EngineInterface;
use EduardoStuart\FeedReader\Collections\FeedReaderCollection;

class EngineAdapter
{
    private $engine;

    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function __call($method,$args)
    {
        call_user_func_array([$this->engine,$method],$args);

        return $this;
    }

    public function items()
    {
        $this->engine->handle();

        return new FeedReaderCollection($this->engineAdapter()->items());
    }

    public function engineAdapter()
    {
        return $this->engine->itemAdapter();
    }

}