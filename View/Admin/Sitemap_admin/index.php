<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  

#File name: index.php
#File for Sitemap_admin
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class

require(PATH_DATABASE);
require(PATH_MODEL_SITEMAP);
require(PATH_MODEL_SITEMAP_DB);
require(PATH_MODEL_PAGENATOR);

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'sitemaps_list';
}

if ($action == 'sitemaps_list') {

    if(isset($_GET['menu_level'])){
        $menu_level = $_GET['menu_level'];
    }else{
        $menu_level = "1";
    }

    $levels = SitemapDB::getLevelList();
    $menus  = SitemapDB::getMenuListByLevel($menu_level);

    include('sitemap_list.php');

    
} else if ($action == 'show_insert_form') {

    $upper_menu = $_GET['upper_menu'];
    $menu_level = $_GET['menu_level'];
    $parent_menu_level = $_GET['parent_menu_level'];
    
    $parent_menus = SitemapDB::getMenuListByLevel($parent_menu_level);
    include('sitemap_insert.php');

    
} else if ($action == 'add_sitemap') {

    $menu_level = $_POST['menu_level'];
    $menu_name  = $_POST['menu_name'];
    $upper_menu = $_POST['upper_menu'];
    $url        = $_POST['url'];
    
    //*************Validation ***********************//
    $valid =true;
    if($menu_name == null || empty($menu_name)){
        $error .= "Enter the menu name<br/>";
        $valid = false;
        
    }
    if($url == null || empty($url)){
        $error .= "Enter the url of the menu<br/>";
        $valid= false;
    }
    
    //*****************validation ********************//
    if(!$valid){
        $error .= "Sorry, your menu was not inserted.<br/>";
        if($error != ""){
            header("location:index.php?action=show_insert_form&menu_level=$menu_level&menu_name=$menu_name&upper_menu=$upper_menu&url=$url&err=".$error);
        }
    }
    else if($valid){
        
        $id = SitemapDB::getNewMenuId();
        $menu = new Menu($id, $menu_level, $menu_name, $upper_menu, $url);
        SitemapDB::addMenu($menu);

        // Display the Menu List page for the current level
        header("Location: .?menu_level=$menu_level");
    }
} else if ($action == 'show_edit_form') {

    $id = $_GET['id'];
    $menu_level = $_GET['menu_level'];
    $menu_name  = $_GET['menu_name'];
    $upper_menu = $_GET['upper_menu'];
    $url        = $_GET['url'];
    $parent_menu_level = $_GET['parent_menu_level'];
    
    $parent_menus = SitemapDB::getMenuListByLevel($parent_menu_level);
    include('sitemap_edit.php');
} else if ($action == 'edit_sitemap') {

    $id         = $_GET['id'];
    $menu_level = $_GET['menu_level'];
    $menu_name  = $_GET['menu_name'];
    $upper_menu = $_GET['upper_menu'];
    $url        = $_GET['url'];
    
    //*************Validation ***********************//
    $valid =true;
    if($menu_name == null || empty($menu_name)){
        $error .= "Enter the menu name<br/>";
        $valid = false;
        
    }
    if($url == null || empty($url)){
        $error .= "Enter the url of the menu<br/>";
        $valid= false;
    }
    
    //*****************validation ********************//
    if(!$valid){
        $error .= "Sorry, your menu was not updated.<br/>";
        if($error != ""){
            header("location:index.php?action=show_edit_form&menu_level=$menu_level&menu_name&$menu_name&upper_menu=$upper_menu&url=$url&err=".$error);
        }
    }
    else if($valid){
        
        $menu = new Menu($id, $menu_level, $menu_name, $upper_menu, $url);
        SitemapDB::updateMenu($menu);

        // Display the Menu List page for the current level
        header("Location: .?menu_level=$menu_level");
    }

    
}else if ($action == 'delete_sitemap') {

    // Get the IDs
    $id = $_GET['id'];
    $menu_level = $_GET['menu_level'];;
    // Delete the recipe
    SitemapDB::deleteMenu($id);

    // Display the Recipe List page for the current category
    header("Location: .?menu_level=$menu_level");
    
}

?>
