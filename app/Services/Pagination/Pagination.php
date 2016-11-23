<?php

namespace App\Services\Pagination;

class Pagination
{
  public static function generate($amountLots, $page, $limit){
      $max_page=$amountLots/$limit;
     $html ='<nav aria-label="Page navigation">
                <ul class="pagination">';
        if($page>0)
        {
            $html .= "<li>
                        <a href = '/catalog/?page=". --$page ."'  aria - label = 'Previous' >
                            << <span aria - hidden = 'true' >&laquo;</span >
                        </a >
                    </li >";
        }
                     for($page=0; $page<$max_page; $page++) {
                         $html .= "<li><a href='/catalog/?page=" . $page . "'>$page</a></li>";
                     }

      if($page<$max_page)
      {
          $html .="<li >
               <a href = '/catalog/?page=".++$page."' aria - label = 'Next'>
                   >> <span aria - hidden = 'true' >&raquo;</span >
               </a >
            </li >";
      }
     $html .='</ul>
          </nav>';
      return $html;
  }
}