<?php

if (!function_exists('rateLabel')) {
  function rateLabel($rating)
  {
    switch ($rating) {
      case 1:
        return "Tidak Baik";
        break;

      case 2:
        return "Kurang Baik";
        break;

      case 3:
        return "Baik";
        break;

      case 4:
        return "Sangat Baik";
        break;
    }
  }
}

if (!function_exists('nilaPersepsi')) {
  function nilaPersepsi($konversiIKM)
  {
    if ($konversiIKM >= 25.00 && $konversiIKM <= 64.99) {
      return (object) [
        'mutu' => 'D',
        'kinerja' => "Tidak Baik"
      ];
    } elseif ($konversiIKM >= 65.00 && $konversiIKM <= 76.00) {
      return (object) [
        'mutu' => 'C',
        'kinerja' => "Kurang Baik"
      ];
    } elseif ($konversiIKM >= 76.01 && $konversiIKM <= 88.30) {
      return (object) [
        'mutu' => 'B',
        'kinerja' => "Baik"
      ];
    } elseif ($konversiIKM >= 88.31 && $konversiIKM <= 100.00) {
      return (object) [
        'mutu' => 'A',
        'kinerja' => "Sangat Baik"
      ];
    } else {
      return (object) [
        'mutu' => 'X',
        'kinerja' => "Nilai Invalid"
      ];
    }
  }
}

if (!function_exists('getPercentage')) {
  function getPercentage($number, $total)
  {
    if($total == 0) {
      return 0;
    }
    return $number * 100 / $total;
  }
}
