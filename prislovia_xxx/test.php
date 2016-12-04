<?php

$pageSize=50;
$page=1;
$query="láska";

error_reporting(E_ALL);
ini_set('display_errors', '1');

$response=json_decode(file_get_contents('http://localhost:9200/proverbs/proverb/_search', null, stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => "Content-Type: application/json\r\n",
        'content' => json_encode([
            'query' => ['fuzzy_like_this' => [
                'fields' => ["proverb", "keywords", "notes", "type", "categories"], 
                'like_text' => 'gros', 
                'fuzziness' => 0.7,],],
            'size' => 20,
            'from' => 0,
        ])
    ]
])), true);

	
print_r($response);
?>