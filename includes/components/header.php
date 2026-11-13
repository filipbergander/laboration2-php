<!-- Komponent som skriver ut sidhuvudet på varje sida i webbplatsen -->
<!DOCTYPE html>
<html lang="sv">
<?php $title; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="src/js/main.js" defer></script>
    <link href="src/css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <title><?= $title ?></title>
</head>

<body class="bg-amber-50 text-gray-800 min-h-screen flex flex-col font-display">