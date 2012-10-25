Ext.define('Kort.model.Bug', {
    extend: 'Ext.data.Model',
    config: {
		idProperty: 'id',
		
        fields: [
			{ name: 'id', type: 'auto' },
			{ name: 'schema', type: 'string' },
			{ name: 'type', type: 'string' },
			{ name: 'osm_id', type: 'int' },
			{ name: 'osm_type', type: 'string' },
			{ name: 'title', type: 'string' },
			{ name: 'description', type: 'string' },
            { name: 'latitude', type: 'string' },
            { name: 'longitude', type: 'string' }
        ]
    }
});