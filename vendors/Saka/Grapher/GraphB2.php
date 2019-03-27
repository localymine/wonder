<?php // content="text/plain; charset=utf-8"
namespace Saka\Grapher;

require_once(SMC_VENDORS_DIR.DS.'jpgraph-4.0.2/src/jpgraph.php');
require_once(SMC_VENDORS_DIR.DS.'jpgraph-4.0.2/src/jpgraph_bar.php');

/**
 * Class GraphB2
 * @package Saka\Grapher
 */
class GraphB2
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
    /** @var array $bl_xlabel */
    /** @var array $databar30 */
    /** @var array $databar31 */
    /** @var array $databar32 */
    /** @var array $databar33 */
    /** @var array $databar34 */
    /** @var array $databar35 */
    /** @var array $databar36 */

    $graph = new \Graph(400,500);
    $graph->SetScale("textlin");
    $graph->SetMarginColor('white');
    $graph->Set90AndMargin(50,15,50,15);
    $graph->SetShadow(false);
    $graph->SetFrame(false);

    $graph->title->Set("時系列年齢別入場者数");
    $graph->title->SetFont(FF_GOTHIC);
    $graph->title->SetMargin(10);

    $graph->legend->SetShadow(false);
    $graph->legend->SetColor([0,0,0],[127,127,127]);
    $graph->legend->SetFont(FF_GOTHIC, FS_NORMAL, 7);
    $graph->legend->SetAbsPos(20, 385,'right','top');
    $graph->legend->SetLineSpacing(7);
    $graph->legend->SetFrameWeight(0);
    $graph->legend->SetFillColor([255,255,255,0.2]);
    $graph->legend->SetLeftMargin(0);
    $graph->legend->SetMarkAbsSize(8);
    $graph->legend->SetHColMargin(2);

    $graph->xaxis->SetTickLabels($bl_xlabel);
    $graph->xaxis->SetFont(FF_COURIER,FS_NORMAL,7);
    $graph->yaxis->SetFont(FF_COURIER,FS_NORMAL,7);

    $p1 = new \BarPlot($databar30);
    $p1->SetFillColor(array(255,255,255));
    $p2 = new \BarPlot($databar31);
    $p2->SetFillColor(array(64,255,255));
    $p3 = new \BarPlot($databar32);
    $p3->SetFillColor(array(64,255,192));
    $p4 = new \BarPlot($databar33);
    $p4->SetFillColor(array(0,240,64));
    $p5 = new \BarPlot($databar34);
    $p5->SetFillColor(array(0,204,32));
    $p6 = new \BarPlot($databar35);
    $p6->SetFillColor(array(32,160,64));
    $p7 = new \BarPlot($databar36);
    $p7->SetFillColor(array(32,96,64));

    $p1->SetLegend('0-9');
    $p2->SetLegend('10-19');
    $p3->SetLegend('20-29');
    $p4->SetLegend('30-39');
    $p5->SetLegend('40-49');
    $p6->SetLegend('50-59');
    $p7->SetLegend('60-');

    $ap = new \AccBarPlot(array($p1, $p2, $p3, $p4, $p5, $p6, $p7));
    $graph->Add($ap);

    $content_type = 'image/jpeg';
    $graph->Stroke(_IMG_HANDLER);
    ob_start();
    $graph->img->Stream();
    $image_data = ob_get_contents();
    ob_end_clean();
    return "data:$content_type;base64,".base64_encode($image_data);
  }
}
