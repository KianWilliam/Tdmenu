 /* @package Module Tdmenu for Joomla! 5.x
  @version $Id: mod_Tdmenu.php 1.2.1 2025-01-01 23:26:33Z $
  @author KWProductions Co.
  @copyright (C) 2025- KWProductions Co.
  @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html 
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
    along with Tdmenu.  If not, see <http://www.gnu.org/licenses/>. */
var M3dMenu;
var mopen;
var mclose;
(function($){
	
	Mtdmenu = function (menu, options) {

	/*	this.options = {
			openDelay: 250, // delay before open sub-menu
			closeDelay: 500, // delay before close sub-menu
			animIn: 'fadeIn',
			animOut: 'fadeOut',
			animSpeed: 'perpendicular',
			duration: 450, // depends on speed: normal - 450, fast - 250, slow - 650
			mcss:'',
			 mcw:121, //menucolumnwidth
		mbs:5,        //menubordersize
		mbc:'#ffffff',          // menubordercolor,
		mbkc:'#ffffff',         //menubackcolor,
		bkc:'#000000',          //menuitemcolor
		fixed:'relative',        //menu position
        offsetleft:0,       //fixedoffsetleft,
		offsettop:0,       //fixedoffsettop,
		submenuleft:0,       //submenuleft,
		submenutop:0,//submenutop,
		direction:'block',          //menuorientation,
		menucolor:'#000000',//menucolor,
		menuimage:'',//menuimage,
		menuborderradius:'5', //menuborderradius,
		menutextalign:'center', //menutextalign,
		submenutextalign:'left', //submenutextalign,
		menuleft:0, //menuleft,
		menutop:0,//menutop,
		submenuleft:0, //submenuleft,
		submenutop:0, //submenutop,
		padding:0, //padding,
		fontweight:'', //fontweight,
		fontstylle:'', //fontstyle,
		buttbkcol:'#000000', //buttbkcol,
		buttfrcol:'#ffffff', //buttfrcol,
		red:'', //r,
		green:'', //g,
		blue:'', //b,
		modulename:'', //mn,
		id:''         //module->id,
		
		
		};*/
//$.extend({}, this.options, options)
		this.init(menu, options);
	};
	Mtdmenu.prototype.init = function (menu, options) {
				$('.'+options.jmmc).css({display:'none'});

		//without ul the class will be added to other elements too

		$('ul#tdmenu'+options.id).addClass(options.mcss);
	
		
		if(options.fixed=="fixed")
		$("ul#tdmenu"+options.id).css({position:''+options.fixed+'', left:''+options.offsetleft+'px', top:''+options.offsettop+'px', zIndex:10000});
	    else
		$("ul#tdmenu"+options.id).css({position:''+options.fixed+'', left:''+options.menuleft+'px', top:''+options.menutop+'px', zIndex:10000});

       if(options.menuimage!==null)
			$("ul."+options.mcss).css({borderColor:''+options.mbc+'', backgroundColor:''+options.mbkc+'', backgroundImage:url(''+options.menuimage+''),backgroundPosition:'0px 0px', backgroundSize:'100% 100%', border:''+options.mbs+'px solid '+options.mbc+'', borderRadius:''+options.menuborderradius+'px', textAlign:''+options.menutextalign+'', boxShadow:'0 10px 5px rgba('+options.red+','+options.green+','+options.blue+', 0.4)', transform:'rotateX(10deg)', perspectiveOrigin:'top center'});
		else
			$("ul."+options.mcss).css({borderColor:''+options.mbc+'', backgroundColor:''+options.mbkc+'', border:''+options.mbs+'px solid '+options.mbc+'', borderRadius:''+options.menuborderradius+'px', textAlign:''+options.menutextalign+'', boxShadow:'0 10px 5px rgba('+options.red+','+options.green+','+options.blue+', 0.4)', transform:'rotateX(10deg)', perspectiveOrigin:'top center'});

			
          	//	$("."+options.mcss).css({borderColor:''+options.mbc+'', backgroundColor:''+options.mbkc+'', backgroundImage:'url:('+options.menuimage+')', borderSize:''+options.mbs+'px', borderColor:''+options.mbc+'', borderRadius:''+options.menuborderradius+'px', textAlign:''+options.menutextalign+'', boxShadow:'0 10px 5px rgba('+options.red+','+options.green+','+options.blue+', 0.4)', transform:'rotateX(10deg)', perspectiveOrigin:'top center'});
         $("ul."+options.mcss).hover(function(){
		  $("ul."+options.mcss).css({ transform:'rotateX(16deg) scale(1.1)',boxShadow:'0 20px 10px rgba('+options.red+','+options.green+','+options.blue+', 0.3)'});
		 }, function()
		 {
			 		  $("ul."+options.mcss).css({ transform:'rotateX(10deg)',boxShadow:'0 10px 5px rgba('+options.red+','+options.green+','+options.blue+', 0.4)'});

		 });
		  $("ul."+options.mcss+" a:link, ul."+options.mcss+" a:visited").css({color:''+options.menucolor+'', padding:''+options.padding+'', fontWeight:''+options.fontweight+''});

		     $("ul."+options.mcss+" a:hover").css({fontStyle:''+options.fontstyle+''});
			 
			  $("ul."+options.mcss+" ul").css({backgroundColor:''+options.mbkc+'', textAlign:''+options.submenutextalign+''});
			  $("ul."+options.mcss+" .lea").css({color:''+options.mbkc+''});

			 
		$f=0;
		$(".menucontainer button").first().click(function(){
			if($f==0)
			{
				$(".floater").fadeIn(599);

				$f=1;
			}
			else
			{
				$(".floater").fadeOut(599);

				$f=0;
			}
		});
		
		
			
		if($(window).width()>=993)
		{
			
			$("ul."+options.mcss).css({display:''+options.direction+'', width:''+options.mcw+'px'});
			$("#resbutt"+options.id).css({display:'none'});
			$("ul."+options.mcss+" li.morientation").css({display:''+options.direction+''});

		}
		else
		{
			$("ul."+options.mcss).css({display:'none', width:'100%', paddingLeft:0});
						  $("ul."+options.mcss+" li.morientation").css({display:'block'});

			$("#resbutt"+options.id).css({display:'block'});
		}	
		if ( !menu.length ) return;
		
		
		$("li[class*='mitem']").on("mouseover, mousemove", function(e){
			
			
			
               e.preventDefault();
					
         
			l = $(this).position().left;
             
			
			t =$(this).position().top;

      if($(this).children('ul').first()!==null){		
		if(parseInt($(this).children('ul').first().offset().left)+parseInt($(this).children('ul').first().width())>=$(window).width()-121 && $(window).width()>=993){
					 l-=parseInt($(this).children('ul').first().width());
	                    l+= parseInt(options.submenuleft);	
						 
            }
		    else
			{				
				   l+= parseInt(options.submenuleft);

			}
		//	if(parseInt($(this).children('ul').first().offset().top)+parseInt($(this).children('ul').first().height())>=screen.height-121){
			if(parseInt($(this).children('ul').first().css('top'))+parseInt($(this).children('ul').first().height())>=$(window).height()-121 && $(window).width()>=993){

		
		   	       t+= parseInt(options.submenutop);
				   t-=parseInt($(this).children('ul').first().height());


            }
		    else
			{
				  t+= parseInt(options.submenutop);

			}
			$(this).children('ul').first().css({position:'absolute', left:l+'px', top:t+'px'});

	  }
			//check if it includes only the first level uls
		if( $(this).children('ul').first())
		{
			
			$(this).children('ul').first().css({animationDuration: parseInt(options.animSpeed)+'ms', display:'',animationFillMode: 'both'})

			$(this).children("ul").first().removeClass(options.animOut);
			$(this).children("ul").first().addClass(options.animIn);
		}
		
		
	});
	
	
		/*$("li[class*='mitem']").on('mousemove', function(e){
			
			console.log("zaaaaaaaaaaaaaaaaaaaaa")
			
               e.preventDefault();
					
         
			l = $(this).position().left;
             
			
			t =$(this).position().top;

      if($(this).children('ul').first()!==null){		
		if(parseInt($(this).children('ul').first().offset().left)+parseInt($(this).children('ul').first().width())>=screen.width-121){
						 l-=parseInt($(this).children('ul').first().width());
	                     l+= parseInt(options.submenuleft);	
						 
            }
		    else
			{				
				   l+= parseInt(options.submenuleft);

			}
			if(parseInt($(this).children('ul').first().offset().top)+parseInt($(this).children('ul').first().height())>=$(window).height()){
		
		   	       t+= parseInt(options.submenutop);
				   t-=parseInt($(this).children('ul').first().height());


            }
		    else
			{
				  t+= parseInt(options.submenutop);

			}
			$(this).children('ul').first().css({position:'absolute', left:l+'px', top:t+'px'});

	  }
			//check if it includes only the first level uls
		if( $(this).children('ul').first())
		{
			
			$(this).children('ul').first().css({animationDuration: parseInt(options.animSpeed)+'ms', display:'',animationFillMode: 'both'})

			$(this).children("ul").first().removeClass(options.animOut);
			$(this).children("ul").first().addClass(options.animIn);
		}
		
		
	});
	*/
	
	
	
	$("li[class*='mitem']").on('mouseleave', function(e){
		
				
		if( $(this).children('ul'))
		{
					//	$(this).children('ul').first().css({ animationDuration: '600ms', opacity:1, display:'block'})
					$(this).children('ul').first().css({animationDuration:options.animSpeed+'ms', opacity:1, display:'block'})

							$(this).children("ul").first().removeClass(options.animIn);
			            $(this).children("ul").first().addClass(options.animOut);
								$(this).children('ul').first().css({ display:'none !important'});


		}
	});
		


	}

})(jQuery);


var initMenu = function() {
  if (typeof jQuery == 'undefined') {
		console.log('jQuery missing');
	} else {
		jQuery('.tdmenu[data-options]').each(function () {
			var menu = jQuery(this);
			menu.data();
			var options = menu.data('options');
			menu.removeAttr('data-options');
			new Mtdmenu(menu, options);
		});
	}
}

if (document.readyState !== 'loading') {
  initMenu();
} else {
  document.addEventListener('DOMContentLoaded', function() {
    initMenu();
  });
}