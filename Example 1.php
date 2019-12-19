// Example 1: Hello function (no accessToken needed)
// ---------------------------------------------------------------------
$url = 'https://api-stage.bimplus.net/v2/hello';
$verb = 'GET';
 
// Create object
$request = new BimplusRestClient(
    $url,
    $verb
);
 
// Execute
$request->execute();
$response = $request->getResponse();
 
echo '<pre>';
print_r(json_decode($response));
echo '</pre>';