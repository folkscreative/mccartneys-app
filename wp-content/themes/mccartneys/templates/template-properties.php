<?php

/**
 * The template for displaying the Properties.
 *
 * This page template will display any functions hooked into the `Properties` action.
 * By default this includes a property search form, the page content itself and featured properties. To change the order or toggle these components
 * use the Properties Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Properties 
 *
 * @package McCartneys
 * 
 */

function get_reapit_access_token()
{
    $client_id = '4h1h83g37v2488nk3qnbc9dhin';
    $client_secret = '1s1n72ic94njnlqsbl433tpaaqdnkso6olj9bo7rpb3es9255dsk';
    $auth_url = 'https://connect.reapit.cloud/token';

    $response = wp_remote_post($auth_url, array(
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode($client_id . ':' . $client_secret),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ),
        'body' => array(
            'grant_type' => 'client_credentials'
        )
    ));

    if (is_wp_error($response)) {
        echo '<p>Error: ' . $response->get_error_message() . '</p>';
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if (isset($data->access_token)) {
        return $data->access_token;
    } else {
        echo '<p>Failed to obtain access token. Response: ' . $body . '</p>';
        return false;
    }
}
function get_properties($customer_id, $page_number = 1, $page_size = 100)
{
    $access_token = get_reapit_access_token();
    if (!$access_token) {
        return false;
    }

    $api_url = "https://platform.reapit.cloud/properties/?pageSize=$page_size&pageNumber=$page_number&marketingMode=selling&sellingStatus=forSale&sellingStatus=underOffer";
    $response = wp_remote_get($api_url, array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $access_token,
            'api-version' => '2020-01-31',
            'reapit-customer' => $customer_id
        )
    ));

    if (is_wp_error($response)) {
        echo '<p>Error: ' . $response->get_error_message() . '</p>';
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if (isset($data->statusCode) && $data->statusCode == 401) {
        echo '<p>Error: ' . $data->description . '</p>';
        return false;
    }

    if (isset($data->statusCode) && $data->statusCode != 200) {
        echo '<p>Unexpected error: ' . $data->description . ' (Status code: ' . $data->statusCode . ')</p>';
        return false;
    }

    return [
        'properties' => isset($data->_embedded) ? $data->_embedded : [],
        'total_pages' => isset($data->pageCount) ? $data->pageCount : 1,
        'current_page' => $page_number
    ];
}

function get_property_images($property_id)
{
    $access_token = get_reapit_access_token();
    if (!$access_token) {
        return false;
    }

    $api_url = 'https://platform.reapit.cloud/propertyImages/?propertyId=' . $property_id;
    $response = wp_remote_get($api_url, array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $access_token,
            'api-version' => '2020-01-31',
            'reapit-customer' => 'MCC'
        )
    ));

    if (is_wp_error($response)) {
        echo '<p>Error: ' . $response->get_error_message() . '</p>';
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    return isset($data->_embedded) ? $data->_embedded : false;
}

/**
 * Template Name: Properties
 * Description: A template to display property listings
 */
?>
<?php

/**
 * Template Name: Properties
 * Description: A template to display property listings
 */

get_header();

$customer_id = 'MCC'; // Use the actual customer ID provided
$page_number = isset($_GET['page']) ? intval($_GET['page']) : 1;

$result = get_properties($customer_id, $page_number);

$properties = $result['properties'];
$total_pages = $result['total_pages'];
$current_page = $result['current_page'];
?>

<div class="property-listing">
    <?php if ($properties && is_array($properties)) : ?>
        <h1>Available Properties</h1>
        <ul>
            <?php foreach ($properties as $property) : ?>
                <li>
                    <h2><?php echo esc_html($property->address->line1 . ', ' . $property->address->line2 . ', ' . $property->address->postcode); ?></h2>
                    <p><?php echo esc_html($property->description); ?></p>
                    <?php
                    $images = get_property_images($property->id);
                    if ($images && is_array($images)) :
                        $first_image = $images[0];
                    ?>
                        <div class="property-images">
                            <img src="<?php echo esc_url($first_image->url); ?>" alt="<?php echo esc_attr($first_image->caption); ?>">
                        </div>
                    <?php endif; ?>
                    <p>Price: £<?php echo number_format($property->selling->price, 2); ?></p>
                    <a href="<?php echo get_permalink(get_page_by_path('property-details')) . '?property_id=' . $property->id; ?>">
                        View Details
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No properties found or failed to fetch data.</p>
        <?php if ($properties === false) : ?>
            <p>Failed to fetch properties. Please check your API credentials and try again.</p>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php if ($total_pages > 1) : ?>
    <div class="pagination">
        <?php if ($current_page > 1) : ?>
            <a href="?page=<?php echo $current_page - 1; ?>">&laquo; Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <a href="?page=<?php echo $i; ?>"<?php if ($i == $current_page) echo ' class="active"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if ($current_page < $total_pages) : ?>
            <a href="?page=<?php echo $current_page + 1; ?>">Next &raquo;</a>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php
get_footer();
?>
