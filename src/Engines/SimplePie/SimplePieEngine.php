<?php

namespace EduardoStuart\FeedReader\Engines\SimplePie;

use EduardoStuart\FeedReader\Engines\SimplePie\SimplePieItemsAdapter;
use EduardoStuart\FeedReader\Engines\EngineInterface;
use SimplePie;

class SimplePieEngine implements EngineInterface
{

    protected $configs = [];

    protected $simplePie;

    public function __construct($configs = array())
    {
        $this->configs = $configs;

        $this->simplePie = new SimplePie();

        $this->setCacheLocation();
    }

    private function setCacheLocation()
    {
        $path = $this->configs['cache']['location'];

        if(!is_dir($path)) @mkdir($path,0755,true);

        $this->simplePie->set_cache_location($path);
    }

    public function url($url)
    {
        $this->simplePie->set_feed_url($url);
    }

    public function cache($isEnabled)
    {
        $this->simplePie->enable_cache($isEnabled);
    }

    public function handle()
    {
        $this->simplePie->init();
    }

    public function itemAdapter()
    {
        return new SimplePieItemsAdapter((array) $this->simplePie->get_items());
    }

}