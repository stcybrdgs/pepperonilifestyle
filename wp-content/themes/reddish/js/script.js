( function( $ ) {
	$( document ).ready( function() {
		$( '#slider_wrapper' ).css( 'display', 'block' );
		/* Form elements */
		/* Select */
		$( 'select' ).each( function() {
			if ( !( $( this ).closest( 'form.woocommerce-checkout' ).length > 0 ) ) {
				$( this ).addClass( 'sel_styled' );
			}
		} );
		$( '.sel_styled' ).wrap( '<div class="rddsh_sel_styled_cont">' ).width( $( '.rddsh_sel_styled_cont' ).width() );
		$( '.rddsh_sel_styled_cont' ).append( '<div class="rddsh_sel_styled_cont_open"></div>' );

		$( '.sel_styled' ).each( function() {

			if ( $( this ).find( 'optgroup' ).length > 0 ) {
				$( this ).find( 'optgroup' ).each( function() {
					$( this ).closest( '.rddsh_sel_styled_cont' ).find( '.rddsh_sel_styled_cont_open' ).append( '<div class="sel_styled_optgroup">' + $( this ).attr( 'label' ) + '</div>' );
					$( this ).find( 'option' ).each( function() {
						if ( $( this ).attr( 'disabled' ) ) {
							$( this ).closest( '.rddsh_sel_styled_cont' ).find( '.rddsh_sel_styled_cont_open' ).append( '<div class="sel_styled_opt_dis" data-value ="' + $( this ).val() + '" >' + $( this ).text() + '</div>' );
						} else {
							$( this ).closest( '.rddsh_sel_styled_cont' ).find( '.rddsh_sel_styled_cont_open' ).append( '<div class="sel_styled_opt" data-value ="' + $( this ).val() + '" >' + $( this ).text() + '</div>' );
						}
					} );
				} );
			} else {
				$( this ).find( 'option' ).each( function() {
					if ( $( this ).attr( 'disabled' ) ) {
						$( this ).closest( '.rddsh_sel_styled_cont' ).find( '.rddsh_sel_styled_cont_open' ).append( '<div class="sel_styled_opt_dis" data-value ="' + $( this ).val() + '" >' + $( this ).text() + '</div>' );
					} else {
						$( this ).closest( '.rddsh_sel_styled_cont' ).find( '.rddsh_sel_styled_cont_open' ).append( '<div class="sel_styled_opt" data-value ="' + $( this ).val() + '" >' + $( this ).text() + '</div>' );
					}
				} );
			}
		} );

		$( 'body' ).on( 'click', function( e ) {
			var elem;
			if ( $( e.target ).hasClass( 'rddsh_sel_styled_cont' ) ) {
				elem = e.target;
			} else if ( $( e.target ).closest( '.rddsh_sel_styled_cont' ).length > 0 ) {
				elem = $( e.target ).closest( '.rddsh_sel_styled_cont' );
			} else {
				elem = false;
			}
			if ( elem && ! $( elem ).hasClass( 'open' ) ) {
				$( this ).find( '.rddsh_sel_styled_cont' ).removeClass( 'open' );
				$( this ).find( '.rddsh_sel_styled_cont_open' ).slideUp();
				$( elem ).addClass( 'open' );
				$( elem ).find( '.rddsh_sel_styled_cont_open' ).slideDown();
			} else {
				$( this ).find( '.rddsh_sel_styled_cont' ).removeClass( 'open' );
				$( this ).find( '.rddsh_sel_styled_cont_open' ).slideUp();
			}
		} );

		/* set values from dropdown menu item to select main field */
		$( '.rddsh_sel_styled_cont_open' ).on( 'click', '.sel_styled_opt', function( e ) {
			var elem = e.target;
			$( elem ).closest( '.rddsh_sel_styled_cont' ).find( '.sel_styled_text' ).text( $( elem ).text() );
			$( elem ).closest( '.rddsh_sel_styled_cont' ).find( '.sel_styled' ).val( $( elem ).text() );
			$( elem ).closest( '.rddsh_sel_styled_cont' ).find( 'select' ).find( 'option' ).removeAttr( 'selected' );
			$( elem ).closest( '.rddsh_sel_styled_cont' ).find( 'select' ).find( 'optgroup, option' ).eq( $( elem ).index() ).attr( 'selected', 'selected' ).trigger( 'change' );
		} );

		$( '.sel_styled' ).each( function() {
			if ( $( this ).find( 'option[selected]' ).text() ) {
				$( this ).parent().append( '<span class="sel_styled_text">' + $( this ).find( 'option[selected]' ).text() + '</span>' );
			} else {
				$( this ).parent().append( '<span class="sel_styled_text">' + $( this ).children( 'option:first' ).text() + '</span>' );
			}
		} );

		/*Radio script*/
		$( 'input[type="radio"]' ).addClass( 'rad_styled' );
		$( '.rad_styled' ).wrap( '<span class="rad_styled_cont"></span>' );
		/* Second tag 'span' must be given otherwise IE 8 doesn't wrap element in span */
		$( 'input[type="radio"]:checked' ).parent().addClass( 'checked' );

		/* Check if other radio buttons checked. If they are checked, remove 'checked' attribute */
		$( 'input[type="radio"]' ).click( function() {
			$( 'input[type="radio"]' ).each( function() {
				if ( $( this ).parent().hasClass( 'checked' ) ) {
					$( this ).parent().removeClass( 'checked' );
				}
			} );
			$( this ).parent().addClass( 'checked' );
		} );

		/* Checkbox script */
		$( 'input[type="checkbox"]' ).addClass( 'che_styled' );
		$( '.che_styled' ).wrap( '<span class="che_styled_cont"></span>' );
		$( 'input[type="checkbox"]:checked' ).parent().addClass( 'checked' );
		$( 'input[type="checkbox"]' ).click( function() {
			$( this ).parent().toggleClass( 'checked' );
		} );

		/* Reset button script */
		/* if the button has value that is assigned to var clearButtontexteng in functions.php 
		 then use value that is translatable */
		if ( $( 'input[type="reset"]' ).val() == reddishStringJs.clearButtontexteng ) {
			$( 'input[type="reset"]' ).attr( 'value', reddishStringJs.clearButtontext );
			/*adding text to clear button */
		}
		/* File-input script */
		$( 'input[type="file"]' ).addClass( 'file_styled' );
		$( '.file_styled' ).wrap( '<div class="upload_file">' ).wrap( '<div class="file_styled_cont">' );
		$( '.file_styled_cont' ).append( '<div class="replace_field">' ).after( '<div class="file_styled_validator">' );
		$( '.replace_field' ).html( reddishStringJs.chooseFile + '…' );
		$( '.file_styled_validator' ).text( reddishStringJs.fileNotselected );

		/* When file is chosen, change text and remove background image */
		$( '.file_styled' ).on( 'change', function() {
			var path = $( this )[ 0 ].files[ 0 ][ 'name' ];
			if ( path ) {
				$( this ).siblings( '.replace_field' ).text( path ).css( 'background-image', 'none' );
				$( this ).parent().siblings( '.file_styled_validator' ).text( reddishStringJs.fileSelected );
			} else {
				$( this ).siblings( '.replace_field' ).html( reddishStringJs.chooseFile + '&#8230' );
				$( this ).parent().siblings( '.file_styled_validator' ).text( reddishStringJs.fileNotselected );
			}
		} );
		/* Trigger click on input [type=file] when 'replace field' is clicked */
		$( '.replace_field' ).click( function() {
			$( this ).siblings( '.file_styled' ).trigger( 'click' );
		} );
		$( 'input[type="reset"]' ).click( function() {
			$( 'input[type="text"]' ).each( function() {
				$( this ).val( '' );
			} );
			$( 'textarea' ).each( function() {
				$( this ).val( '' );
			} );
			$( 'select' ).each( function() {
				$( this ).val( '' );
				$( this ).children( 'option' ).removeAttr( 'selected' );
				$( this ).next().next( 'span' ).text( $( this ).find( 'option:first' ).text() );
			} );

			$( 'input[type="radio"]' ).each( function() {
				$( this ).checked = false;
				if ( $( this ).parent().hasClass( 'checked' ) ) {
					$( this ).parent().removeClass( 'checked' );
					$( this ).removeAttr( 'checked' );
				}
			} );
			$( 'input[type="checkbox"]' ).each( function() {
				if ( $( this ).parent().hasClass( 'checked' ) ) {
					$( this ).parent().removeClass( 'checked' );
					$( this ).removeAttr( 'checked' );
				}
			} );
			$( 'input[type="file"]' ).each( function() {
				if ( $.browser.msie ) {
					$( this ).after( $( this ).clone( true ) ).remove();
					/* create clone for ie as val ('') doesn't work in it */
				} else {
					$( this ).val( '' );
				}
				$( this ).val( '' );
				$( '.replace_field' ).removeAttr( 'style' ).html( reddishStringJs.chooseFile + '&#8230' );
				$( '.file_styled_validator' ).text( reddishStringJs.fileNotselected );
			} );
		} );
		/* end of form reset function */

		/* Submit button */
		/* if the button has value that is assigned to var submitButtontexteng in functions.php 
		 then use value that is translatable */
		if ( $( 'input[type="submit"]' ).val() == reddishStringJs.submitButtontexteng ) {
			$( 'input[type="submit"]' ).attr( 'value', reddishStringJs.submitButtontext );
			/* adding text to submit button */
		}
		/* Do not display reply comment link in contact form plugin when comment deep is exceeded */
		$( 'div.reply:not(:has( a ))' ).addClass( 'display_none' );
		$( ".widget-area label[for='cntctfrm_contact_send_copy']" ).addClass( 'cntctfrm_label' );
		/* To make focus event work in ie-7 */
		if ( $.browser.msie && $.browser.version < 8 ) {
			$( 'input:text, textarea' ).bind( 'focus blur', function() {
				$( this ).toggleClass( 'focused' )
			} );
		}

		/* to fix display bug in IE7 when labels in .widget-area are placed too close to below elements*/
		if ( $.browser.msie && $.browser.version < 8 ) {
			$( '.widget-area input[type="checkbox"]' ).each( function() {
				$this      = $( this );
				var $label = $( ".widget-area label[for='" + $this.attr( 'id' ) + "']" );
				if ( $label.length > 0 ) {//this input has a label associated with it
					$label.addClass( 'positioned' );
				}
			} );
			$( '.widget-area input[type="radio"]' ).each( function() {
				$this      = $( this );
				var $label = $( ".widget-area label[for='" + $this.attr( 'id' ) + "']" );
				if ( $label.length > 0 ) {//this input has a label associated with it
					$label.addClass( 'positioned' );
				}
			} );
		}

		/*Menu*/
		$( '.main-navigation' ).on( 'mouseenter', '.menu-item-has-children', function( event ) {
			var elem = event.currentTarget,
				elemChild = $( elem ).children( '.sub-menu' );
			if ( ( elemChild.offset().left + $( this ).width() ) > $( window ).width() ) {
				elemChild.css( 'right', '100%' );
			}
		} );

		/* Smooth scrolling to the top of the page*/
		$( '.top' ).click( function() {
			$( 'html, body' ).animate( { scrollTop: 0 }, 600 );
			return false;
		} );

		/* To center elipsis vertically in post pagination in IE-7 */
		if ( $.browser.msie && $.browser.version < 8 ) {
			$( ".navigation ul li:contains('…')" ).css( { position: 'relative', bottom: '13px' } );
		}

		/* Script for Image Slider */
		var currentSlideNumber = 0;
		var nextSlide          = 0;
		var slideCycle;
		var cycleTimeOut;

		var totalSlidescount = $( '#image_slideshow' ).find( '.slide' ).length;
		/* adding pagers to #cycle_pager div */
		for ( var i = 0; i < totalSlidescount; i++ ) {
			if ( totalSlidescount > 1 ) {
				$( '#cycle_pager' ).append( '<a class="page" data-target="' + i + '">' + i + '</a>' );
			}
		}
		/* adding 'width' value to the  '#cycle_pager' div */
		$( '#cycle_pager' ).css( 'width', $( '#cycle_pager' ).find( 'a' ).length * $( '#cycle_pager' ).find( 'a' ).outerWidth( true ) );
		$( '#image_slideshow' ).find( '.page' ).bind( 'click', function() {
			var targetSlideNumber = $( this ).attr( 'data-target' );

			/* if the currently active pager is clicked, do not call changeCurrentSlide function */
			if ( targetSlideNumber !== currentSlideNumber ) {
				$( this ).addClass( 'current_pager' );
				$( '#cycle_pager' ).find( '.page' ).eq( currentSlideNumber ).removeClass( 'current_pager' );
				changeCurrentSlide( targetSlideNumber );
			}
		} );

		/*add 'visibility:visible' style to the first slide and first element in the pager during initialization */
		$( '#cycle_pager' ).find( '.page' ).first().addClass( 'current_pager' );
		$( '#image_slideshow' ).find( '.slide' ).first().addClass( 'current_slide' );

		/* displaying a slide whose 'data-target' matches the value retrieved from the pager that was clicked */
		function changeCurrentSlide( nextSlide ) {
			/* remove 'current' class from the current slide and add it to the target slide */
			$( '#image_slideshow' ).find( '.slide' ).eq( currentSlideNumber ).animate( { 'opacity': 0 }, 800 ).removeClass( 'current_slide' );
			$( '#image_slideshow .slide' ).eq( currentSlideNumber ).removeClass( 'current_slide' );
			$( '#image_slideshow' ).find( '.slide' ).eq( nextSlide ).animate( { 'opacity': 1 }, 2000 ).addClass( 'current_slide' );

			currentSlideNumber = nextSlide;
			clearInterval( slideCycle );
			clearTimeout( cycleTimeOut );
			/* restart cycle after the specified timeout */
			cycleTimeOut = setTimeout( restartSlidesCycle, 1000 );
		}

		/* start slideshow cycle  */
		function startSlidesCycle() {
			slideCycle = setInterval( function() {
				$( '#image_slideshow' ).find( '.slide' ).eq( currentSlideNumber ).animate( { 'opacity': 0 }, 800 ).removeClass( 'current_slide' );
				//$( '#image_slideshow .slide' ).eq( currentSlideNumber ).removeClass( 'current_slide' );
				$( '#cycle_pager' ).find( '.page' ).eq( currentSlideNumber ).removeClass( 'current_pager' );
				/* if it is the last slide in the list, change the current slide number to 0 */
				if ( currentSlideNumber >= ( totalSlidescount - 1) ) {
					currentSlideNumber = 0;
				} else {
					currentSlideNumber = parseInt( currentSlideNumber, 10 ) + 1;
				}
				$( '#image_slideshow' ).find( '.slide' ).eq( currentSlideNumber ).animate( { 'opacity': 1 }, 2000 ).addClass( 'current_slide' );
				$( '#cycle_pager' ).find( '.page' ).eq( currentSlideNumber ).addClass( 'current_pager' );
			}, 5000 );
		}

		/* start slideshow cycle after the page loading */
		startSlidesCycle();

		function restartSlidesCycle() {
			startSlidesCycle();
		}

	} );
	/*Document ready*/
}( jQuery ));

