<?php

require_once 'config/config.php';
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';

// Include the AWS SDK for PHP
// require 'vendor/autoload.php';

// use Aws\S3\S3Client;
// use Aws\Exception\AwsException;

// // Set your AWS credentials
// $credentials = new Aws\Credentials\Credentials('YOUR_AWS_ACCESS_KEY', 'YOUR_AWS_SECRET_ACCESS_KEY');

// // Set your AWS region
// $region = 'us-east-1';

// // Set the bucket name and object key
// $bucketName = 'your-bucket-name';
// $objectKey = 'your-object-key';

// // Create an S3 client instance
// $s3Client = new S3Client([
//     'version' => 'latest',
//     'region' => $region,
//     'credentials' => $credentials
// ]);

// try {
//     // Retrieve the object from S3
//     $result = $s3Client->getObject([
//         'Bucket' => $bucketName,
//         'Key' => $objectKey
//     ]);

//     // Display the contents of the object
//     echo $result['Body'];

// } catch (AwsException $e) {
//     // Display an error message if the retrieval fails
//     echo 'Error retrieving object: ' . $e->getMessage();
// }
