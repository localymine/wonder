<?php

namespace Saka\Grapher;

/**
 * Class Viewer
 * @package Saka\Grapher
 */
class Viewer
{

  /**
   * 入力パラメータに基づいてデータを集計し、インクルード用ファイルを生成する
   *
   * @param mixed   $cam   カメラのユニーク鍵を含む配列
   * @param integer $year  集計開始年
   * @param integer $mon   集計開始月
   * @param integer $day   集計開始日
   * @param integer $hour  集計開始時
   * @param string  $range 集計範囲を指す文字列(day|6h|3h|week)
   * @return mixed 出力したインクルードファイルの名前・表示用集計済み数値の配列
   * @par 戻り値の配列要素
   *      - include     => string 集計済みインクルードファイルへのパス
   *      - sum_in      => int 期間内の入場者数
   *      - sum_out     => int 期間内の退場者数
   *      - sum_m       => int 期間内男性入場者数
   *      - sum_f       => int 期間内女性入場者数
   *      - sum_today   => int 本日の入場者数
   *      - sum_lastday => int 昨日の入場者数
   */
  public static function calc($cam = [], $year = null, $mon = null, $day = null, $hour = null, $range = null)
  {

    if (is_null($year) || is_null($mon) || is_null($day) || is_null($hour) ) {
      $year = date('Y');
      $mon  = date('m');
      $day  = date('d');
      $hour = date('H');
    }
    if (is_null($range)) {
      $range = 'day';
    }
    if (      $range == 'day') {
      $len=86400; $intvl=3600;
    } else if ($range == '6h') {
      $len=21600; $intvl=900;
    } else if ($range == '3h') {
      $len=10800; $intvl=900;
    } else if ($range == 'week') {
      $len=604800; $intvl=86400;
    } else {
      $len=3600; $intvl=900;
    }

    //ファイルの選択用
    if ($year == 0) {
      $starttime = time();
      $starttime = $starttime - ($starttime % 900);
    } else {
      $starttime = mktime($hour, 0, 0, $mon, $day, $year);
    }

    $endtime   = $starttime + $len;
    $startdate = date('Ymd', $starttime);
    $lastdate  = date('Ymd', $starttime - (24 * 3600));
    $enddate   = date('Ymd', $endtime + $intvl);

    $incount    = [];
    $outcount   = [];
    $totalcount = [];
    $attrcount  = [
      'male'   => ['0' => [], '10' => [], '20' => [], '30' => [], '40' => [], '50' => [], '60' => []],
      'female' => ['0' => [], '10' => [], '20' => [], '30' => [], '40' => [], '50' => [], '60' => []]
    ];
    $sumincount     = 0;
    $sumoutcount    = 0;
    $summalecount   = 0;
    $sumfemalecount = 0;
    $todaycount     = 0;
    $lastdaycount   = 0;

    foreach($cam as $vcam) {

      $dirPath = SMC_UPLOAD_DIR.'/FAdata/' . $year . '/' . $vcam . '/';

      // 昨日の集計 Cxxxxxx.datの取り込み
      $filename = $dirPath . 'C' . $lastdate . '.dat';
      if (file_exists($filename)) {
        $data = file_get_contents($filename);
        $lines = explode("\n", $data);
        foreach ($lines as $line) {
          if (substr($line, 2, 1) == ':') {
            $items = explode(',', $line);
            $lastdaycount += intval($items[1]);
          }
        }
      }

      // 本日の集計
      for ($i = $startdate; $i <= $enddate; $i++) {
        //Cxxxxxx.datの取り込み
        $filename = $dirPath . 'C' . $i . '.dat';
        if (file_exists($filename)) {
          $data = file_get_contents($filename);
          $lines = explode("\n", $data);

          foreach($lines as $line) {
            if (substr($line, 2, 1) == ':') {
              $items = explode(',',$line);
              $ttime = strtotime(substr($i, 0, 4).'-'.substr($i, 4, 2).'-'.substr($i, 6, 2).' '.$items[0]);

              if (($ttime >= $starttime) && ($ttime < $endtime)) {
                $key = strval($ttime);
                if (isset($incount[$key])) {
                  $incount[$key] += intval($items[1]);
                } else {
                  $incount[$key]  = intval($items[1]);
                }
                if (isset($outcount[$key])) {
                  $outcount[$key] += intval($items[2]);
                } else {
                  $outcount[$key]  = intval($items[2]);
                }
                if (isset($totalcount[$key])) {
                  $totalcount[$key] += intval($items[3]);
                } else {
                  $totalcount[$key]  = intval($items[3]);
                }
                $sumincount  += intval($items[1]);
                $sumoutcount += intval($items[2]);
              }
              if ($i == $startdate) {
                $todaycount += intval($items[1]);
              }
            }
          }

        }
        // Sxxxxxx.datのとりこみ
        $filename = $dirPath . 'S' . $i . '.dat';
        if (file_exists($filename)) {
          $data = file_get_contents($filename);
          $lines = explode("\n", $data);

          foreach ($lines as $line) {
            if (substr($line, 2, 1) == ':') {
              $items = explode(',', $line);
              $ttime = strtotime(substr($i, 0, 4).'-'.substr($i, 4, 2).'-'.substr($i, 6, 2).' '.$items[0]);

              if (($starttime <= $ttime) && ($ttime < $endtime)) {
                $key = strval($ttime);
                if (isset($attrcount['male']['0'][$key])) {
                  $attrcount['male']['0'][$key]  += intval($items[1]);
                } else {
                  $attrcount['male']['0'][$key]   = intval($items[1]);
                }
                if (isset($attrcount['male']['10'][$key])) {
                  $attrcount['male']['10'][$key] += intval($items[3]);
                } else {
                  $attrcount['male']['10'][$key]  = intval($items[3]);
                }
                if (isset($attrcount['male']['20'][$key])) {
                  $attrcount['male']['20'][$key] += intval($items[5]);
                } else {
                  $attrcount['male']['20'][$key]  = intval($items[5]);
                }
                if (isset($attrcount['male']['30'][$key])) {
                  $attrcount['male']['30'][$key] += intval($items[7]);
                } else {
                  $attrcount['male']['30'][$key]  = intval($items[7]);
                }
                if (isset($attrcount['male']['40'][$key])) {
                  $attrcount['male']['40'][$key] += intval($items[9]);
                } else {
                  $attrcount['male']['40'][$key]  = intval($items[9]);
                }
                if (isset($attrcount['male']['50'][$key])) {
                  $attrcount['male']['50'][$key] += intval($items[11]);
                } else {
                  $attrcount['male']['50'][$key]  = intval($items[11]);
                }
                if (isset($attrcount['male']['60'][$key])) {
                  $attrcount['male']['60'][$key] += intval($items[13]);
                } else {
                  $attrcount['male']['60'][$key]  = intval($items[13]);
                }

                if (isset($attrcount['female']['0'][$key])) {
                  $attrcount['female']['0'][$key]  += intval($items[2]);
                } else {
                  $attrcount['female']['0'][$key]   = intval($items[2]);
                }
                if (isset($attrcount['female']['10'][$key])) {
                  $attrcount['female']['10'][$key] += intval($items[4]);
                } else {
                  $attrcount['female']['10'][$key]  = intval($items[4]);
                }
                if (isset($attrcount['female']['20'][$key])) {
                  $attrcount['female']['20'][$key] += intval($items[6]);
                } else {
                  $attrcount['female']['20'][$key]  = intval($items[6]);
                }
                if (isset($attrcount['female']['30'][$key])) {
                  $attrcount['female']['30'][$key] += intval($items[8]);
                } else {
                  $attrcount['female']['30'][$key]  = intval($items[8]);
                }
                if (isset($attrcount['female']['40'][$key])) {
                  $attrcount['female']['40'][$key] += intval($items[10]);
                } else {
                  $attrcount['female']['40'][$key]  = intval($items[10]);
                }
                if (isset($attrcount['female']['50'][$key])) {
                  $attrcount['female']['50'][$key] += intval($items[12]);
                } else {
                  $attrcount['female']['50'][$key]  = intval($items[12]);
                }
                if (isset($attrcount['female']['60'][$key])) {
                  $attrcount['female']['60'][$key] += intval($items[14]);
                } else {
                  $attrcount['female']['60'][$key]  = intval($items[14]);
                }
                if ($i == $startdate) {
                  $summalecount += intval($items[1]) + intval($items[3])
                    + intval($items[5]) + intval($items[7]) + intval($items[9])
                    + intval($items[11]) + intval($items[13]);
                  $sumfemalecount += intval($items[2]) + intval($items[4])
                    + intval($items[6]) + intval($items[8]) + intval($items[10])
                    + intval($items[12]) + intval($items[14]);
                }
              }
            }
          }

        }
      }
    }

    $datac1 = [0, 0];
    $datac2 = ['0' => 0, '10' => 0, '20' => 0, '30' => 0, '40' => 0, '50' => 0, '60' => 0];
    $datac3 = ['0' => 0, '10' => 0, '20' => 0, '30' => 0, '40' => 0, '50' => 0, '60' => 0];

    $strline = '$dataline = array(';
    $strlin2 = '$datalin2 = array(';
    $strbar1 = '$databar1 = array(';
    $strbar2 = '$databar2 = array(';

    $strblxlabel  = '$bl_xlabel     = array(';
    $stroutline   = '$dataoutline   = array(';
    $strtotalline = '$datatotalline = array(';
    $strbar30  = '$databar30  = array(';
    $strbar31  = '$databar31  = array(';
    $strbar32  = '$databar32  = array(';
    $strbar33  = '$databar33  = array(';
    $strbar34  = '$databar34  = array(';
    $strbar35  = '$databar35  = array(';
    $strbar36  = '$databar36  = array(';
    $strbar30m = '$databar30m = array(';
    $strbar31m = '$databar31m = array(';
    $strbar32m = '$databar32m = array(';
    $strbar33m = '$databar33m = array(';
    $strbar34m = '$databar34m = array(';
    $strbar35m = '$databar35m = array(';
    $strbar36m = '$databar36m = array(';
    $strbar30f = '$databar30f = array(';
    $strbar31f = '$databar31f = array(';
    $strbar32f = '$databar32f = array(';
    $strbar33f = '$databar33f = array(';
    $strbar34f = '$databar34f = array(';
    $strbar35f = '$databar35f = array(';
    $strbar36f = '$databar36f = array(';

    $partlin2 = 0;

    for ($i = $starttime; $i < $endtime; $i += $intvl) {

      $partline = 0;
      $partbar1 = 0;
      $partbar2 = 0;
      $partoutline   = 0;
      $parttotalline = 0;
      $partbar30m = 0;
      $partbar31m = 0;
      $partbar32m = 0;
      $partbar33m = 0;
      $partbar34m = 0;
      $partbar35m = 0;
      $partbar36m = 0;
      $partbar30f = 0;
      $partbar31f = 0;
      $partbar32f = 0;
      $partbar33f = 0;
      $partbar34f = 0;
      $partbar35f = 0;
      $partbar36f = 0;

      for ($j = 0; $j < $intvl; $j += 900) {

        $key = strval($i + $j);
        if (isset($incount[$key])) {
          $partline += $incount[$key];
          if (isset($outcount[$key])) {
            $partlin2 += ($incount[$key] - $outcount[$key]);
            $partoutline += $outcount[$key];
            $parttotalline += $totalcount[$key];
          }
        }
        if (isset($attrcount['male']['0'][$key])) {
          $partbar1 += ($attrcount['male']['0'][$key]  +
                        $attrcount['male']['10'][$key] +
                        $attrcount['male']['20'][$key] +
                        $attrcount['male']['30'][$key] +
                        $attrcount['male']['40'][$key] +
                        $attrcount['male']['50'][$key] +
                        $attrcount['male']['60'][$key]);

          $partbar30m += $attrcount['male']['0'][$key];
          $partbar31m += $attrcount['male']['10'][$key];
          $partbar32m += $attrcount['male']['20'][$key];
          $partbar33m += $attrcount['male']['30'][$key];
          $partbar34m += $attrcount['male']['40'][$key];
          $partbar35m += $attrcount['male']['50'][$key];
          $partbar36m += $attrcount['male']['60'][$key];

          $datac2['0']  += $attrcount['male']['0'][$key];
          $datac2['10'] += $attrcount['male']['10'][$key];
          $datac2['20'] += $attrcount['male']['20'][$key];
          $datac2['30'] += $attrcount['male']['30'][$key];
          $datac2['40'] += $attrcount['male']['40'][$key];
          $datac2['50'] += $attrcount['male']['50'][$key];
          $datac2['60'] += $attrcount['male']['60'][$key];
        }
        if (isset($attrcount['female']['0'][$key])) {
          $partbar2 += ($attrcount['female']['0'][$key] +
                        $attrcount['female']['10'][$key] +
                        $attrcount['female']['20'][$key] +
                        $attrcount['female']['30'][$key] +
                        $attrcount['female']['40'][$key] +
                        $attrcount['female']['50'][$key] +
                        $attrcount['female']['60'][$key]);

          $partbar30f += $attrcount['female']['0'][$key];
          $partbar31f += $attrcount['female']['10'][$key];
          $partbar32f += $attrcount['female']['20'][$key];
          $partbar33f += $attrcount['female']['30'][$key];
          $partbar34f += $attrcount['female']['40'][$key];
          $partbar35f += $attrcount['female']['50'][$key];
          $partbar36f += $attrcount['female']['60'][$key];

          $datac3['0']  += $attrcount['female']['0'][$key];
          $datac3['10'] += $attrcount['female']['10'][$key];
          $datac3['20'] += $attrcount['female']['20'][$key];
          $datac3['30'] += $attrcount['female']['30'][$key];
          $datac3['40'] += $attrcount['female']['40'][$key];
          $datac3['50'] += $attrcount['female']['50'][$key];
          $datac3['60'] += $attrcount['female']['60'][$key];
        }
      }
      $datac1[0] += $partbar1;
      $datac1[1] += $partbar2;

      $strline .= strval($partline) . ', ';
      $strlin2 .= strval($partlin2) . ', ';
      $strbar1 .= strval($partbar1) . ', ';
      $strbar2 .= strval($partbar2) . ', ';

      $stroutline   .= $partoutline . ', ';
      $strtotalline .= $parttotalline . ', ';
      $strbar30  .= strval($partbar30m + $partbar30f) . ', ';
      $strbar31  .= strval($partbar31m + $partbar31f) . ', ';
      $strbar32  .= strval($partbar32m + $partbar32f) . ', ';
      $strbar33  .= strval($partbar33m + $partbar33f) . ', ';
      $strbar34  .= strval($partbar34m + $partbar34f) . ', ';
      $strbar35  .= strval($partbar35m + $partbar35f) . ', ';
      $strbar36  .= strval($partbar36m + $partbar36f) . ', ';
      $strbar30m .= strval($partbar30m) . ', ';
      $strbar31m .= strval($partbar31m) . ', ';
      $strbar32m .= strval($partbar32m) . ', ';
      $strbar33m .= strval($partbar33m) . ', ';
      $strbar34m .= strval($partbar34m) . ', ';
      $strbar35m .= strval($partbar35m) . ', ';
      $strbar36m .= strval($partbar36m) . ', ';
      $strbar30f .= strval($partbar30f) . ', ';
      $strbar31f .= strval($partbar31f) . ', ';
      $strbar32f .= strval($partbar32f) . ', ';
      $strbar33f .= strval($partbar33f) . ', ';
      $strbar34f .= strval($partbar34f) . ', ';
      $strbar35f .= strval($partbar35f) . ', ';
      $strbar36f .= strval($partbar36f) . ', ';
      //X軸ラベルの生成
      if($intvl < 86000){
        $strblxlabel = $strblxlabel . '"' . date('H:i', $i) . '",';
      }else{
        $strblxlabel = $strblxlabel . '"' . date('m/d H:i', $i) . '",';
      }
    }
    $strline .= ');';
    $strlin2 .= ');';
    $stroutline   .= ');';
    $strtotalline .= ');';
    $strbar1 .= ');';
    $strbar2 .= ');';
    $strbar30 .= ');';
    $strbar31 .= ');';
    $strbar32 .= ');';
    $strbar33 .= ');';
    $strbar34 .= ');';
    $strbar35 .= ');';
    $strbar36 .= ');';
    $strbar30m .= ');';
    $strbar31m .= ');';
    $strbar32m .= ');';
    $strbar33m .= ');';
    $strbar34m .= ');';
    $strbar35m .= ');';
    $strbar36m .= ');';
    $strbar30f .= ');';
    $strbar31f .= ');';
    $strbar32f .= ');';
    $strbar33f .= ');';
    $strbar34f .= ');';
    $strbar35f .= ');';
    $strbar36f .= ');';

    $strc1 = '$datac1 = array(' . strval($datac1[1]) . ', ' . strval($datac1[0]) . ');';
    $strc2 = '$datac2 = array(' . strval($datac2['60']) . ', ' . strval($datac2['50']) . ', ' .
                                  strval($datac2['40']) . ', ' . strval($datac2['30']) . ', ' .
                                  strval($datac2['20']) . ', ' . strval($datac2['10']) . ', ' .
                                  strval($datac2['0'])  . ');';
    $strc3 = '$datac3 = array(' . strval($datac3['60']) . ', ' . strval($datac3['50']) . ', ' .
                                  strval($datac3['40']) . ', ' . strval($datac3['30']) . ', ' .
                                  strval($datac3['20']) . ', ' . strval($datac3['10']) . ', ' .
                                  strval($datac3['0'])  . ');';

    $strblxlabel .= ');';

    $outstr  = '<?php'."\n\n";
    $outstr .= $strline . "\n";
    $outstr .= $strlin2 . "\n";
    $outstr .= $strbar1 . "\n";
    $outstr .= $strbar2 . "\n\n";
    $outstr .= $strc1 . "\n";
    $outstr .= $strc2 . "\n";
    $outstr .= $strc3 . "\n\n";
    $outstr .= $strblxlabel . "\n\n";
    $outstr .= $stroutline . "\n";
    $outstr .= $strtotalline . "\n";
    $outstr .= $strbar30 . "\n";
    $outstr .= $strbar31 . "\n";
    $outstr .= $strbar32 . "\n";
    $outstr .= $strbar33 . "\n";
    $outstr .= $strbar34 . "\n";
    $outstr .= $strbar35 . "\n";
    $outstr .= $strbar36 . "\n";
    $outstr .= $strbar30m . "\n";
    $outstr .= $strbar31m . "\n";
    $outstr .= $strbar32m . "\n";
    $outstr .= $strbar33m . "\n";
    $outstr .= $strbar34m . "\n";
    $outstr .= $strbar35m . "\n";
    $outstr .= $strbar36m . "\n";
    $outstr .= $strbar30f . "\n";
    $outstr .= $strbar31f . "\n";
    $outstr .= $strbar32f . "\n";
    $outstr .= $strbar33f . "\n";
    $outstr .= $strbar34f . "\n";
    $outstr .= $strbar35f . "\n";
    $outstr .= $strbar36f . "\n\n";
    $outstr .= '?>'."\n";

    $outputname = SMC_TMP_DIR.'/fa-inc-'.session_id().'-'.time().'.php';
    file_put_contents($outputname, $outstr);

    $retval = [];
    $retval['include'] = $outputname;
    $retval['sum_in']  = $sumincount;
    $retval['sum_out'] = $sumoutcount;
    $retval['sum_m']   = $summalecount;
    $retval['sum_f']   = $sumfemalecount;
    $retval['sum_today']   = $todaycount;
    $retval['sum_lastday'] = $lastdaycount;

    return $retval;
  }

}
