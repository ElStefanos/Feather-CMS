<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feather Cms | Setup</title>
    <link rel="stylesheet" href="./css/install.css">
    <script src="../../Source/JQuery.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="https://kit.fontawesome.com/68274dddc7.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="./img/feather_logo.svg" alt="logo">
        </div>
        <div class="welcome">
            <span id="title">
                <h1>Welcome.</h1>
            </span>
            <span id="par">
                <p>This is Feather CMS setup process.</p>
                <p>We will walk you throught setup.</p>
                <p>May i?</p>
            </span>
            <div class="get-started">
                <button onclick="SmoothScroll();">Lets Start</button>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="steps">
            <div class="step" id="1">
                <h1 id="align">Step 1</h1>
                <i id="align" class="fas fa-database"></i>
                <p>Enter Database Info</p>
                <form id="f1">
                    <fieldset id="f1f">
                        <input type="text" placeholder="Hostname" name='host'>
                        <input type="text" placeholder="Username" name='dbu'>
                        <input type="text" placeholder="Password" name='dbp'>
                        <input type="text" placeholder="Database" name='db'>
                        <button>Connect</button>
                    </fieldset>
                </form>
                
            </div>
            <div class="step" id="2">
                <h1 id="align">Step 2</h1>
                <i id="align" class="fas fa-user"></i>
                <p>Create Admin account credentials</p>
                
                <form id="f2">
                    <fieldset id='f2f' disabled='disabled'>
                        <input type="username" placeholder="Username" name='au'>
                        <input type="password" placeholder="Password" name='ap'>
                        <button type="submit">Create</button>
                    </fieldset>
                </form>
                
            </div>
            
            <div class="step" id="3">
                <h1 id="align">Step 3</h1>
                <i id="align" class="fas fa-file-invoice"></i>
                <p>Enter Website Info</p>
                
                <form id="f3" class="locked">
                    <fieldset id='f3f' disabled="disabled">
                        <input type="text" placeholder="Website name" name='wn'>
                        <button>Finish</button>
                    </fieldset>
                </form>
                
            </div>
        </div>
    </div>
    <div id="content">
    
    </div>
</body>
</html>