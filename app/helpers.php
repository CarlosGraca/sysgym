<?php
namespace App;
use App\Models\Menu;
use App\LoginActivity;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class Helpers
{
	protected $current;
    protected $currentKey;

	public function __construct() {
        $this->current = Request::path();
    }

    private  function createHref($href,$title,$icon){
        $href = ($href == '#' ) ? '#': '/'.$href;
    	$output = '<a '.\HTML::attributes(array('href' => $href)).'>';  	
    	$output .=(new static)->createIcon($icon);
    	$output .='<span>'.trans('adminlte_lang::message.'.$title).'</span>';
    	$output .= '</a>';
    	return $output;
    }

    public static function sidebar()
    {
    	$level = 1;
    	$items = Menu::getMenus();
    	$classes_menu_item  = '';
    	$menu_items = '';
    	

    	$attr = array(
            'class' => 1 === $level ? 'sidebar-menu' : 'level-'.$level
        );
    	$menu = '<ul'.\HTML::attributes($attr).'>';
    	$attr = array( 'class' => 'header');
    	$menu .= '<li'.\HTML::attributes($attr).'>Header</li>';

		foreach ($items as $key => $item) {
			$items_menu =  Menu::getMenuItem($item->id);
			
            if (count($items_menu) > 0) {
                $menu_items .= '<ul'.\HTML::attributes(array('class' => 'treeview-menu')).'>';
                foreach ($items_menu as $key => $item_menu) {  
                    $href = ($item_menu->url == '#' ) ? '#': '/'.$item_menu->url;              	
                	if ($classes_menu_item == null) {
	        	        $classes_menu_item = (new static)->getActive($item_menu->url);
	        	    }
                    $classes = array('item_menu');
                    $menu_items .= '<li'.\HTML::attributes(array('class' => implode(' ', $classes))).'>';
	                    $menu_items .= '<a'.\HTML::attributes(array('href' => $href)).'>';
	                    $menu_items .= trans('adminlte_lang::message.'.$item_menu->title).'</a>';
                    $menu_items .= '</li>';
                }
                $menu_items .= '</ul>';
                $classes = array('treeview');
                $classes[] = $classes_menu_item;
                $href = ($item->url == '#' ) ? '#': '/'.$item->url; 
                $menu .= '<li'.\HTML::attributes(array('class' => implode(' ', $classes))).'>';
	                $menu .= '<a'.\HTML::attributes(array('href' => $href)).'>';
		                $menu.=(new static)->createIcon($item->icon);
		                $menu .='<span>'.trans('adminlte_lang::message.'.$item->title).'</span>';
		                $menu.=(new static)->createIcon('fa fa-angle-left pull-right');
	                $menu .= '</a>';

	                $menu .= $menu_items;
	                $menu_items = '';
	                $classes_menu_item = '';
                $menu .= '</li>';
            }else{
            	$classes = array('menus');
       		    $classes[] = (new static)->getActive($item->url);
				$menu .= '<li'.\HTML::attributes(array('class' => implode(' ', $classes))).'>';
				$menu .= (new static)->createHref($item->url,$item->title, $item->icon);
				$menu .= '</li>';
			}
        }
        $menu .= '</ul>';

        return  $menu;
    }  

    

    /**
     * Method to render an icon
     *
     * @param  array $item Item that needs to be turned into a icon
     * @return string
     */
    private function createIcon($item)
    {
        $output = '';

        if ($item) {
           $output .= '<i '.\HTML::attributes(array('class' => $item)).'></i>';
           /* $output .= sprintf(
                '<span class="menu__icon"><img src="%s" alt="%s"></span>',
                $item['icon'],
                $item['name']
            );*/
        }

        return $output;
    }

    /**
     * Method to sort through the menu items and put them in order
     *
     * @return void
     */
    private function sortItems() {
        usort($this->items, function($a, $b) {
            if ($a['sort'] == $b['sort']) {
                return 0;
            }
            return ($a['sort'] < $b['sort']) ? -1 : 1;
        });
    }

    /**
     * Method to find the active links
     *
     * @param  array $item Item that needs to be checked if active
     * @return string
     */
    private function getActive($item)
    {
        $url = trim($item, '/');

        
        if ($this->current === $url)
        {
            return 'active';
        }

       /* if (strpos($this->currentKey, $item) === 0) {
            return 'active';
        }*/
    }

    public static function last_ative($user){
        return   LoginActivity::where('user_id',$user)
                 ->latest('id')->value('created_at');
    }
}
?>