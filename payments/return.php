<?php
/*
 * How to show a return page to the customer.
 *
 * In this example we retrieve the order stored in the database.
 * Here, it's unnecessary to use the Mollie API Client.
 */

/*
 * NOTE: The examples are using a text file as a database.
 * Please use a real database like MySQL in production code.
 */
require_once "../functions.php";
require_once "../downloader/settings.php";
require_once "../downloader/functions.php";

$order_id = $_GET["order_id"];
$status = database_read($order_id);
$protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
$hostname = $_SERVER['HTTP_HOST'];
$this_file = "return.php";
$script_uri = $protocol . $hostname . $_SERVER['PHP_SELF'];

/*
 * Determine the url parts to these example files.
 */
$protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
$hostname = $_SERVER['HTTP_HOST'];
$path = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);

if ($status == 'paid') {

    $download_page_url = $base_url . '/page.php?dl-' . $order_id;
    $expire_date = time() + ($expire_in_hours * 60 * 60);
    create_download_file(
        array(
            // 'customer_name' => $_POST['first_name'].' '.$_POST['last_name'],
            // 'business_name' => $_POST['payer_business_name'],
            // 'customer_email' => $payer_email,
            'txn_id' => $order_id,
            'expire_date' => $expire_date,
            'expire_time' => $expire_in_hours,
            // 'purchase_date' => $_POST['payment_date'],
            'purchase_amount' => 12,50,
            'download_page_url' => $download_page_url,
            'product_name' => "reisgids Andalusia"
        )
    );

    // echo "<p>Your payment status is '" . htmlspecialchars($status) . "'.</p>";
    // echo "<p>";
    // echo '<a href="' . $protocol . '://' . $hostname . $path . '/create-payment.php">Create a payment</a><br>';
    // echo '<a href="' . $protocol . '://' . $hostname . $path . '/create-ideal-payment.php">Create an iDEAL payment</a><br>';
    // echo '<a href="' . $protocol . '://' . $hostname . $path . '/list-payments.php">List payments</a><br>';

    //The url you wish to send the POST request to
    $url = $protocol . '://' . $hostname . $path . '/../downloader/page.php?thankyou';

    //The data you want to send via POST
    $fields = [
        'order_id'      => $order_id
    ];

    //url-ify the data for the POST
    $fields_string = http_build_query($fields);

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute post
    $result = curl_exec($ch);
    echo $result;
    // echo '<a href="' . $protocol . '://' . $hostname . $path . '/../downloader/page.php?thankyou?order_id=' . $order_id . '">Test</a><br>';
    // echo "</p>";
} else {
    echo 'Er ging iets fout bij de verwerking van uw betaling, u kan het ' . '<a href="' . $protocol . '://' . $hostname . $path . '/../payments/create-payment.php">hier</a>' . ' opnieuw proberen.<br>';
    echo 'Klik ' . '<a href="' . $protocol . '://' . $hostname . '/index.php">hier</a>' . ' om terug te keren naar de homepagina.<br>';
    // error_log(date('[Y-m-d H:i e] '). "Invalid Payment Status: $payment_status" . PHP_EOL, 3, LOG_FILE);
}
