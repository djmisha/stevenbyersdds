// console.log('what size js');
( function( $ ) {

	_.mixin({
		changeKey: function(value,key) {
			switch(key) {
				case 'height':
					value = parseInt(value);
					value = Math.floor(value/12) + '\'' + (value % 12) + '\"';
				break;
				case 'weight':
					value = value + ' lbs.';
				break;
			}

			key = key.replace( /-/g, ' ') + ":";

			return '<span><strong>' + key + '</strong> ' + value + '</span>';
		}
	});


	$(function() {//doc.ready[shorthand] start

		var category_meta = BbWhatsize,// from localized script
			timeOut = 0,
			limit,
			api_cases_url = category_meta.api_url + category_meta.case_path_api,// api url to use on initial load
			__el = $("#cases");


		/**********************************************
		** // using model to set defaults and change idAttribute
		**********************************************/
		var caseModel = Backbone.Model.extend({
		    idAttribute: 'case_id',
		    defaults : {
		    	case_url : category_meta.category_url + '/patient-'
		    }
		});

		/**********************************************
		** //collection will fetch cases
		**********************************************/
		var cases = Backbone.Collection.extend({
			model : caseModel,
			url : api_cases_url
		});
		/**********************************************
		** // extends have been set! ready to make a new collection
		**********************************************/

		var _cases = new cases();

		/**********************************************
		** // we set up our collection view
		**********************************************/
		var caseView = Backbone.View.extend({

			initialize: function(options){
	           this.options = options || {};

	           //this.template = _.template( $('#single-case').html() );

	           this.render();
	        },
			render: function(){
				if( typeof this.options.limit  != 'undefined' && this.options.limit != '' ){
					limit = this.options.limit
					var cc = this.collection.slice( 0 , limit );
						cc = new Backbone.Collection(cc);
				}
				else{
					var cc = this.collection;
				}
				self = this.$el;
				var t = this;
				/* TEMPLATE */


				setTimeout(function() {
					cc.each(function( sc , index ){

						t.template = _.template( $('#single-case').html() );
						//underscore templating
						//var template = _.template( $('#single-case').html() , sc.attributes );
					//console.log(sc.attributes)
						//var x = t.template( { bna : sc.attributes } );
						self.append( t.template({ bna : sc.attributes }) ).hide().fadeIn();

					}, this );

				}, timeOut );
				return this;
			},
		});


		/**********************************************
		** // On Load , let's fetch and show our results!
		**********************************************/
		var _casesDefault;// save our results (we'll use this later)
		_cases.fetch({success: function() {
			_casesDefault = _cases;
			$('#loadingDiv').hide();
			 var casesLoad = new caseView({  el: __el , collection: _cases });
		}});
		/**********************************************
		** // this is where the magic happens (filtering!)
		**********************************************/
		$('#caseSort select').on('change' , function(){
			var data = $("#caseSort").serializeArray();
			var obj = prepareQuery( data );
			/* find a better method : complete */

			__el.html('');// remove cases
			// show loader
			$('#loadingDiv').show();
			// we set a timeout to fake the loading effect
			setTimeout(function() {
				var _query = $.param( obj );
					_query = _query.replace(/\%2C/g,',');
				if( _query != '' ){

					//we create a new case collection to fetch with filters
					var filtercases = new cases();
						filtercases.url = category_meta.api_url + category_meta.case_path_api + '&' + _query;
						console.log(category_meta.api_url + category_meta.case_path_api + '&' + _query);

					// we use fetch again to GET our collection and show our results using our VIEW
					filtercases.fetch({
						success : function(){
							//console.log(filtercases);
							$('#loadingDiv').hide();
							if(filtercases.length > 0){
								var casesLoad = new caseView({ el: __el , collection: filtercases });
							}
							else{
								__el.html('<center><h3 style="color:#000;border:0;margin:10px 0px;">No Results</h3></center>');
							}
						}
					});
				}
				else{
					// we use our default data
					$('#loadingDiv').hide();
					var casesLoad = new caseView({ el: __el , collection: _casesDefault });
				}
			}, 750);//
		});

		var prepareQuery = function( data ) {
			var obj = {  }
			/* find a better method : complete */
			for ( var i=0 ; i<data.length ; i++ ) {
				if( data[i].value != '' ) {
					if( data[i].value.indexOf('-') != -1 ) {
						obj[data[i].name] = data[i].value.replace(/-/, ',');
					} else {
						obj[data[i].name] = data[i].value;
					}

				}
			};

			return obj;
		}



	});// end of doc.ready
} )( jQuery );