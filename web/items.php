<html>
<head>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<?php
	$input_string = $_GET["q"];
	$sanitized_string = filter_var($input_string, FILTER_SANITIZE_STRING);
	$url = "https://redsky.target.com/v1/plp/search?count=5&offset=0&keyword=" . urlencode($input_string) . "&sortby=relevance&excludes=taxonomy,promotion,relatedItemsBucket,bulk_ship,rating_and_review_reviews,rating_and_review_statistics,question_answer_statistics";
	$contents = file_get_contents($url);
	$results = json_decode($contents, true);
?>
</head>
<body>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
  <thead>
    <tr bgcp>
      <th><abbr title="Item">item</abbr></th>
      <th><abbr title="TCIN">TCIN</abbr></th>
      <th><abbr title="DPCI">DPCI</abbr></th>
      <th><abbr title="Price">price</abbr></th>
      <th><abbr title="Store">store avail.</abbr></th>
      <th><abbr title="Online">.com avail.</abbr></th>
    </tr>
  </thead>
    <tbody>
    <tr bgcolor="db7d9e">
      <td><?php  echo $results['search_response']['items']['Item']['0']['title']; ?></td>
      <td><?php  echo $results['search_response']['items']['Item']['0']['tcin']; ?> </td>
      <td><?php  echo $results['search_response']['items']['Item']['0']['dpci']; ?></td>
      <td><?php  echo $results['search_response']['items']['Item']['0']['offer_price']['formatted_price']; ?></td>
      <td><?php  $stock_store_0 = $results['search_response']['items']['Item']['0']['is_out_of_stock_in_all_store_locations'];  if('$stock_store_0' == 'false'){ echo 'no';} else { echo 'yes';} ?></td>
      <td><?php  $stock_online_0 = $results['search_response']['items']['Item']['0']['is_out_of_stock_in_all_online_locations'];  if('$stock_online_0' == 'false'){ echo 'yes';} else { echo 'no';} ?></td>
    </tr>
      <tr>
      <td><?php  echo $results['search_response']['items']['Item']['1']['title']; ?></td>
      <td><?php  echo $results['search_response']['items']['Item']['1']['tcin']; ?> </td>
      <td><?php  echo $results['search_response']['items']['Item']['1']['dpci']; ?></td>
      <td><?php  echo $results['search_response']['items']['Item']['1']['offer_price']['formatted_price']; ?></td>
      <td><?php  $stock_store_1 = $results['search_response']['items']['Item']['1']['is_out_of_stock_in_all_store_locations'];  if('$stock_store_1' == 'false'){ echo 'no';} else { echo 'yes';} ?></td>
      <td><?php  $stock_online_1 = $results['search_response']['items']['Item']['1']['is_out_of_stock_in_all_online_locations'];  if('$stock_online_1' == 'false'){ echo 'yes';} else { echo 'no';} ?></td>
    </tr>
    <tr>
      <td><?php  echo $results['search_response']['items']['Item']['2']['title']; ?></td>
      <td><?php  echo $results['search_response']['items']['Item']['2']['tcin']; ?> </td>
      <td><?php  echo $results['search_response']['items']['Item']['2']['dpci']; ?></td>
      <td><?php  echo $results['search_response']['items']['Item']['2']['offer_price']['formatted_price']; ?></td>
      <td><?php  $stock_store_2 = $results['search_response']['items']['Item']['2']['is_out_of_stock_in_all_store_locations'];  if('$stock_store_2' == 'false'){ echo 'no';} else { echo 'yes';} ?></td>
      <td><?php  $stock_online_2 = $results['search_response']['items']['Item']['2']['is_out_of_stock_in_all_online_locations'];  if('$stock_online_2' == 'false'){ echo 'yes';} else { echo 'no';} ?></td>
    </tr>
    <tr>
      <td><?php  echo $results['search_response']['items']['Item']['3']['title']; ?></td>
      <td><?php  echo $results['search_response']['items']['Item']['3']['tcin']; ?> </td>
      <td><?php  echo $results['search_response']['items']['Item']['3']['dpci']; ?></td>
      <td><?php  echo $results['search_response']['items']['Item']['3']['offer_price']['formatted_price']; ?></td>
      <td><?php  $stock_store_3 = $results['search_response']['items']['Item']['3']['is_out_of_stock_in_all_store_locations'];  if('$stock_store_3' == 'false'){ echo 'no';} else { echo 'yes';} ?></td>
      <td><?php  $stock_online_3 = $results['search_response']['items']['Item']['3']['is_out_of_stock_in_all_online_locations'];  if('$stock_online_3' == 'false'){ echo 'yes';} else { echo 'no';} ?></td>
    </tr>
    <tr>
      <td><?php  echo $results['search_response']['items']['Item']['4']['title']; ?></td>
      <td><?php  echo $results['search_response']['items']['Item']['4']['tcin']; ?> </td>
      <td><?php  echo $results['search_response']['items']['Item']['4']['dpci']; ?></td>
      <td><?php  echo $results['search_response']['items']['Item']['4']['offer_price']['formatted_price']; ?></td>
      <td><?php  $stock_store_4 = $results['search_response']['items']['Item']['4']['is_out_of_stock_in_all_store_locations'];  if('$stock_store_4' == 'false'){ echo 'no';} else { echo 'yes';} ?></td>
      <td><?php  $stock_online_4 = $results['search_response']['items']['Item']['4']['is_out_of_stock_in_all_online_locations'];  if('$stock_online_4' == 'false'){ echo 'yes';} else { echo 'no';} ?></td>
    </tr>
  </tbody>
</table>

<?php

echo "<br><br>Debug errors: ";
echo json_last_error(); // print number of errors
echo "<br>Message: ";
echo json_last_error_msg(); // print last error

?>
</body>
</html>
