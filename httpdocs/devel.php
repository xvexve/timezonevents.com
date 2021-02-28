<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?php require "language.php";?>
    <title><?php echo showHeader("title")?></title>
    <meta name="robots" content="index, follow">
    <meta name='title' content='<?php echo showHeader("title")?>'>
    <meta name='description' content="<?php echo showHeader("description")?>">
    <meta name='keywords' content='<?php echo showHeader("keywords")?>'>
    <link rel="icon" type="image/png" href="favicon.png">
    <meta property="og:image" content="https://www.timezonevents.com/logoOg.png">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="150">
    <meta property="og:image:height" content="150">
    <meta property='og:locale' content='en_EN'>
    <meta property='og:type' content='website'>
    <meta property='og:url' content='https://www.timezonevents.com/'>
    <meta property='og:title' content='<?php echo showHeader("title")?>'>
    <meta property='og:description' content="<?php echo showHeader("description")?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link href="/css/elements.css" type="text/css" rel="stylesheet">
    <link href="/css/style.css" type="text/css" rel="stylesheet">
    <link href="/css/responsive.css" type="text/css" rel="stylesheet">
</head>

<body>
    <main>
        <header>
            <h1></h1>
        </header>
        <div id="txt"></div>
        <h2 id="remaining"><span></span><span></span></h2>
        <div id="clocks"></div>
        <div id="zones" class="flex">
            <select name="tz">
                <option value=""></option>
            </select>
            <button id="addTz"></button>
        </div>
        <div class="flex justify">
            <button class='button' id="createEvent"></button><button class='button' id="editEvent"></button>
        </div>
        <div id="url" class="flex"><input type="text" disabled><button></button></div>
        <div class='info'></div>
    </main>

    <div id="new">
        <h2></h2>
        <div>
            <span class='txt'></span>
            <textarea name="txt"></textarea>
        </div>
        <div>
            <span class='newAddDttz'></span>
            <select name="newAddDttz">
                <option value=""></option>
            </select>
        </div>
        <div>
            <span class='date'></span> <div class='flex justify'><input type="date" name="date"><input type="time" name="time"></div>
        </div>
        <div>
            <span class="newPeriodicity"></span>
            <select name="newPeriodicity">
                <option value=""></option>
                <option value="d"></option>
                <option value="w"></option>
                <option value="m"></option>
                <option value="y"></option>
            </select>
        </div>
        <div>
            <span class='newAddTz'></span>
            <div class="flex">
                <select name="newAddTz">
                    <option value=""></option>
                </select>
                <button id="newAddTz"></button>
            </div>
            <ul id="newListTz"></ul>
        </div>
        <div class="flex justify">
            <button class='button' id="newCreate"></button> <button class='button' id="newClose"></button>
        </div>
    </div>

    <footer>
        https://www.timezonevents.com 2021 &copy; All rights reserved
    </footer>
    <?php echo returnText();?>
</body>
</html>

<script src="js/functions.js"></script>
<script src="js/tz.js"></script>
<script src="js/newTz.js"></script>
<script src="js/lang.js"></script>
<script src="js/clock.js"></script>
<script src="js/operation.js"></script>
<script src="js/events.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-NW58RTTPDS"></script>
<script>window.dataLayer=window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-NW58RTTPDS');</script>
