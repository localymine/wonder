<?php
/**
 * provides functions to render pagination decorated by bootstrap css.
 * bootstrapのレイアウト装飾をしたページングを出力する機能を提供する
 */
namespace General\Core\Paginator;

use Phalcon\Di;
use Phalcon\Mvc\User\Component;
use Phalcon\Tag;


/**
 * render pagination decorated by bootstrap css.
 * bootstrapのレイアウト装飾をしたページングを出力する
 *
 * @package Coolrevo\Smc\Paginator
 */
class BootstrapPaginator extends Component
{

  /**
   * render pagination.
   * ページングを出力する
   *
   * @param \stdclass $page      instance created by Model::getPaginate. Model::getPaginateの生成クラス
   * @param string    $baseuri   base URI of pagination link. ナビゲーションのベースとなるアドレス
   * @param string    $direction display position of pagination[ontop|onbottom]. ナビゲーションの表示位置
   */
  public static function getPaginator($page, $baseuri, $direction = 'onbottom')
  {

    $l10n = Di::getDefault()->get('l10n');

    $filter_classes = ['btn', 'btn-sm', 'btn-pager', 'page-filter', 'pull-right'];
    if ($page->filtered) {
      $filter_classes[] = 'filtered';
    }
    $glue = (isset($page->query) && (0 < strlen($page->query))) ? '&' : '';
    $first = [
      $baseuri.'?page=1&limit='.$page->limit.$glue.$page->query,
      '<i class="fa fa-fast-backward"></i>',
      'First page',
    ];
    $prev = [
      $baseuri.'?page='.$page->before.'&limit='.$page->limit.$glue.$page->query,
      '<i class="fa fa-backward"></i>',
      'Previous page',
    ];
    $next = [
      $baseuri.'?page='.$page->next.'&limit='.$page->limit.$glue.$page->query,
      '<i class="fa fa-forward"></i>',
      'Next page',
    ];
    $last = [
      $baseuri.'?page='.$page->last.'&limit='.$page->limit.$glue.$page->query,
      '<i class="fa fa-fast-forward"></i>',
      'Last page',
    ];

    $pager  = '<ul class="pagination pagination-sm">';
    if ($page->current <= 1) {
      $pager .= '<li class="disabled"><span>'.$first[1].'</span></li>';
    } else {
      $pager .= '<li>'.Tag::linkTo([$first[0], $first[1], 'title' => $l10n->_($first[2])]).'</li>';
    }

    if ($page->current <= $page->before) {
      $pager .= '<li class="disabled"><span>'.$prev[1].'</span></li>';
    } else {
      $pager .= '<li>'.Tag::linkTo([$prev[0], $prev[1], 'title' => $l10n->_($prev[2])]).'</li>';
    }

    $pager .= '<li><span class="display">'.
              sprintf($l10n->_('%d / %d'), $page->current, $page->total_pages).
              '</span></li>';

    if ($page->current >= $page->next) {
      $pager .= '<li class="disabled"><span>'.$next[1].'</span></li>';
    } else {
      $pager .= '<li>'.Tag::linkTo([$next[0], $next[1], 'title' => $l10n->_($next[2])]).'</li>';
    }

    if ($page->current >= $page->last) {
      $pager .= '<li class="disabled"><span>'.$last[1].'</span></li>';
    } else {
      $pager .= '<li>'.Tag::linkTo([$last[0], $last[1], 'title' => $l10n->_($last[2])]).'</li>';
    }
    $pager .= '</ul>';

    $out  = '<div class="paginator-wrapper clearfix '.$direction.'">';
    $out .= '<select class="selectpicker pull-left" data-style="btn-sm btn-pager" data-affect="paginator">';
    $out .= '<option value="10">10</option>';
    $out .= '<option value="20">20</option>';
    $out .= '<option value="50">50</option>';
    $out .= '</select>'.
            '<span class="displabel pull-left">'.$l10n->_('records display').'</span>';
    $out .= '<nav class="pull-right">'.$pager.'</nav>';
    $out .= '<button class="'.implode(' ', $filter_classes).'" title="'.$l10n->_('Filter...').'">'.
            '<i class="fa fa-filter"></i><span>'.$l10n->_('Filter...').'</span>'.
            '</button>';
    $out .= '</div>';
    echo $out;
  }

}
