<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  

#File name: index.php
#File for Toprecipes_admin
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class

require(PATH_DATABASE);
require(PATH_MODEL_TOPRECIPE);
require(PATH_MODEL_TOPRECIPE_DB);
require(PATH_MODEL_CATEGORY);
require(PATH_MODEL_PAGENATOR);

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'toprecipes_list';
}

if ($action == 'toprecipes_list') {

    $cntPerPage = 5;
    $pgLinkCnt = 5;

    $pgSelf = "index.php";
    $category_parm = "";
    $condition = "&action=".$action;

    if(isset($_GET['pgPage'])){
        $pgPage = $_GET['pgPage'];
    }else{
        $pgPage = 1;
    }
    if(isset($_GET['category'])){
        $category_parm = $_GET['category'];
        $condition = "&category=".$category_parm;
    }

    $categories = ToprecipeDB::getRecipeCategory();
    $totCnt = ToprecipeDB::getTotCountByAdmin($category_parm);
    $toprecipesadminPage = ToprecipeDB::getPageTopRecipeByCategoryByAdmin($category_parm, $cntPerPage, $pgPage);

    // Display the toprecipes list
    include('toprecipes_list.php');
    
}else if ($action == 'update_toprecipes') {

    if (isset($_POST['disp_yn'])) {
        $disp_yn = $_POST['disp_yn'];
    } else if (isset($_GET['disp_yn'])) {
        $disp_yn = $_GET['disp_yn'];
    } else {
        $disp_yn = '';
    }
    
    $dish_id = $_GET['dish_id'];
    $category = $_GET['category'];
    $pgPage = $_GET['pgPage'];

    
    ToprecipeDB::deleteTopRecipes($dish_id);

    if ($disp_yn == "" ){
        
        $toprecipedisplay = new TopRecipeDisplay($dish_id,"N");

        ToprecipeDB::addTopRecipes($toprecipedisplay);
    }
    
    header("Location: .?pgPage=$pgPage&category=$category");
}
?>