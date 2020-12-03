<?php
namespace Menu;

class Menu
{
    public $title;
    public $link;

    public function AddItem_Admin_Menu($title, $link) {
        $this->title = $title;
        $this->link = $link;
    }

    public function LoadItem_Admin_Menu() {
        global $menu_items_list;
        if(!isset($menu_items_admin)){
            $menu_items_admin = array();
        }   
        echo '<li class="menuitem"><a href="' . $this->link .'">';
        echo $this->title . '</a></li>';
    }

    public function AddItem_Menu($title, $link) {
        $this->title = $title;
        $this->link = $link;
    }

    public function LoadItem_Menu() {
        global $menu_items_list;
        if(!isset($menu_items)){
            $menu_items = array();
        }
        
        return array('title' => $this->title, 'link' => $this->link);
    }


    public function __destruct()
    {
        
    }
}
?>