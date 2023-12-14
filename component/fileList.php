<?php
function fileEmpty(){
    $element = "<div class=\"card text-bg-danger mb-3\">
    <div class=\"card-body\">
      <h5 class=\"card-title\">No log file available</h5>
    </div>
  </div>";;
    echo $element;
}


function logList($i, $file, $file_creation_date, $bytes){
    $element = "
        <tr >
        <th scope=\"row\">$i</th>
        <td> <button id=\"logList\" value=\"$file\" type=\"button\" class=\"list-group-item list-group-item-action\" ><a class=\"dropdown-item \" href=\"index.php? getFileName=$file\">$file
        </a></button></td>
        <td>$file_creation_date</td>
        <td>$bytes</td>
    </tr>
        
    ";
    echo $element;
}