// Example 2: Get user data
// ---------------------------------------------------------------------
$userId = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx'; // Bimplus userID
$url = 'https://api-stage.bimplus.net/v2/users/' . $userId;
$verb = 'GET';
$accessToken = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx'; // accessToken
 
// Create object
$request = new BimplusRestClient(
    $url,
    $verb,
    $accessToken
);
 
// Execute
$request->execute();
$response = $request->getResponse();
 
echo '<pre>';
print_r(json_decode($response));
echo '</pre>';