<?php
class SitemapDB {
	//use category and jobapplicants class
	//four static method
    
    public static function getLevelList() {
        $db = Database::getDB();
        $query = 'select distinct menu_level from sitemap order by menu_level';
       
        $result = $db->query($query);
        $levels = array();
        foreach ($result as $row) {
            $level = new Menulevel($row['menu_level'], (string)$row['menu_level']. " Level" );
            $levels[] = $level;
        }
        return $levels;
    }
    
    public static function getMenuListByLevel( $menu_level ) {
        $db = Database::getDB();
        $query = 'select id,menu_level,menu_name,upper_menu,url from sitemap ';
        
        if( $menu_level != "" ){
            $query .= "where menu_level = $menu_level order by id ";
        }

        $result = $db->query($query);
        $menus = array();
        foreach ($result as $row) {
            $menu = new Menu( $row['id'], $row['menu_level'], $row['menu_name'], $row['upper_menu'], $row['url']);
            
            $menus[] = $menu;
        }
        return $menus;
    }

    public static function getChildMenuList( $id ) {
        $db = Database::getDB();
        $query = 'select id,menu_level,menu_name,upper_menu,url from sitemap ';
        
        if( $menu_level != "" ){
            $query .= "where upper_menu = $id order by id ";
        }

        $result = $db->query($query);
        $menus = array();
        foreach ($result as $row) {
            $menu = new Menu( $row['id'], $row['menu_level'], $row['menu_name'], $row['upper_menu'], $row['url']);
            
            $menus[] = $menu;
        }
        return $menus;
    }

    public static function getNewMenuId() { 
        $db = Database::getDB();
        
        $query = "select max(id)+1 from sitemap ";

        $count = $db->query($query);
        //convert result into array
        $row = $count->fetch();
        $result = $row[0];

        return $result;
    } 

    public static function addMenu($menu) {
        $db = Database::getDB();

        $id = $menu->getId();
        $menu_level = $menu->getMenuLevel();
        $menu_name = $menu->getMenuName();
        $upper_menu = $menu->getUpperMenu();
        $url = $menu->getUrl();
        
        $query =
            "INSERT INTO sitemap
                 (id,menu_level,menu_name,upper_menu,url)
             VALUES
                 ($id, $menu_level,'$menu_name', $upper_menu, '$url')";
echo "query=[".$query."]";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function updateMenu($menu) {
        $db = Database::getDB();

        $id = $menu->getId();
        $menu_level = $menu->getMenuLevel();
        $menu_name = $menu->getMenuName();
        $upper_menu = $menu->getUpperMenu();
        $url = $menu->getUrl();
        
        $query = "UPDATE sitemap SET "
                . "menu_level = '$menu_level' ,"
                . "menu_name = '$menu_name' ,"
                . "upper_menu = '$upper_menu' ,"
                . "url = '$url' "
                . "WHERE id = '$id'";
        
        $row_count = $db->exec($query);
        return $row_count;
    }
    
    public static function deleteMenu($id) {
        $db = Database::getDB();
        $query = "DELETE FROM sitemap
                  WHERE id = $id ";
        $row_count = $db->exec($query);
        return $row_count;
    }
    
    public static function getMaxMenuLevel() { 
        $db = Database::getDB();
        
        $query = "select max(menu_level) from sitemap ";

        $count = $db->query($query);
        //convert result into array
        $row = $count->fetch();
        $result = $row[0];

        return $result;
    } 

    
}
?>