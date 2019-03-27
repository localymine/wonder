<?php
namespace Saka\Grapher;

require_once(SMC_VENDORS_DIR.DS.'jpgraph-4.0.2/src/jpgraph.php');
require_once(SMC_VENDORS_DIR.DS.'jpgraph-4.0.2/src/jpgraph_pie.php');

/**
 * Class GraphC3
 * @package Saka\Grapher
 */
class GraphC3
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

    $graph = new \PieGraph(300,240);
    $graph->title->Set("女性：年齢別");
    $graph->title->SetFont(FF_GOTHIC);
    $graph->title->SetMargin(10);
    $graph->SetShadow(false);
    $graph->SetFrame(false);

    $graph->legend->SetShadow(false);
    $graph->legend->SetColor([0,0,0],[127,127,127]);
    $graph->legend->SetFont(FF_GOTHIC, FS_NORMAL, 8);
    $graph->legend->SetAbsPos(12, 12,'right','top');
    $graph->legend->SetLineSpacing(8);
    $graph->legend->SetFrameWeight(0);
    $graph->legend->SetFillColor([255,255,255,1]);
    $graph->legend->SetLeftMargin(0);
    $graph->legend->SetMarkAbsSize(8);
    $graph->legend->SetHColMargin(2);

    $p1 = new \PiePlot($datac3);
    $p1->SetStartAngle(90);
    $p1->SetSize(0.275);
    $p1->SetCenter(0.42, 0.56);
    $p1->SetLegends(['60-','50-59','40-49','30-39','20-29','10-19','0-9']);
    $p1->SetSliceColors([
      [188,143,143],
      [255,160,122],
      [255,127, 80],
      [255,  0,  0],
      [255, 20,147],
      [255,105,180],
      [255,105,203]
    ]);

    $p1->SetGuideLines(true, false, false);
    $p1->SetGuideLinesAdjust(1.0, 0.75);
    $graph->Add($p1);

    $content_type = 'image/png';
    $graph->Stroke(_IMG_HANDLER);
    ob_start();
    $graph->img->Stream();
    $image_data = ob_get_contents();
    ob_end_clean();
    return "data:$content_type;base64,".base64_encode($image_data);
  }
}
