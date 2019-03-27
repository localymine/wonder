<?php

namespace Saka\Grapher;

/**
 * Class Calculator
 * @package Saka\Grapher
 */
class Calculator
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
   *      - include        => string 集計済みインクルードファイルへのパス
   *      - sumincount     => int 期間内の入場者数
   *      - sumoutcount    => int 期間内の退場者数
   *      - summalecount   => int 期間内男性入場者数
   *      - sumfemalecount => int 期間内女性入場者数
   *      - todaycount     => int 本日の入場者数
   *      - lastdaycount   => int 昨日の入場者数
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

    $len   = 86400;
    $intvl =  3600;
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
      $filestart = intval(date('Ymd',$starttime));
    } else {
      $filestart = $year * 10000 + $mon * 100 + $day;
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
              $ttime = (string) strtotime(substr($i, 0, 4).'-'.substr($i, 4, 2).'-'.substr($i, 6, 2).' '.$items[0]);

              if (($ttime >= $starttime) && ($ttime < $endtime)) {
                if (isset($incount[$ttime])) {
                  $incount[$ttime] += intval($items[1]);
                } else {
                  $incount[$ttime]  = intval($items[1]);
                }
                if (isset($outcount[$ttime])) {
                  $outcount[$ttime] += intval($items[2]);
                } else {
                  $outcount[$ttime]  = intval($items[2]);
                }
                if (isset($totalcount[$ttime])) {
                  $totalcount[$ttime] += intval($items[3]);
                } else {
                  $totalcount[$ttime]  = intval($items[3]);
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
          $lines = explode("\n",$data);

          foreach ($lines as $line) {
            if (substr($line, 2, 1) == ':') {
              $items = explode(',',$line);
              $ttime = (string)strtotime(substr($i, 0, 4).'-'.substr($i, 4, 2).'-'.substr($i, 6, 2).' '.$items[0]);

              if (($starttime <= $ttime) && ($ttime < $endtime)) {
                $tkey = (string)$ttime;
                if (isset($attrcount['male']['0'][$tkey])) {
                  $attrcount['male']['0'][$tkey]  += intval($items[1]);
                } else {
                  $attrcount['male']['0'][$tkey]   = intval($items[1]);
                }
                if (isset($attrcount['male']['10'][$tkey])) {
                  $attrcount['male']['10'][$tkey] += intval($items[3]);
                } else {
                  $attrcount['male']['10'][$tkey]  = intval($items[3]);
                }
                if (isset($attrcount['male']['20'][$tkey])) {
                  $attrcount['male']['20'][$tkey] += intval($items[5]);
                } else {
                  $attrcount['male']['20'][$tkey]  = intval($items[5]);
                }
                if (isset($attrcount['male']['30'][$tkey])) {
                  $attrcount['male']['30'][$tkey] += intval($items[7]);
                } else {
                  $attrcount['male']['30'][$tkey]  = intval($items[7]);
                }
                if (isset($attrcount['male']['40'][$tkey])) {
                  $attrcount['male']['40'][$tkey] += intval($items[9]);
                } else {
                  $attrcount['male']['40'][$tkey]  = intval($items[9]);
                }
                if (isset($attrcount['male']['50'][$tkey])) {
                  $attrcount['male']['50'][$tkey] += intval($items[11]);
                } else {
                  $attrcount['male']['50'][$tkey]  = intval($items[11]);
                }
                if (isset($attrcount['male']['60'][$tkey])) {
                  $attrcount['male']['60'][$tkey] += intval($items[13]);
                } else {
                  $attrcount['male']['60'][$tkey]  = intval($items[13]);
                }

                if (isset($attrcount['female']['0'][$tkey])) {
                  $attrcount['female']['0'][$tkey]  += intval($items[2]);
                } else {
                  $attrcount['female']['0'][$tkey]   = intval($items[2]);
                }
                if (isset($attrcount['female']['10'][$tkey])) {
                  $attrcount['female']['10'][$tkey] += intval($items[4]);
                } else {
                  $attrcount['female']['10'][$tkey]  = intval($items[4]);
                }
                if (isset($attrcount['female']['20'][$tkey])) {
                  $attrcount['female']['20'][$tkey] += intval($items[6]);
                } else {
                  $attrcount['female']['20'][$tkey]  = intval($items[6]);
                }
                if (isset($attrcount['female']['30'][$tkey])) {
                  $attrcount['female']['30'][$tkey] += intval($items[8]);
                } else {
                  $attrcount['female']['30'][$tkey]  = intval($items[8]);
                }
                if (isset($attrcount['female']['40'][$tkey])) {
                  $attrcount['female']['40'][$tkey] += intval($items[10]);
                } else {
                  $attrcount['female']['40'][$tkey]  = intval($items[10]);
                }
                if (isset($attrcount['female']['50'][$tkey])) {
                  $attrcount['female']['50'][$tkey] += intval($items[12]);
                } else {
                  $attrcount['female']['50'][$tkey]  = intval($items[12]);
                }
                if (isset($attrcount['female']['60'][$tkey])) {
                  $attrcount['female']['60'][$tkey] += intval($items[14]);
                } else {
                  $attrcount['female']['60'][$tkey]  = intval($items[14]);
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

    //生成した変数は
    //$incount[タイムスタンプ]
    //$outcount[タイムスタンプ]
    //$totalcount[タイムスタンプ]
    //$attrcount[male,female][0,10,20,30,40,50,60][タイムスタンプ]
    //これを整形する。
    //$intvlの範囲で集計
    //dataline = array(入場者数合計=incount)
    //databar1 = array(男性入場者数=attrcount[male][0]+[10]+[20]+[30]+[40]+[50]+[60])
    //databar2 = array(女性入場者数=attrcount[female][0]+[10]+[20]+[30]+[40]+[50]+[60])
    //datac1 = array(男女別入場者数=sum(databar1),sum(databar2))
    //datac2 = array(男性年齢別=attrcount[male]sum([0]),sum[10],sum[20],sum[[30],sum[40],sum[50],sum[60])
    //datac3 = array(女性年齢別=attrcount[female]sum([0]),sum[10],sum[20],sum[[30],sum[40],sum[50],sum[60])

    $dataline = [];
    $datalin2 = [];
    $databar1 = [];
    $databar2 = [];
    $datac1 = [0, 0];
    $datac2 = ['0' => 0, '10' => 0, '20' => 0, '30' => 0, '40' => 0, '50' => 0, '60' => 0];
    $datac3 = ['0' => 0, '10' => 0, '20' => 0, '30' => 0, '40' => 0, '50' => 0, '60' => 0];

    $strline = '$dataline = array(';
    $strlin2 = '$datalin2 = array(';
    $strbar1 = '$databar1 = array(';
    $strbar2 = '$databar2 = array(';

    $partline = 0;
    $partlin2 = 0;
    $partbar1 = 0;
    $partbar2 = 0;

    for ($i = $starttime; $i < $endtime; $i += $intvl) {

      $partline = 0;
      $partbar1 = 0;
      $partbar2 = 0;

      for ($j = 0; $j < $intvl; $j += 900) {

        $key = strval($i + $j);
        $partline += $incount[$key];
        $partlin2 += ($incount[$key] - $outcount[$key]);
        $partbar1 += ($attrcount['male']['0'][$key]  +
                      $attrcount['male']['10'][$key] +
                      $attrcount['male']['20'][$key] +
                      $attrcount['male']['30'][$key] +
                      $attrcount['male']['40'][$key] +
                      $attrcount['male']['50'][$key] +
                      $attrcount['male']['60'][$key]);

        $partbar2 += ($attrcount['female']['0'][$key] +
                      $attrcount['female']['10'][$key] +
                      $attrcount['female']['20'][$key] +
                      $attrcount['female']['30'][$key] +
                      $attrcount['female']['40'][$key] +
                      $attrcount['female']['50'][$key] +
                      $attrcount['female']['60'][$key]);

        $datac2['0']  += $attrcount['male']['0'][$key];
        $datac2['10'] += $attrcount['male']['10'][$key];
        $datac2['20'] += $attrcount['male']['20'][$key];
        $datac2['30'] += $attrcount['male']['30'][$key];
        $datac2['40'] += $attrcount['male']['40'][$key];
        $datac2['50'] += $attrcount['male']['50'][$key];
        $datac2['60'] += $attrcount['male']['60'][$key];

        $datac3['0']  += $attrcount['female']['0'][$key];
        $datac3['10'] += $attrcount['female']['10'][$key];
        $datac3['20'] += $attrcount['female']['20'][$key];
        $datac3['30'] += $attrcount['female']['30'][$key];
        $datac3['40'] += $attrcount['female']['40'][$key];
        $datac3['50'] += $attrcount['female']['50'][$key];
        $datac3['60'] += $attrcount['female']['60'][$key];
      }
      $datac1[0] += $partbar1;
      $datac1[1] += $partbar2;

      $strline .= strval($partline) . ', ';
      $strlin2 .= strval($partlin2) . ', ';
      $strbar1 .= strval($partbar1) . ', ';
      $strbar2 .= strval($partbar2) . ', ';
    }
    $strline .= ');';
    $strlin2 .= ');';
    $strbar1 .= ');';
    $strbar2 .= ');';

    $strc1 = '$datac1 = array(' . strval($datac1[1]) . ', ' . strval($datac1[0]) . ');';
    $strc2 = '$datac2 = array(' . strval($datac2['60']) . ', ' . strval($datac2['50']) . ', ' .
                                  strval($datac2['40']) . ', ' . strval($datac2['30']) . ', ' .
                                  strval($datac2['20']) . ', ' . strval($datac2['10']) . ', ' .
                                  strval($datac2['0'])  . ');';
    $strc3 = '$datac3 = array(' . strval($datac3['60']) . ', ' . strval($datac3['50']) . ', ' .
                                  strval($datac3['40']) . ', ' . strval($datac3['30']) . ', ' .
                                  strval($datac3['20']) . ', ' . strval($datac3['10']) . ', ' .
                                  strval($datac3['0'])  . ');';

    $outstr  = '<?php'."\n\n";
    $outstr .= $strline . "\n";
    $outstr .= $strlin2 . "\n";
    $outstr .= $strbar1 . "\n";
    $outstr .= $strbar2 . "\n\n";
    $outstr .= $strc1 . "\n";
    $outstr .= $strc2 . "\n";
    $outstr .= $strc3 . "\n\n";
    $outstr .= '?>'."\n";

    $outputname = SMC_TMP_DIR.'/fa-inc-'.session_id().'-'.time().'.php';
    file_put_contents($outputname, $outstr);

    $retval = [];
    $retval['include'] = $outputname;
    $retval['sumincount'] = $sumincount;
    $retval['sumoutcount'] = $sumoutcount;
    $retval['summalecount'] = $summalecount;
    $retval['sumfemalecount'] = $sumfemalecount;
    $retval['todaycount'] = $todaycount;
    $retval['lastdaycount'] = $lastdaycount;

    return $retval;
  }

}
