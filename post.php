<?php
$dataFile = "data.json";

$name  = $_POST["name"]  ?: "名無しさん";
$title = $_POST["title"] ?: "無題";
$body  = trim($_POST["body"]);

if ($body === "") {
    exit("本文なし");
}

$threads = file_exists($dataFile)
    ? json_decode(file_get_contents($dataFile), true)
    : [];

$threads[] = [
    "title" => $title,
    "res" => [[
        "name" => $name,
        "body" => $body,
        "time" => date("Y/m/d H:i:s")
    ]]
];

file_put_contents($dataFile, json_encode($threads, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

header("Location: index.php");