<html>
<head>
    <meta charset="UTF-8" />
    <title>Форми</title>
    <link href="./mystyle.css" rel="stylesheet" />
    <script src="./testScript.js" defer></script>
</head>
<body>
    <div>zero</div>
    <form method="GET" action="page2.php" id="form1">
        <input type="text" name="username" value="my name"/>
        <input type="checkbox" name="gender" value="M" id="gender-M"><label for="gender-M">Male</label>
        <input type="checkbox" name="gender" value="F"> Female
        <input type="checkbox" name="gender" value="O"> Other
        <input type="checkbox" name="othername" value="O"> Other 2
        <input type="time" name="color-name" />

        <div id="first">first div</div>
        <div class="blue-background white">second div</div>
        <div>third div</div>
        <div>fourth div</div>
        <div class="blue-background red">fifth div</div>
        <div class="big-test-div">sixth div
            <div>inner div</div>
            <div>second inner div</div>
            <!--<div>third inner div</div>-->
        </div>

        <?php for ($index = 0; $index < 10; $index++): ?>
            <div>PHP div <?php echo $index; ?></div>
        <?php endfor; ?>

        <div>seventh div</div>
        <div>eight div</div>
        <div>ninth div</div>
        <div>tenth div</div>
        <div>eleventh div</div>
        <div>twelfth div</div>
        <div>thirteenth div</div>
        <div>fourteenth div</div>
        <div>fifteenth div</div>
        <div>sixteenth div</div>
        <div>seventeenth div</div>
        <div>eighteenth div</div>
        <div>nineteenth div</div>
        <div>twentieth div</div>
        <div>twenty-first div</div>
        <div>twenty-second div</div>
        <div>twenty-third div</div>
        <a href="abv.bg">Abv.bg</a>


        <select name="age-group">
            <optgroup label="Young">
              <option value="1">Kid (0-12)</option>
              <option value="2">Teen (13-19)</option>
            </optgroup>
            <option value="3">Adult (20+)</option>
            <option value="4">Old (70+)</option>
        </select>
        <input type="submit" value="Вход" />
    </form>

    <form method="GET" action="page2.php" id="form2">
        <div>last</div>
    </form>

    <input type="button" value="Покажи името на тайния агент" id="button1" />
    <p id="secret-agent-name"></p>
    <p id="secret-agent-age"></p>
</body>
</html>
