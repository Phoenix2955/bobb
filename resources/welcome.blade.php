
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.*/style.css">
    <script src="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.*/viewer3D.js"></script>
</head>

<body>
  <div id="forgeViewer"></div>
</body>
<script>

var viewer;
var options = {
    env: 'AutodeskProduction',
    api: 'derivativeV2',  // for models uploaded to EMEA change this option to 'derivativeV2_EU'
    getAccessToken: function(onTokenReady) {
        //
        // TODO: Replace static access token string below with call to fetch new token from your backend
        // Both values are provided by Forge's Authentication (OAuth) API.
        //
        // Example Forge's Authentication (OAuth) API return value:
        // {
        //    "access_token": "<YOUR_APPLICATION_TOKEN>",
        //    "token_type": "Bearer",
        //    "expires_in": 86400
        // }
        //
		var token = <?php echo json_encode($token); ?>;

        var timeInSeconds = 3600; // Use value provided by Forge Authentication (OAuth) API
        onTokenReady(token, timeInSeconds);
    }
};

var documentId = 'urn:' + <?php echo json_encode($urn); ?>;
Autodesk.Viewing.Initializer(options, function() {

    var htmlDiv = document.getElementById('forgeViewer');
    viewer = new Autodesk.Viewing.GuiViewer3D(htmlDiv);
    viewer.start();
    Autodesk.Viewing.Document.load(documentId, onDocumentLoadSuccess, onDocumentLoadFailure);

    function onDocumentLoadSuccess(viewerDocument) {
        // Choose the default viewable - most likely a 3D model, rather than a 2D sheet.
        var defaultModel = viewerDocument.getRoot().getDefaultGeometry();
        viewer.loadDocumentNode(viewerDocument, defaultModel);
    }

    function onDocumentLoadFailure() {
        console.error('Failed fetching Forge manifest');
    }    

});

</script>
