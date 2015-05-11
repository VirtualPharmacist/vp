$.getJSON( "json/results.json", function( data ) {
  var items = data;
	$(function(){ // on dom ready
	
	var elesJson =data; 
var options = {
  name: 'arbor',

  animate: false, // whether to show the layout as it's running
  maxSimulationTime: 30000, // max length in ms to run the layout
  fit: true, // on every layout reposition of nodes, fit the viewport
  padding: 20, // padding around the simulation
  boundingBox: undefined, // constrain layout bounds; { x1, y1, x2, y2 } or { x1, y1, w, h }
  ungrabifyWhileSimulating: false, // so you can't drag nodes during layout

  // callbacks on layout events
  ready: undefined, // callback on layoutready 
  stop: undefined, // callback on layoutstop

  // forces used by arbor (use arbor default on undefined)


  // static numbers or functions that dynamically return what these
  // values should be for each element
  // e.g. nodeMass: function(n){ return n.data('weight') }


  stepSize: 0.1, // smoothing of arbor bounding box

  // function that returns true if the system is stable to indicate
  // that the layout can be stopped
  stableEnergy: function( energy ){
    var e = energy; 
    return (e.max <= 0.5) || (e.mean <= 0.3);
  },

  // infinite layout options
  infinite: false // overrides all other options for a forces-all-the-time mode
};
var cy = cytoscape({
  container: document.getElementById('cy'),
	  style: cytoscape.stylesheet()
		.selector('node')
		  .css({
		'background-color': '#6CA6E1',
        'text-valign': 'center',
        'color': 'black',
        'text-outline-width': 2,
        'text-outline-color': 'white',
			'content': 'data(id)'
		  })
		.selector('edge')
		  .css({
			'line-color': '#F2B1BA',
			'target-arrow-color': '#F2B1BA',
			'width': 2,
			'target-arrow-shape': 'triangle',
			'opacity': 0.8
		  })
		.selector(':selected')
		  .css({
			'background-color': 'black',
			'line-color': 'black',
			'target-arrow-color': 'black',
			'source-arrow-color': 'black',
			'opacity': 1
		  })
		.selector('.faded')
		  .css({
			'opacity': 0.25,
			'text-opacity': 0
		  }),
	  
	  elements: elesJson,
	  
	  layout: {
		name: 'arbor',
		
	  },
	  
	  ready: function(){
		// ready 1
  		window.cy = this;
		cy.layout( options );
		var edgesFromJerry1 = cy.elements('node[type="gene"]');
		
		edgesFromJerry1.css('background-color', '#FFDD00');	
		var edgesFromJerry2 = cy.elements('node[type="snp"]');
		
		edgesFromJerry2.css('background-color', '#8EE834');	
		var edgesFromJerry3 = cy.elements('node[type="disease"]');
		
		edgesFromJerry3.css('background-color', '#E667A9');	
		var edgesFromJerry4 = cy.elements('node[type="homolog"]');
		
		edgesFromJerry4.css('background-color', '#FA7F04');
		var edgesFromJerry5 = cy.elements('node[type="phenotype"]');
		
		edgesFromJerry5.css('background-color', '#CF76ED');											
		
		
	  }
});
	
	  
	}); // on dom ready
});
