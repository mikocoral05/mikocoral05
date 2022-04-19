<html>
<head>
    <title>Sending SMS Result</title>
    <meta http-equiv="refresh" content="5;url=http://localhost/activities/SystemInteg/sample-sms/" />
</head>
<body>
<?php
$production = true;
$contact_num = "";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $code = getRandomNumbers();
    if($production){
        //MAKE SURE THAT YOU HAVE SUFFICIENT LOAD
        require_once '../telerivet-php-client-master/telerivet.php';

        $YOUR_API_KEY = "ENTER YOUR API KEY HERE";
        $project_id = "ENTER YOUR PROJECT ID HERE";

        $tr = new Telerivet_API($YOUR_API_KEY);
        $project = $tr->initProjectById($project_id);

        $sent_msg = $project->sendMessage(array(
            'content' => "Hello $name"."! Your code is: $code", 
            'to_number' => "$contact_num"
        ));
        echo " Successful submission... A login code is sent to the recipient.";
    }
}
    
else{
    echo "Unauthorized access... Redirecting";
}

mysqli_close($conn);

function getRandomNumbers(){
    return random_int(0,999999);
}
?>
</body>
</html>