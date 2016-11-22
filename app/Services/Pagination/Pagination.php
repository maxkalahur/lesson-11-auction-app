<?php

namespace App\Services\Pagination;

class Pagination
{
    protected $curr_page;
    protected $limit_lots;
    public function __construct()
    {
        $this->curr_page=0;
        $this->limit_lots=3;
    }
    public function set_limit($new_limit)
    {
        return $this->limit_lots=$new_limit;
    }
    public function next_page()
    {
        return $this->curr_page+$this->limit_lots;
    }
    public function prev_page()
    {
        return $this->curr_page-$this->limit_lots;
    }
    public  function load_page($new_page)
    {
        $this->curr_page=$new_page;
        return $sql="SELECT * FROM `lots` LIMIT $this->curr_page, $this->limit_lots";
    }

    public static function generate($page, $lotsAmount, $limit) {

        $html = '<nav aria-label="page-navigation">
                    <ul class="pagination">';

            if( $page > 0 ) {
                $html .= '<li><a href="?page=".$page--> << </a></li>'
            }

            


        $html .= '</ul>
                </nav>';
    }


}