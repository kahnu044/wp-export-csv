<?php


function array_csv_download( $array, $filename = "export.csv", $delimiter=";" )
{

    header( 'Content-Type: application/csv' );
    header( 'Content-Disposition: attachment; filename="' . $filename . '";' );
    header('Pragma: no-cache');


    // clean output buffer
    ob_end_clean();

    $handle = fopen( 'php://output', 'w' );

    $csv_header=array();

    $csv_header[] = 'Enquiry id';
    $csv_header[] = 'Date';
    $csv_header[] = 'Name';
    $csv_header[] = 'Email';

    // Assign Column Header Name
    fputcsv($handle, $csv_header, $delimiter);

    // Assign CSV values
    foreach ( $array as $value ) {
        fputcsv( $handle, $value, $delimiter );
    }

    fclose( $handle );

    // flush buffer
    ob_flush();

    // use exit to get rid of unexpected output afterward
    exit();
}

// Filename
$filename = 'Wp-Export-CSV-'.date('Y-m-d').'.csv';

$data = array(
    array(1,2,3,4),
    array(4,2,3,4)
);


array_csv_download($data,$filename);

?>
