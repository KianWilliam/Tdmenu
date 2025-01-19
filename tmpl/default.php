<?php

/**
 * @package Module Tdmenu for Joomla! 5.x
 * @version $Id: mod_Tdmenu.php 1.2.1 2025-01-01 23:26:33Z $
 * @author KWProductions Co.
 * @copyright (C) 2025- KWProductions Co.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 
 This file is part of Tdmenu.
    Tdmenu is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    Tdmenu is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with Tdmenu.  If not, see <http://www.gnu.org/licenses/>. 
**/ 

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\Filesystem\Folder;
use Joomla\Module\Menu\Site\Helper\MenuHelper;
use Joomla\CMS\Router\Route;


$app = Factory::getApplication();
$doc = Factory::getDocument();
//$menuitems = MenuHelper::getList($params);
$sitemenu = $app->getMenu();
$menuitems = $sitemenu->getItems('menutype', $params->get("menu"));
$Tdmenuitems=[];
$Tdmenuitems = $menuitems;
$menuitems = null;

HTMLHelper::_("jquery.framework");

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$modId = 'mod-3dmenu' . $module->id;

$mmenu = $params->get("menu");
$maxlevel = 1;
for($i=0; $i<count($Tdmenuitems); $i++)
{
	if($Tdmenuitems[$i]->level>$maxlevel)
		$maxlevel = $Tdmenuitems[$i]->level;
}
/*$countitemsbylevel = [];
for($i=1; $i<=$maxlevel; $i++)
{
	for($j=0; $j<count($Tdmenuitems); $j++)
	{
		//if($i==$menuitems[$j]->level)
			//$countitemsbylevel[$i]++;
		
		
	}
}*/

$menucolumnwidth = $params->get("menucolumnwidth");
$menuorientation = $params->get("menuorientation");
$menubordersize = $params->get("menubordersize");
$menubordercolor = $params->get("menubordercolor");
$menubordercolor = $params->get("menubordercolor");
$joomlamenumoduleclass = $params->get("joomlamenumoduleclass");

$menuborderradius = $params->get("menuborderradius");
$menucolor = $params->get("menucolor");
$menuimage = $params->get("menuimage");
$menubackcolor = $params->get("menubackcolor");
$menushadowcolor = $params->get("menushadowcolor");
$mn = $params->get("modulename");
$mclasssuffix= $params->get("moduleclass_sfx");
$animin = $params->get("animationin");
$animout = $params->get("animationout");
$animspeed = $params->get("animationspeed");
$menutextalign = $params->get("menutextalign");
$submenutextalign = $params->get("submenutextalign");
$fixed = $params->get("fixed");
$fixedoffsetleft = $params->get("fixedoffsetleft");
$fixedoffsettop = $params->get("fixedoffsettop");
$menuleft = $params->get("menuleft");
$menutop = $params->get("menutop");
$submenuleft = $params->get("submenuleft");
$submenutop = $params->get("submenutop");
$padding =  $params->get("menuitempadding");
$fontweight =  $params->get("typoweight");
$fontstyle =  $params->get("typostyle");
if($fontweight==NULL && !isset($fontweight) )
	$fontweight='normal';//vertical 
else
	$fontweight='bold';
if($fontstyle==NULL && !isset($fontstyle) )
	$fontstyle='normal'; //vertical
else
	$fontstyle='italic';
$buttbkcol = $params->get("buttonbackcolor");
$buttfrcol= $params->get("buttoncolor");
$vals=[];
$mc = substr($menushadowcolor, 1);
$vals = str_split($mc, 2);
$r = hexdec($vals[0]);
$g = hexdec($vals[1]);
$b = hexdec($vals[2]);


$animLink = 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.compat.min.css';
//$doc->addCustomTag('<link rel="stylesheet preload" href="' . $animLink . '" as="style">');
 $wa->registerAndUseStyle('tdanimates', Uri::Base().'modules/mod_tdmenu/tmpl/animate.css');



	$options = json_encode(array(
	    'mcw'          => $menucolumnwidth,
		'mbs'          => $menubordersize,
		'mbc'          => $menubordercolor,
		'mbkc'         => $menubackcolor,
		'animIn'       => $animin,
		'animOut'      => $animout,
		'animSpeed'    => $animspeed,	
		'fixed'        => $fixed,
        'offsetleft'       => $fixedoffsetleft,
		'offsettop'       => $fixedoffsettop,		
		'direction'    => $menuorientation,
		'mcss' => $mclasssuffix,
		'menucolor'=>$menucolor,
		'menuimage'=>$menuimage,
		'menuborderradius'=>$menuborderradius,
		'menutextalign'=>$menutextalign,
		'submenutextalign'=>$submenutextalign,
		'menuleft'=>$menuleft,
		'menutop'=>$menutop,
		'submenuleft'=>$submenuleft,
		'submenutop'=>$submenutop,
		'padding'=>$padding,
		'fontweight'=>$fontweight,
		'fontstyle'=>$fontstyle,
		'buttbkcol'=>$buttbkcol,
		'buttfrcol'=>$buttfrcol,
		'red'=>$r,
		'green'=>$g,
		'blue'=>$b,
		'modulename'=>$mn,
		'jmmc'=>$joomlamenumoduleclass,
		'id'=>$module->id,
		
		));
		
		$globecontent="
		.menucontainer
		{
			
			position:relative;
			text-align:center;
		}
		 #tdmenu".$module->id."{
			height:auto;
			//width:100%;
			//position:relative;
			z-index:1000;

			
		}
			
			 #tdmenu".$module->id." a:link,
			 #tdmenu".$module->id." a:visited
			{
				text-decoration:none;
			
				
			}
				
				 #tdmenu".$module->id." a:hover
				{
					color:blue;
					font-style:".$fontstyle.";
				}

		 #tdmenu".$module->id." ul
		{
			position:absolute;
			z-index:1001;
			display:none;
			padding:10px;
			list-style-type:none;
			
		}
		
				
					 #tdmenu".$module->id." li:hover > ul 
					{
						display:block;
					
					}
					
	
		";
	
	
			$wa->addInlineStyle($globecontent);
	
	
    $wa->registerAndUseScript('3dmenuscript', Uri::Base().'modules/mod_tdmenu/tmpl/3dmenuscript.js');
   
	?>
	
	
<div  class="menucontainer">
<button id="resbutt<?php echo $module->id; ?>" style="  border:none; background-color:<?php echo $buttbkcol; ?>; color:<?php echo $buttfrcol; ?>;">Menu</button>
<p></p>
<ul id="tdmenu<?php echo $module->id; ?>" style="" class="tdmenu morientation floater" <?php echo !empty($options) ? "data-options='" . $options. "'" : ""; ?>  role="menubar" aria-label="<?php echo $module->title; ?>" >
<?php
$level=1;
$parentids=[1];
$flag=1;
$flagb=1;
$flagc=1;
$endflag=0;
    for($i=0; $i<count($Tdmenuitems); $i++)
	{
		if($Tdmenuitems[$i]->active)
			$active='active';
		else
			$active='';
		
		if($Tdmenuitems[$i]->current)
			$current='current';
		else
			$current='';
			
		$w = strlen($Tdmenuitems[$i]->title)*5;
		$tmpstring=[];
		$titlestring=NULL;

	if(!preg_match('/\{/',  $Tdmenuitems[$i]->title) ): //for modules everywhere
	if(preg_match('/[a-zA-Z]\s[a-zA-Z]/', $Tdmenuitems[$i]->title)){
		    $newtitle = str_replace(" ", "_", $Tdmenuitems[$i]->title);
    //newtitle is needed or the original menuitems shall be changed and effects on other places for example in breadcrumb the titles will be with _ 
	//for($q=0; $q<strlen($Tdmenuitems[$i]->title); $q++)
	for($q=0; $q<strlen($newtitle); $q++)
	{
		
		//if($Tdmenuitems[$i]->title[$q]=="_")
		if($newtitle[$q]=="_")
		{
			
			$tmpstring[$q]= "<span class='lea'>_</span>";

		}
		else
			$tmpstring[$q] =  $newtitle[$q];

	}
		$titlestring = implode("", $tmpstring);

	}
		endif;
		if($titlestring!==NULL)
			$mtitle = $titlestring;
		else
			$mtitle = $Tdmenuitems[$i]->title;
		
		if($Tdmenuitems[$i]->parent_id==1 )
		{
			//if previous exist and isset
			//get the level
			if(isset($Tdmenuitems[$i-1]) && $Tdmenuitems[$i-1]->level != $Tdmenuitems[$i]->level)
			{
				$l = $Tdmenuitems[$i-1]->level;
				while($l>1)
				{
					echo "</ul></li>";
					$l--;	
				$level = $l;
					
				}
				
			}
			
			if($Tdmenuitems[$i]->hasChildren()==false){
				if($flag==1){
					$flag=0;
			       echo "<li id='item".$i."' class=' mitem".$Tdmenuitems[$i]->id." first morientation ".$active."  ".$current."' role='none'  tabindex=0 ><a href='".Route::_($Tdmenuitems[$i]->link)."' >".$mtitle."</a></li>";
				}
			   else
			   {
				   	echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." morientation ".$active."  ".$current."' role='none' tabindex=-1><a href='".Route::_($Tdmenuitems[$i]->link)."' >".$mtitle."</a></li>";

			   }
			} 
			else
			  {
				  $parentids[$level]=$Tdmenuitems[$i]->parent_id;
				  
				  if($flag==1)
				  echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." morientation  ".$active."  ".$current." first' role='none' tabindex=0><a href='".Route::_($Tdmenuitems[$i]->link)."' style='width:".$w."px'>".$mtitle."</a>";
				  else
				  {
					  
					   echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." morientation  ".$active."  ".$current." ' role='none' tabindex=-1><a href='".Route::_($Tdmenuitems[$i]->link)."'>".$mtitle."</a>";

				  }
				  $lev = $level + 1;
				  echo "<ul class='menu".$lev."' role='menu' >";

				  $flag=1;
				  $level++;


			  }
			
		}
		else 
			if($level==2)
			{
			if( $Tdmenuitems[$i-1]->level != $Tdmenuitems[$i]->level)
			{
				$l = $Tdmenuitems[$i-1]->level;
				while($l> $Tdmenuitems[$i]->level)
				{
					echo "</ul></li>";
					$l--;	
                    $level = $l;					
				}
			}
				
				if($Tdmenuitems[$i]->hasChildren()==false)
				{
				if($flagc==1){
										

					$flagc=0;
			       echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." first ".$active."  ".$current."' role='none' tabindex=0><a href='".Route::_($Tdmenuitems[$i]->link)."'>".$mtitle."</a></li>";
			    }
				else
				{
					
					echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." ".$active."  ".$current."' role='none' tabindex=-1><a href='".Route::_($Tdmenuitems[$i]->link)."'>".$mtitle."</a></li>";

				}
			   }
			   else
			  {
				  $parentids[$level]=$Tdmenuitems[$i]->parent_id;
				  if($flagc==1)
				      echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." ".$active."  ".$current." first' role='none' tabindex=0><a href='".Route::_($Tdmenuitems[$i]->link)."'>".$mtitle."</a>";
				  else
					   echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." ".$active."  ".$current."' role='none' tabindex=-1><a href='".Route::_($Tdmenuitems[$i]->link)."'>".$mtitle."</a>";
                  $lev = $level + 1;
				  	 echo "<ul class='menu".$lev."' role='menu' >";

				  $flagc=1;
				  $level++;

			  }
			}
             else			
		      if($level>2)
		      {
			
			if( $Tdmenuitems[$i-1]->level != $Tdmenuitems[$i]->level)
			{
				$l = $Tdmenuitems[$i-1]->level;
				while($l> $Tdmenuitems[$i]->level)
				{
					echo "</ul></li>";
					$l--;	
				$level = $l;
					
				}
			}
			if($Tdmenuitems[$i]->hasChildren()==false){
				if($flagb==1){
					$flagb=0;
			       echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." first ".$active."  ".$current."' role='none' tabindex=0><a href='".Route::_($Tdmenuitems[$i]->link)."'>".$mtitle."</a></li>";
			    }
				else
				{
					
					echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." ".$active."  ".$current."' role='none' tabindex=-1><a href='".Route::_($Tdmenuitems[$i]->link)."'>".$mtitle."</a></li>";

				}
			}
			else
			  {
				  $parentids[$level]=$Tdmenuitems[$i]->parent_id;
				  if($flagb==1)
				      echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." ".$active."  ".$current." first' role='none' tabindex=0><a href='".Route::_($Tdmenuitems[$i]->link)."'>".$mtitle."</a>";
				  else
					   echo "<li id='item".$i."' class='mitem".$Tdmenuitems[$i]->id." ".$active."  ".$current."' role='none' tabindex=-1><a href='".Route::_($Tdmenuitems[$i]->link)."'>".$mtitle."</a>";

								  	 echo "<ul class='menu".$lev."' role='menu' >";

				  $flagb=1;
				  $level++;

			  }
		}
		
	
	
		
	}//end of the grand loop
	//if the last item with level > 1 has a submenu and the loop is over	
	if($Tdmenuitems[count($Tdmenuitems)-1]->level!=1)
	{
			$l = $Tdmenuitems[count($Tdmenuitems)-1]->level;
			$counter = $l-1;
				while($l> 1)
				{
					
					  echo "</ul></li>";
					  $l--;
					  				  
				}
				
	}
?>
</ul>	

</div>

	
