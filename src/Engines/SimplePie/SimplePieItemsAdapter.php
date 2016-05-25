<?php

namespace EduardoStuart\FeedReader\Engines\SimplePie;

use EduardoStuart\FeedReader\Engines\ItemAdapterInterface;
use EduardoStuart\FeedReader\Engines\ItemAdapter;
use Carbon\Carbon;

class SimplePieItemsAdapter extends ItemAdapter implements ItemAdapterInterface
{

    private $data = [];

    protected function handle()
    {
        $this->data = [];

        foreach($this->items as $item ) {
            $this->data[] = [
                'id' => $item->get_id(),
                'title' => $item->get_title(),
                'categories' => $this->categories($item->get_categories()),
                'description' => $item->get_description(),
                'content' => $item->get_content(),
                'contributors' => $item->get_contributors(),
                'authors' => $this->authors($item->get_authors()),
                'permalink' => $item->get_permalink(),
                'source' => $item->get_source(),
                'latitude' => $item->get_latitude(),
                'longitude' => $item->get_longitude(),
                'created_at' => $this->parseDate($item->get_date('U')),
                'updated_at' => $this->parseDate($item->get_updated_date('U')),
                'gmdate' => $this->parseDate($item->get_gmdate('U')),
                'updated_gmdate' => $this->parseDate($item->get_updated_gmdate('U')),
            ];
        }
    }

    private function categories($categories)
    {
        if($categories == null) return null;

        $list = [];

        foreach($categories as $category) {
            $list[] = $category->get_term();
        }

        return array_filter($list);
    }

    private function authors($authors)
    {
        if($authors == null) return null;

        $list = [];

        foreach($authors as $author) {
            $list[] = $author->get_name();
        }

        return array_filter($list);
    }

    private function parseDate($date)
    {
        if(empty($date)) return null;

        return Carbon::createFromTimestamp($date);
    }

    public function items()
    {
        return $this->data;
    }
}