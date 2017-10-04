<?php
 $track = $_GET['audio']; 
//$track = "//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907092948_Agente895_VECI0458341132240_1833_0458341132240_1_0.mp3";
if(file_exists($track)) {
    header('Content-type: audio/mpeg');
    header('Content-length: ' . filesize($track));
    header('Content-Disposition: filename="sometrack.mp3"');
    header('X-Pad: avoid browser bug');
    header('Cache-Control: no-cache');
    print file_get_contents($track);
} else {
    echo "No existe Audio";
}

    ?> 
              