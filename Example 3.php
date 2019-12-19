// Example 3: Update user data
// ---------------------------------------------------------------------
$userId = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx'; // Bimplus userID
$url = 'https://api-stage.bimplus.net/v2/users/' . $userId;
$verb = 'PUT';
$accessToken = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx'; // accessToken
$requestBody = array(
    'email' => 'new.email@allplan.com'
);
 
// Create object
$request = new BimplusRestClient(
    $url,
    $verb,
    $accessToken,
    $requestBody
);
 
// Execute
$request->execute();
$response = $request->getResponse();
 
echo '<pre>';
print_r(json_decode($response));
echo '</pre>';