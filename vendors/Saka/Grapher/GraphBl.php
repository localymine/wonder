<?php // content="text/plain; charset=utf-8"
namespace Saka\Grapher;

require_once(SMC_VENDORS_DIR.DS.'jpgraph-4.0.2/src/jpgraph.php');
require_once(SMC_VENDORS_DIR.DS.'jpgraph-4.0.2/src/jpgraph_line.php');
require_once(SMC_VENDORS_DIR.DS.'jpgraph-4.0.2/src/jpgraph_bar.php');

/**
 * Class GraphBl
 * @package Saka\Grapher
 */
class GraphBl
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

    $graph = new \Graph(900,400);
    $graph->SetScale("textlin");
    $graph->SetMarginColor([200,200,200,1]);
    $graph->SetShadow(false);
    $graph->SetFrame(false);

    $graph->legend->SetShadow(false);
    $graph->legend->SetColor([0,0,0],[127,127,127]);
    $graph->legend->SetFont(FF_GOTHIC, FS_NORMAL, 8);
    $graph->legend->SetAbsPos(15, 395,'right','bottom');
    $graph->legend->SetLineSpacing(5);
    $graph->legend->SetLayout(LEGEND_HOR);
    $graph->legend->SetFrameWeight(0);
    $graph->legend->SetFillColor([255,255,255,1]);
    $graph->legend->SetLeftMargin(0);
    $graph->legend->SetMarkAbsSize(7);
    $graph->legend->SetHColMargin(2);

    $graph->img->SetMargin(45,15,40,60);
    $graph->xaxis->SetFont(FF_GOTHIC,FS_NORMAL,7);
    $graph->yaxis->SetFont(FF_GOTHIC,FS_NORMAL,7);

    /** @var array $databar1 */
    /** @var array $databar2 */
    /** @var array $dataline */
    /** @var array $datalin2 */
    /** @var array $bl_xlabel */

    // Create the bar plots
    $b1plot = new \BarPlot($databar1);
    $b1plot->SetFillColor("blue");
    $b2plot = new \BarPlot($databar2);
    $b2plot->SetFillColor("red");
    $liplot = new \LinePlot($dataline);
    $liplot->SetColor("black");
    $liplot->SetWeight(2);
    $liplot->mark->SetType(MARK_FILLEDCIRCLE);
    $liplot->mark->SetWidth(3);
    $l2plot = new \LinePlot($datalin2);
    $l2plot->SetColor("green");
    $l2plot->SetWeight(2);

    // Create the grouped bar plot
    $gbplot = new \GroupBarPlot(array($b1plot,$b2plot));
    $gbplot->SetWidth(0.9);

    $b1plot->SetLegend('男性入場者');
    $b2plot->SetLegend('女性入場者');
    $liplot->SetLegend('在留者数(性別判定対象外を含む)');
    $l2plot->SetLegend('(入場者数 - 退出者数)');

    // ...and add it to the graPH
    $graph->Add($gbplot);
    $graph->Add($liplot);
    $graph->Add($l2plot);

    $graph->title->SetFont(FF_GOTHIC);
    $graph->title->Set("入退場者数");
    $graph->title->SetMargin(10);

    $graph->xaxis->title->SetFont(FF_GOTHIC);
    $graph->xaxis->title->Set("時");
    $graph->xaxis->SetTickLabels($bl_xlabel);
    $graph->xaxis->SetLabelAngle(45);

    $graph->xaxis->title->SetMargin(5);
    $graph->yaxis->title->SetFont(FF_GOTHIC);
    $graph->yaxis->title->Set("人数");
    $graph->yaxis->title->SetMargin(-5);


    // Display the graph
    $content_type = 'image/png';
    $graph->Stroke(_IMG_HANDLER);
    ob_start();
    $graph->img->Stream();
    $image_data = ob_get_contents();
    ob_end_clean();
    return "data:$content_type;base64,".base64_encode($image_data);
  }
}
