<?php
function getHardDrivePartitions($deviceID, $percentageUsed, $freeSpace, $size) {
    $element = "
    <div class=\"col-md\">
        <div class=\"card\">
            <h5 class=\"card-header\">Local Disk $deviceID</h5>
            <div class=\"card-body d-block\">
                <div class=\"col\">
                    <div class=\"progress\" role=\"progressbar\" aria-label=\"Example with label\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                        <div class=\"progress-bar progress-bar-striped bg-primary\" style=\"width: $percentageUsed%\">$percentageUsed%</div>
                    </div>
                </div>
                <div class=\"col\">
                    <h6>$freeSpace free from $size</h6>
                </div>
            </div>
        </div>
    </div>
    ";
    echo $element;
}
?>