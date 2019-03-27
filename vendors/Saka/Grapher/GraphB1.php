<?php // content="text/plain; charset=utf-8"
namespace Saka\Grapher;

require_once(SMC_VENDORS_DIR.DS.'jpgraph-4.0.2/src/jpgraph.php');
require_once(SMC_VENDORS_DIR.DS.'jpgraph-4.0.2/src/jpgraph_bar.php');

/**
 * Class GraphB1
 * @package Saka\Grapher
 */
class GraphB1
{
  /**
   * 集計済みデータから画像を生成し、DATA URIスキームに対応した画像データを返す
   *
   * @param  string $include_file 集計済みインクルードファイルへのパス
   * @return string DATA URIスキームに対応した画像データ
   */
  public static function showImg($include_file)
  {
    if (!is_file($include_file)) {
      return;
    }
    include($include_file);

    $graph = new \Graph(400,500);
    $graph->SetScale("textlin");
    $graph->SetMarginColor('white');
    $graph->Set90AndMargin(50,15,50,15);
    $graph->SetShadow(false);
    $graph->SetFrame(false);

    $graph->title->Set("時系列男女別入場者数");
    $graph->title->SetFont(FF_GOTHIC);
    $graph->title->SetMargin(10);

    $graph->legend->SetShadow(false);
    $graph->legend->SetColor([0,0,0],[127,127,127]);
    $graph->legend->SetFont(FF_GOTHIC, FS_NORMAL, 7);
    $graph->legend->SetAbsPos(20, 455,'right','top');
    $graph->legend->SetLineSpacing(7);
    $graph->legend->SetFrameWeight(0);
    $graph->legend->SetFillColor([255,255,255,0.2]);
    $graph->legend->SetLeftMargin(0);
    $graph->legend->SetMarkAbsSize(8);
    $graph->legend->SetHColMargin(2);

    $graph->xaxis->SetTickLabels($bl_xlabel);
    $graph->xaxis->SetFont(FF_COURIER,FS_NORMAL,7);
    $graph->yaxis->SetFont(FF_COURIER,FS_NORMAL,7);

    $p1 = new \BarPlot($databar1);
    $p1->SetFillColor("blue");
    $p2 = new \BarPlot($databar2);
    $p2->SetFillColor("red");

    $p1->SetLegend('男性');
    $p2->SetLegend('女性');

    $ap = new \AccBarPlot(array($p1, $p2));
    $graph->Add($ap);

    $content_type = 'image/png';
    $graph->Stroke(_IMG_HANDLER);
    ob_start();
    $graph->img->Stream();
    $image_data = ob_get_contents();
    ob_end_clean();
    return "data:$content_type;base64,".base64_encode($image_data);
  }
}
