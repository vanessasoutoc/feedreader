<?php

namespace EduardoStuart\FeedReader\Engines;

interface ItemAdapterInterface
{

    public function items();

    public function count();
}