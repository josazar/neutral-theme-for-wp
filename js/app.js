jQuery(document).ready(function (){
	/**
	* SET ELEMENTS VARIABLE
	***************************************/
	let menuBtn = jQuery('.menu-btn');
	let menuFixedNavBar = jQuery('.fixed-nav-bar');
	let navContainer = jQuery('#nav');
	let sliderHome = jQuery('#home #sequence')[0];
	let isFrontPage = jQuery('body').hasClass('home');
	let isRealisationPage = jQuery('body').hasClass('page-template-tmpl-realisations');
	let sliderRealisations = jQuery('.realisations-page #sequence')[0];
	let section1 = jQuery('.section-1');
	let section2 = jQuery('.section-2');

	/**
	* SET ELEMENTS EVENTS
	***************************************/
	// Menu burger Click
	menuBtn.on('click', openMenu);

	/**
	* COMPORTEMENTS DE LA PAGE D'ACCUEIL
	***************************************/
	if(isFrontPage) {
		// Détection du mouseWheel Sur la section-1 - On passe directement sur la section 2 et on affiche le menu Fixed Right
		jQuery(section1).bind("mousewheel", function(event) {
			if(event.deltaY == -1) {
				// // Scroll to section 2
				jQuery.scrollTo('.section-2', {
					axis: 'y',
					duration: 800
				})
				// Affiche le menu fixed right
				menuFixedNavBar.addClass('active')
				menuBtn.removeClass('active')
			}else {
				// jQuery('#main').css('transform', 'translateY(0)')
				menuFixedNavBar.removeClass('active')
				jQuery.scrollTo('.section-1', {
					axis: 'y',
					duration: 800
				})
			}
			return false;
		});
		// Détection du mouseWheel Sur la section-2 - On slide vers la section 1 et on affiche le menu burger start
		jQuery(section2).bind("mousewheel", function(event) {
			if(event.deltaY == 1) {
				// Scroll to section 1
				jQuery.scrollTo('.section-1', {
					axis: 'y',
					duration: 800
				})
				// On réaffiche le menu burger de base
				menuFixedNavBar.removeClass('active')
				menuBtn.addClass('active')
				return false;
			}
		});


		/**
		* SLIDER
		***************************************/
		var options = {
			// See: https://sequencejs.com/documentation/#options
			keyNavigation: true,
			fadeStepWhenSkipped: false,
			startingStepAnimatesIn:true,
			pagination: true,
			autoPlay : true,
			autoPlayInterval:4000,
			animateCanvasDuration:800
		}
		var mySequence = sequence(sliderHome, options);
	}

	/**
	* COMPORTEMENTS DE LA PAGE DES REALISATIONS
	***************************************/
	if(isRealisationPage) {
		/**
		*	Menu sélection des critères
		__________________________________________________________*/
		var navBarLinks = jQuery(".nav-bar.work a");
		var navBarheight = jQuery(".nav-bar.work").height();
		var sectionRealOffset = jQuery(".section-2").offset().top;
		sectionRealOffset -= navBarheight;

		/* Scroll to section 2
		__________________________________________________________*/
		navBarLinks.on("click", function(event) {
			event.preventDefault();
			jQuery.scrollTo(sectionRealOffset, {
				axis: 'y',
				duration: 800
			})
		});

		/* Initialisation de la grille au comportement Isotope
		__________________________________________________________*/
		var $grid = jQuery('.grid').isotope({
		  itemSelector: '.grid-item',
		  percentPosition: true,
		})

		/* Isotope tri - Effet
		__________________________________________________________*/
		jQuery('.work-filter').on( 'click', 'a',function() {
		  var filterValue = jQuery(this).attr('data-filter');
		  $grid.isotope({
		  	filter: filterValue,
		  	layout: 'packery'
		  });
		});
    // Ajout de la classe Active sur les onglets de tries (Clients ou compétences)
		jQuery('.work-filter ul li').on( 'click', 'a', function() {
			var ongletToActive = this.parentNode.parentNode.parentNode.parentNode;
			jQuery('.work-filter li.active').removeClass("active");
			jQuery(ongletToActive).addClass("active");
		})
    // Onglet All : ajout class active
		jQuery('.menu-item-all').on( 'click',function() {
			jQuery('.work-filter li.active').removeClass("active");
			jQuery(this).addClass("active");
		})
	}



	/**
	* MENU RIGHT OPEN
	***************************************/
	function openMenu() {
		menuBtn.toggleClass("close");
		navContainer.toggleClass("open");
	}

})
