<?php

namespace EduardoStuart\FeedReader\Engines;

interface EngineInterface
{
    public function url($url);

    public function cache($isEnabled);

    public function handle();

    public function itemAdapter();
}