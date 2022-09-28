$(document).ready(function (){
    "use strict";
	$.ajax({
		url: "http://localhost/project/Site/graph/data.php",
		method: "GET",
		success: function (data) {
			console.log(data)
			var subject = [];
			var votes = [];
          

			for(var i in data){
				subject.push(data[i].subject);
				votes.push(data[i].votes);
              
    
			}

            var chartdata = {
            	labels: subject,
                
            	datasets : [
            		{
            			label : 'Votes',
            			backgroundColor : 'rgba(25,140,180, 0.75)',
            			borderColor: 'rgba(250,250,210, 0.75)',
            			hoverBackgroundColor: 'rgba(255,0,0, 1)',
            			hoverBorderColor : 'rgba(200,200,200, 1)',
            			data: votes
            		}
            	]
            };

            var ctx = $("#myCanvas");  
            var barGraph = new Chart(ctx,{
            	type: 'bar',
            	data: chartdata
            });
		},
		error: function(data){
			console.log(data);
		}
	});
});