$(document).foundation();

$(".grid-item").append("<span class='frame-line'>_</span>");

// //---------- EXTERNAL JS: isotope.pkgd.js

$( document ).ready( function() {
  // init Isotope
  var $container = $('.isotope').isotope({
    itemSelector: '.grid-item',
    layoutMode: 'fitRows',
    getSortData: {
      name: '.name',
      symbol: '.symbol',
      number: '.number parseInt',
      category: '[data-category]',
      weight: function( itemElem ) {
        var weight = $( itemElem ).find('.weight').text();
        return parseFloat( weight.replace( /[\(\)]/g, '') );
      }
    }
  });

  // filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };

  // bind filter button click
  $('#filters').on( 'click', 'button', function() {
    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $container.isotope({ filter: filterValue });
  });

  // bind sort button click
  $('#sorts').on( 'click', 'button', function() {
    var sortByValue = $(this).attr('data-sort-by');
    $container.isotope({ sortBy: sortByValue });
  });
  
  // change is-checked class on buttons
  $('.filter-button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });
  
});



// ---------- MASONRY TEST - http://codepen.io/Goji/pen/Kpgegd


// var panels = [{
//     "imageUrl" : './images/thumb-art-1.png', 
//     "location" : 'Wan Chai', 
//     "date" : 'June 2015 - July 2015', 
//     "artist" : 'MTR Corporation', 
//     "project" : 'Tiara Sculpture Competition' 
//   },{
//     "imageUrl" : './images/thumb-art-2.png', 
//     "location" : 'Wan Chai', 
//     "date" : 'June 2015 - July 2015', 
//     "artist" : 'MTR Corporation', 
//     "project" : 'Tiara Sculpture CompetitionL' 
//   },{
//     "imageUrl" : './images/thumb-art-3.png', 
//     "location" : 'Wan Chai', 
//     "date" : 'June 2015 - July 2015', 
//     "artist" : 'MTR Corporation', 
//     "project" : 'Tiara Sculpture Competition' 
//   },{
//     "imageUrl" : './images/thumb-art-4.png', 
//     "location" : 'Wan Chai', 
//     "date" : 'June 2015 - July 2015', 
//     "artist" : 'MTR Corporation', 
//     "project" : 'Tiara Sculpture Competition' 
//   },{
//     "imageUrl" : './images/thumb-art-5.png', 
//     "location" : 'Wan Chai', 
//     "date" : 'June 2015 - July 2015', 
//     "artist" : 'MTR Corporation', 
//     "project" : 'Tiara Sculpture Competition' 
//   },{
//     "imageUrl" : './images/thumb-art-6.png', 
//     "location" : 'Wan Chai', 
//     "date" : 'June 2015 - July 2015', 
//     "artist" : 'MTR Corporation', 
//     "project" : 'Tiara Sculpture Competition' 
// }]


// $(document).ready(function(){
// 	$grid = $('#grid-content');
	
// 	$.fn.revealItems = function($items){
		
// 		var iso = this.data('isotope');
// 		var itemSelector = iso.options.itemSelector;
// 		$items.hide();
// 		$(this).append($items);
// 		$items.imagesLoaded().progress(function(imgLoad, image){
// 			var $item = $(image.img).parents(itemSelector);
// 			$item.show();
// 			iso.appended($item);
// 		});
	
// 		return this;
// 	}
// 	$grid.isotope({
// 		containerStyle: null,
// 		masonry:{
// 			columnWidth: 555,
// 			gutter: 15
// 		},
// 		itemSelector: '.grid-item',
// 		filter : '*',
// 		transitionDuration: '0.4s'
// 	});

	
// 	$grid.imagesLoaded().progress(function(){
// 		$grid.isotope();
// 	})

// 	function PanelBuilder(obj, idx){
// 		return '<div class="grid-item wow c'+(idx%9)+' fadeInUp" data-category="transition">' +
//           '<div><img src="' + obj.imageUrl +'"></div>' +
//           '<h5>' + obj.location +'</h5>' +
//           '<h6>' + obj.date +'</h6>' +
//           '<h3>' + obj.artist +':</h3>' +
//           '<h3>' + obj.project +'</h3>' +
//         '</div>'
// 	}

// 	function GenerateItems(){
// 		var items = '';

// 		for (var i = 0; i < panels.length; i++) {
// 			items += PanelBuilder(panels[i], i)
// 		};

// 		return $(items);
// 	}

// 	// SimpleInfiniteScroll
// 	function Infinite(e){
// 		if((e.type == 'scroll') || e.type == 'click'){
// 			var doc = document.documentElement;
// 			var top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
// 			var bottom = top + $(window).height();
// 			var docBottom = $(document).height();
			
// 			if(bottom + 50 >= docBottom){
// 				$grid.removeClassItems(GenerateItems());
// 			}
// 		}
// 	}
	
// 	$grid.revealItems(GenerateItems());
	
// 	$(document).on('click','.filter-item',function(){
// 		$('.filter-item.active').removeClass('active');
// 		$(this).addClass('active');
// 		var f = $(this).data('f');
// 		console.log(f);
// 		$grid.find('.grid-item').removeClass('wow').removeClass('fadeInUp');
// 		$grid.isotope({filter: f});
		
// 	})
	
	
// 	$(window).resize(function(){
// 		var margin=40;
// 		var padding=15;
// 		var columns=0;
// 		var cWidth=300;
// 		var windowWidth = $(window).width();

// 		var overflow = false;
// 		while(!overflow){
// 			columns++;
// 			var WidthTheory = ((cWidth*columns)+((columns+1)*padding)+margin);
// 			if(WidthTheory > windowWidth)
// 				overflow = true;			
// 		}		
// 		if(columns > 1)
// 			columns--;
		
// 		var GridWidth = ((cWidth*columns)+((columns+1)*padding)+margin);
		
// 		if( GridWidth != $('#grid').width()){
// 			$('#grid').width(GridWidth);
// 		}
// 	});
// 	$(window).scroll(Infinite);
// 	new WOW().init();


// 	$(".element-item").append("<span class='frame-line'>_</span>");

// })



