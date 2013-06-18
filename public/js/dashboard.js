(function(){ 
    this.init = function() {
        this.load("currentlyplaying");
        this.load("trackspotted");
        this.load("latesttracks");
    };
    
    this.load = function(element) {
		var options = {
			type: "GET",
			url: "dashboard/" + element,
            dataType: "json",
			success: function(response) { 
                console.log(response);
                console.log(Tempo.prepare(element).render(response));

			}
        };
        
        $.ajax(options);
    }
    
    
    this.init();    
})();