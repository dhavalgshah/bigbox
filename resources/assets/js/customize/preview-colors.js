/** global jQuery, wp */

/**
 * External dependencies.
 */
import { filter, forEach, debounce } from 'lodash';

/**
 * Internal depenencies.
 */
import { updateCss } from './../customize-preview.js';

// Wait for DOM ready.
(function( $ ){

	// Wait for Preview ready.
	wp.customize.bind( 'preview-ready', () => {
		const colorControls = filter( Object.keys( wp.customize.settings.activeControls ), ( setting ) => {
			return setting.match( /color/i );
		} );

		// Refresh CSS when each control changes.
		forEach( colorControls, ( settingId ) => {
			wp.customize( settingId, ( settingObj ) => {
				settingObj.bind( debounce( updateCss, wp.customize.settings.timeouts.selectiveRefresh ) );
			} );
		} );

	} );
})( jQuery );
