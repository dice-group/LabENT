( function( api ) {

	// Extends our custom "lms-education" section.
	api.sectionConstructor['lms-education'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );