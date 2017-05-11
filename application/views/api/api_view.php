<?php
    echo json_encode($response);
/* set out document type to text/javascript instead of text/html */
header("Content-type: text/javascript");

/* encode the array as json */
echo json_encode($response);
?>