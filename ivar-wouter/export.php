<!---PDF EXPORT--->
<?php
require('./components/dbconn.php');
include "./components/minibots/minibots.class.php";
use Dompdf\Dompdf;
if ($_GET['download'] == 'Download'){
    $maand = $_GET['Maand'];
    $jaar = $_GET['Jaar'];


    // Include autoloader
    require_once 'dompdf/autoload.inc.php';
    require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
    require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
    require_once 'dompdf/lib/html5lib/Parser.php';


    //initialize dompdf class
    $document = new Dompdf();
    $output = "
            <table>
                <tr>
                    <th>id</th>
                    <th>ip</th>
                    <th>country</th>
                    <th>page</th>
                    <th>browser</th>
                    <th>dag</th>
                    <th>maand</th>
                    <th>jaar</th>
                    <th>device</th>
                </tr>
        ";

    $sql = "SELECT * FROM pdf WHERE jaar='$jaar' AND maand='$maand'";
    foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
        $id = $row["id"];
        $ip = $row["ip"];
        
        $mb=new Minibots();
		$obj = $mb->ipToGeo($ip="");
		$obj->country_name;
        $ip = $row["ip"];
        $page = $row["page"];
        $browser = $row["browser"];
        $dag = $row["dag"];
        $maand = $row["maand"];
        $jaar = $row["jaar"];
        $deskmob = $row["deskmob"];

        $output .= "
                  <tr>
                      <td style='border-left: 1px solid black;'>".$id."</td>
                      <td style='border-left: 1px solid black;'>".$ip."</td>
                      <td style='border-left: 1px solid black;'>".$obj->country_name."</td>
                      <td style='border-left: 1px solid black;'>".$page."</td>
                      <td style='border-left: 1px solid black;'>".$browser."</td>
                      <td style='border-left: 1px solid black;'>".$dag."</td>
                      <td style='border-left: 1px solid black;'>".$maand."</td>
                      <td style='border-left: 1px solid black;'>".$jaar."</td>
                      <td style='border-left: 1px solid black;'>".$deskmob."</td>
                  </tr>
            ";
    }
    $output .= "</table>";



    //echo $output;
    $document->loadHtml($output);

    //set page size and orientation
    $document->setPaper('A4', 'Landscape');

    //Render the HTML as PDF
    $document->render();

    //Get output of generated pdf in Browser
    //1 = Download
    //0 = Preview
    $document->stream($maand." - ".$jaar, array("Attachment"=>1));
}
?>