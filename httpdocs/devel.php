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
            <h1><?php echo gText("phpH1");?></h1>
        </header>
        <div id="txt"></div>
        <h2 id="remaining"><span><?php echo gText("phpRemainig");?></span><span></span></h2>
        <div id="clocks"></div>
        <div id="zones" class="flex">
            <select name="tz">
                <option value=""><?php echo gText("phpTzOption");?></option>
            </select>
            <button id="addTz"><?php echo gText("phpAddTz");?></button>
        </div>
        <div class="flex justify">
            <button class='button' id="createEvent"><?php echo gText("phpCreateEvent");?></button><button class='button' id="editEvent"><?php echo gText("phpEditEvent");?></button>
        </div>
        <div id="url" class="flex"><input type="text" disabled><button><?php echo gText("phpCopyUrl");?></button></div>
        <div class='info'><?php echo gText("phpInfoCopyUrl");?></div>
    </main>

    <div id="new">
        <h2><?php echo gText("phpH2");?></h2>
        <div>
            <span class='txt'><?php echo gText("phpNewText");?></span>
            <textarea name="txt"></textarea>
        </div>
        <div>
            <span class='newAddDttz'><?php echo gText("phpNewDttz");?></span>
            <select name="newAddDttz">
                <option value=""></option>
            </select>
        </div>
        <div>
            <span class='date'><?php echo gText("phpNewDate");?></span> <div class='flex justify'><input type="date" name="date"><input type="time" name="time"></div>
        </div>
        <div>
            <span class="newPeriodicity"><?php echo gText("phpNewPeridicity");?></span>
            <select name="newPeriodicity">
                <option value=""><?php echo gText("phpNewPeridicityEmpty");?></option>
                <option value="d"><?php echo gText("phpNewPeridicityD");?></option>
                <option value="w"><?php echo gText("phpNewPeridicityW");?></option>
                <option value="m"><?php echo gText("phpNewPeridicityM");?></option>
                <option value="y"><?php echo gText("phpNewPeridicityY");?></option>
            </select>
        </div>
        <div>
            <span class='newAddTz'><?php echo gText("phpNewTz");?></span>
            <div class="flex">
                <select name="newAddTz">
                    <option value=""><?php echo gText("phpTzOption");?></option>
                </select>
                <button id="newAddTz"><?php echo gText("phpNewTz");?></button>
            </div>
            <ul id="newListTz"></ul>
        </div>
        <div class="flex justify">
            <button class='button' id="newCreate"><?php echo gText("phpNewCreate");?></button> <button class='button' id="newClose"><?php echo gText("phpNewClose");?></button>
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
<script src="js/clock.js"></script>
<script src="js/operation.js"></script>
<script src="js/events.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-NW58RTTPDS"></script>
<script>window.dataLayer=window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-NW58RTTPDS');</script>
