<?php

namespace App\Services\Pagination;

class Pagination
{
  public static function generate($amountLots, $page, $limit){

        $page = $page == 0 ? 1 : ++$page ;
      $path=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
      $str=parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
      parse_str($str, $output);

      if( isset($output['page']) ) {
          unset($output['page']);
      }
      $query = $path."?".http_build_query($output);

      $max_page=(int)ceil($amountLots/$limit);

     $html ='<ul class="pagination">';
        if($page>1)
        {
            $goBack=$page;
            $html .= "<li>
                        <a href = '".$query."&page=". --$goBack ."'  aria - label = 'Previous' >
                            << <span aria - hidden = 'true' >&laquo;</span >
                        </a >
                    </li >";
        }
                     for($i=1; $i<=$max_page; $i++) {
                         $html .= "<li><a href='".$query."&page=". $i . "'>$i</a></li>";
                     }
      if($page<$max_page)
      {
          $html .="<li >
               <a href = '".$query."&page=".++$page."' aria - label = 'Next'>
                   >> <span aria - hidden = 'true' >&raquo;</span >
               </a >
            </li >";
      }
     $html .='</ul>
          </nav>';
      return $html;
  }
}