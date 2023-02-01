<?php

/**
 * conversion des bytes avec l'unité de mesure appropriée
 *
 * @param  int|float $bytes
 * @param  int $precision
 * @return string
 */
function convertSize(int|float $bytes, int $precision = 2) : string
{
  // les unités de mesure sont mises dans un tableau
  $unitMeasurements = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB', 'HB');

  // On effectue une boucle de manière à s'assurer que l'on trouve la bonne unité à envoyer
  foreach ($unitMeasurements as $index => $unitMeasurement) {
    // Au cas où un nombre trop grand serait envoyé (plus de 1024 HB), nous forçons à arrêter la boucle
    if ($bytes < 1024 || $index === count($unitMeasurements) - 1) {
      return round($bytes, $precision) . ' ' . $unitMeasurement;
    } else {
      $bytes = $bytes / 1024;
    }
  }
}