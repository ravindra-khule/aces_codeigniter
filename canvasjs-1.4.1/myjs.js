


      window.onload = function () {
          var chart = new CanvasJS.Chart("chartContainer", {
              theme: "theme1",//theme1
			  backgroundColor: "#F5DEB3",
			  padding:10,
			  
              title:{
                  text: "Basic Column Chart - CanvasJS",
				            
             },
              data: [              
              {
// Change type to "bar", "splineArea", "area", "spline", "pie",etc.
                  type: "column",
                  dataPoints: [
                  { label: "apple", y: 10 },
                  { label: "orange", y: 15 },
                  { label: "banana", y: 25 },
                  { label: "mango", y: 30 },
                  { label: "grape", y: 28 }
                  ]
              }
              ]
          });
		  chart.render();
		  
		  
		  var chart1 = new CanvasJS.Chart("chartContainer1", {
              theme: "theme1",//theme1
			  backgroundColor:"#F5DEB3",
              title:{
                  text: "Frits sold is first and second quarter"              
             },
              data: [              
              {

                  type: "column",
				  name:"First Quarter",
                  dataPoints: [
                  { label: "apple", y: 18},
                  { label: "orange", y: 29 },
                  { label: "banana", y: 40 },
                  { label: "mango", y: 34 },
                  { label: "grape", y: 24 }
                  ]
              },
			  {

                  type: "column",
				  name:"Second Quarter",
                  dataPoints: [
                  { label: "apple", y: 22},
                  { label: "orange", y: 33 },
                  { label: "banana", y: 48 },
                  { label: "mango", y: 37 },
                  { label: "grape", y: 20 }
                  ]
              }
              ]
          });

          
		   chart1.render();
      }
