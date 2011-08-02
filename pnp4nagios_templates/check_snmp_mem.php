<?php
#
# Plugin: check_snmp_mem.pl
# Created by Charles JUDITH
#
# Memory usage
#
$ds_name[1] = "Memory usage";

$opt[1] = "--vertical-label 'MEMORY(MB)' -X0 --upper-limit " . ($MAX[1] * 120 / 100) . " -l0  --title \"Memory usage on $hostname\" ";

$maxgb = sprintf("%.1f", $MAX[1] / 1024.0 / 1024.0);

$def[1] =  "DEF:ram=$RRDFILE[1]:$DS[1]:MAX " ;
$def[1] .= "HRULE:$MAX[1]#2040d0:\"$maxgb GB RAM installed\" ";
$def[1] .= "HRULE:$WARN[1]#FFFF00:\"Warning\" ";
$def[1] .= "HRULE:$CRIT[1]#FF0000:\"Critical\" ";

$def[1] .= "'COMMENT:\\n' ";
$def[1] .= "AREA:ram#80ff40:\"RAM used     \" " ;
$def[1] .= "GPRINT:ram:LAST:\"%6.0lf MB last\" " ;
$def[1] .= "GPRINT:ram:AVERAGE:\"%6.0lf MB avg\" " ;
$def[1] .= "GPRINT:ram:MAX:\"%6.0lf MB max\\n\" ";

# Swap Usage

$ds_name[2] = "Swap usage";

$opt[2] = "--vertical-label 'MEMORY(MB)' -X0 --upper-limit " . ($MAX[2] * 120 / 100) . " -l0  --title \"Swap usage on $hostname\" ";

$maxgb2 = sprintf("%.1f", $MAX[2] / 1024.0 / 1024.0);

$def[2] =  "DEF:swap=$RRDFILE[2]:$DS[2]:MAX " ;
$def[2] .= "HRULE:$MAX[2]#2040d0:\"$maxgb2 GB RAM installed\" ";
$def[2] .= "HRULE:$WARN[1]#FFFF00:\"Warning\" ";
$def[2] .= "HRULE:$CRIT[1]#FF0000:\"Critical\" ";

$def[2] .= "AREA:swap#008030:\"SWAP used    \":STACK " ;
$def[2] .= "GPRINT:swap:LAST:\"%6.0lf MB last\" " ;
$def[2] .= "GPRINT:swap:AVERAGE:\"%6.0lf MB avg\" " ;
$def[2] .= "GPRINT:swap:MAX:\"%6.0lf MB max\\n\" " ;

?>
