<?php

namespace EduardoStuart\FeedReader;

use EduardoStuart\FeedReader\Engines\EngineAdapter;

class FeedReader
{

    protected $configs;

    public function __construct(array $configs = array())
    {
        $this->configs = $configs;
    }

    private function resolveEngine()
    {
        return new $this->configs['engine'](array_except($this->configs,['engine']));
    }

    public function build()
    {
        return new EngineAdapter($this->resolveEngine());
    }

}