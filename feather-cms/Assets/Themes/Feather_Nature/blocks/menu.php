
    <div id='menu'>
        <div class="hamburger">
            <span id="toggle"></span>
        </div>
        <div class="menu-items">

            <ol class="menu-item-title">

                <?php
                
                echo '<li id="item-title">'.$info['web-name'].'</li>';

                ?>

            </ol>
            <ol class="menu-item">



                <?php

                    echo  '<li id="item"><a href="./index.php">Home</a></li>';
                    echo  '<li id="item"><a href="'.$api->Page_Path_Set('', './paging.php', '', './about.php').'">About</a></li>';

                    foreach($menu_items as $item) {
                        $item = ${$item}->LoadItem_Menu();
                        echo '<li id="item"><a href="'.$item['link'].'">'.$item['title'].'</a></li>';
                    }

                ?>
            
            </ol>

        </div>
    </div>

    <script>
        MenuExpand();
    </script>
