<?php
# $Id$
# PHPlot test: Plot auto-range test
# This is a parameterized test. See the script named at the bottom for details.
$tp = array(
  'subtitle'    => 'Range Sign Case A: 0 < min < max',
  'min' => 502,            # Lowest data value
  'max' => 598,            # Highest data value
  'zm' => 0,               # Range zero magnet
  );
require 'range-auto.php';
