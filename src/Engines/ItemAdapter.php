<?php

namespace EduardoStuart\FeedReader\Engines;

abstract class ItemAdapter
{

    protected $items;

    public function __construct(array $items = array())
    {
        $this->items = $items;

        $this->handle();
    }

    abstract protected function handle();
}