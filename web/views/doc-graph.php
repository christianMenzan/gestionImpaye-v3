<link rel="stylesheet" media="screen" href="css/docs.css" />
<link rel="stylesheet" media="screen" href="lib/jqplot/jquery.jqplot.min.css" />
<!-- jQplot SETUP -->
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/jqplot/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="lib/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="lib/jqplot/plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="lib/jqplot/plugins/jqplot.highlighter.min.js"></script>
<script type="text/javascript" src="lib/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
<script type="text/javascript" src="lib/jqplot/plugins/jqplot.pointLabels.min.js"></script>
<script type="text/javascript" src="lib/jqplot/plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="lib/jqplot/plugins/jqplot.donutRenderer.min.js"></script>
<script type="text/javascript" src="lib/jqplot/plugins/jqplot.bubbleRenderer.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
 	var profits = [100,120, 59,93,46,62];
 	var expenses = [82,46, 51,130,88,48];
 	var sales = [29,50,110,115,89,54];
	var tickslabel = ['January', 'February', 'March', 'April','May','June'];
	var ylabel=['Profits','Expenses','Sales'];
	
 	//basic line graph
 	var chart1 = $.jqplot ('chart1', [profits,expenses,sales]); 

 	//line with some options
 	var chart2 = $.jqplot('chart2', [profits,expenses,sales], {
		title:'Line graph with Options',
     	legend:{
 	    	show:true,
 	    	labels:['Profits','Expenses','Expenses'],
 	    	location:'ne'
 	    	},
      	axes:{
        	xaxis:{
 	    		renderer:$.jqplot.CategoryAxisRenderer ,
 	    		ticks:tickslabel
        	},
	        yaxis:{
	          tickOptions:{
	            formatString:'$%.2f'
	            }
	        }
      	},
      	highlighter: {
        	show: true,
        	sizeAdjust: 7.5,
       		tooltipAxes:'y'
      	},
      	cursor: {
        	show: false
      	}
  	});
  	
  	//bar chart
 	var chart3 = $.jqplot('chart3',[profits,expenses,sales],{
 		title:"Bar graph with 'jqplotDataMouseOver' and 'jqplotDataClick'",
        seriesDefaults: {
            renderer:$.jqplot.BarRenderer,
            pointLabels: { show: true }
        },
        axes: {
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: tickslabel
            },
            yaxis:{
  	          tickOptions:{
  	            formatString:'$%.2f'
  	            }
  	        }
        }
    });
 
    $('#chart3').bind('jqplotDataHighlight', 
        function (ev, seriesIndex, pointIndex, data) { $('#info1').php(tickslabel[seriesIndex] + ' - '+ data[1] ); }
    );
    $('#chart3').bind('jqplotDataClick', 
    	function (ev, seriesIndex, pointIndex, data) { $('#info2').php(tickslabel[seriesIndex] + ' - '+ data[1]); }
	);
    $('#chart3').bind('jqplotDataUnhighlight', 
        function (ev) { $('#info1').php(''); }
    );
    
    //Stacked bar chart
    var plot3 = $.jqplot('chart4', [profits,expenses,sales],{
    	title:"Stacked Bar Chart",
	    stackSeries: true, // Tell the plot to stack the bars.
	    captureRightClick: true,
	    seriesDefaults:{
	      renderer:$.jqplot.BarRenderer,
	      rendererOptions: {
	          barMargin: 10,
	          highlightMouseDown: true   
	      },
	      pointLabels: {show: true}
	    },
	    axes: {
	      xaxis: {
	          renderer: $.jqplot.CategoryAxisRenderer,
	          ticks: tickslabel
	      },
	      yaxis: {
	        padMin: 0,
	        tickOptions:{
	    	  formatString:'$%.0f'
  	        	}
	      }
	    },
	    legend: {
	      show: true,
	      location: 'ne'
	    }      
	  });
	$('#chart4').bind('jqplotDataClick', 
		function (ev, seriesIndex, pointIndex, data) { $('#info3').php(tickslabel[pointIndex] + ' ' + ylabel[seriesIndex] + ' : ' + data[1]); }
	);

	//pie chart
	var total = [['Profit', 480],['Expenses', 445], ['Sales', 447]];
	var chart5 = jQuery.jqplot ('chart5', [total], {
		seriesDefaults: {
     		renderer: jQuery.jqplot.PieRenderer, 
     		rendererOptions: { showDataLabels: true }
   		}, 
   		legend: { show:true, location: 'e' }
 	});

 	//cut out pie chart without filling
	var chart6 = jQuery.jqplot ('chart6', [total], {
		seriesDefaults: {
			renderer: jQuery.jqplot.PieRenderer, 
			rendererOptions: {
		    	fill: false, // Turn off filling of slices.
		        showDataLabels: true, 
		        sliceMargin: 4, // Add a margin to seperate the slices. 
		        lineWidth: 5 // stroke the slices with a little thicker line.
		    }
		}, 
		legend: { show:true, location: 'ne' }
	});

	//Donut Chart
	var chart7 = $.jqplot('chart7', [profits,expenses,sales], {
	    seriesDefaults: {
	      renderer:$.jqplot.DonutRenderer, // make this a donut chart.
	      rendererOptions:{
	        sliceMargin: 3, // Donut's can be cut into slices like pies.
	        startAngle: -90, // Pies and donuts can start at any arbitrary angle.
	        showDataLabels: true,
	        // By default, data labels show the percentage of the donut/pie.
	        // You can show the data 'value' or data 'label' instead.
	        dataLabels: 'value'
	      }
	    }
	  });

	  //Bubble Chart
	var arr = [[100, 82, 29, "January"], [120, 46, 50, "February"], 
	           [59, 51, 110, "March"], [93, 130, 115, "April"], 
	           [46, 88, 89, "May"], [62, 48, 54, "June"]];
	            
	           var chart8 = $.jqplot('chart8',[arr],{
	               title: 'Bubble Chart with Gradient Fills',
	               seriesDefaults:{
	                   renderer: $.jqplot.BubbleRenderer,
	                   rendererOptions: {
	                       bubbleGradients: true
	                   },
	                   shadow: true
	               }
	           });
 });
</script>
<!-- jQplot SETUP END -->

<h1 class="page-title">Graph</h1>
<div class="container_12 clearfix">
	<section class="portlet grid_12 leading docs">
		<header>
    		<h2>Graph</h2>
    	</header>
    	<section>
    		<p>Create graphs with beautiful lines, bar and charts using <a href="http://www.jqplot.com/">jqplot</a> plugin. jqPlot is a jQuery plugin to generate pure client-side javascript charts in your web pages.</p>
    		
    		<h4>Sample Data</h4>
    		<p>We will be using the following table for all our graphs.</p>
    		<table class="basic-table">
    			<thead>
					<tr>
						<th style="width:100px"></th>
						<th>January</th>
						<th>February</th>
						<th>March</th>
						<th>April</th>
						<th>May</th>
						<th>June</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Profit</td>
						<td>100</td>
						<td>120</td>
						<td>59</td>
						<td>93</td>
						<td>46</td>
						<td>62</td>
						<td>480</td>
					</tr>
					<tr>
						<td>Expenses</td>
						<td>82</td>
						<td>46</td>
						<td>51</td>
						<td>130</td>
						<td>88</td>
						<td>48</td>
						<td>445</td>
					</tr>
					<tr>
						<td>Sales</td>
						<td>29</td>
						<td>50</td>
						<td>110</td>
						<td>115</td>
						<td>89</td>
						<td>54</td>
						<td>447</td>
					</tr>
    		</table>
    		
    		<h4>Lets get start</h4>
    		<p>Creating the HTML code. Add a container (target) to your web page where you want your plot to show up.  Be sure to give your target a width and a height:</p>
<pre class="code">
&lt;div id=&quot;chartdiv&quot; style=&quot;width:100%;height:160px;&quot;&gt;&lt;/div&gt;
</pre>    		
			<p>Now create a plot. Create the actual plot by calling the $.jqplot plugin with the id of your target and some data:</p>
<pre class="code">
Javascript Syntax:
chart = $.jqplot(&quot;targetElemId&quot;, [dataArray,...], {optionsObject});
</pre>    		
    		<p>Check for complete jqPlot option <a href="http://www.jqplot.com/docs/files/jqPlotOptions-txt.php#jqPlot_Options">here</a></p>
    		
    		
    		<h4>Line Graph and some customization</h4>
    		<div class="">
    			<p>The most basic jqPlot chart takes a series of data and plots a line. No options need to be supplied.</p>
    			<pre class="code">
$(document).ready(function(){
	var profits = [100,120, 59,93,46,62];
	var expenses = [82,46, 51,130,88,48];
	var sales = [29,50,110,115,89,54];
	var tickslabel = ['January', 'February', 'March', 'April','May','June'];
	var chart1 = $.jqplot ('chartdiv', [profits, expenses, sales]);
});
</pre>
				<div class="jqPlot" id="chart1" style="width:100%;height:160px;"></div>
    		</div>
    		
    		<div class="leading">
    			<p>Now let's add some customization:</p>
    			<p>The following plot uses a number of options to set the title,add legend, highlighter and shows how to use the CategoryAxisRenderer plugin to render a category style axis, with equal pixel spacing between y data values of a series.</p>
<pre class="code">
var chart2 = $.jqplot('chart2', [profits,expenses,sales], {
		title:'Line graph with Options',
     	legend:{
 	    	show:true,
 	    	labels:['Profits','Expenses','Expenses'],
 	    	location:'ne'
 	    	},
      	axes:{
        	xaxis:{
 	    		renderer:$.jqplot.CategoryAxisRenderer ,
 	    		ticks:tickslabel
        	},
	        yaxis:{
	          tickOptions:{
	            formatString:'$%.2f'
	            }
	        }
      	},
      	highlighter: {
        	show: true,
        	sizeAdjust: 7.5,
       		tooltipAxes:'y'
      	},
      	cursor: {
        	show: false
      	}
});
Below charts depend on the following files:
- &lt;script type=&quot;text/javascript&quot; src=&quot;../jqplot.categoryAxisRenderer.min.js&quot;&gt;&lt;/script&gt; 
</pre>
				<div class="jqPlot" id="chart2" style="width:100%;height:200px;"></div>
    		</div>
    		
    		<h4>Bar Graph and some customization</h4>
    		<div class="">
    			<p>Below is a default bar plot. Bars will highlight on mouseover. Events are triggered when you mouseover a bar and also when you click on a bar.
    				Here we capture 'jqplotDataMouseOver' and 'jqplotDataClick'.jqplotDataMouseOver event will fire continuously as the user mouses over the bar.
    				Additionally, a 'jqplotDataUnhighlight' event is fired when the user moves out of a bar (if highlighting is enabled).
    			</p>
<pre class="code">
var chart3 = $.jqplot('chart3',[profits,expenses,sales],{
		title:"Bar graph with 'jqplotDataMouseOver' and 'jqplotDataClick'",
        seriesDefaults: {
            renderer:$.jqplot.BarRenderer,
            pointLabels: { show: true }
        },
        axes: {
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: tickslabel
            },
            yaxis:{
  	          tickOptions:{
  	            formatString:'$%.2f'
  	            }
  	        }
        } 
    });
 
    $('#chart3').bind('jqplotDataHighlight',
        function (ev, seriesIndex, pointIndex, data) {
            $('#info1').php(tickslabel[seriesIndex] + ' - '+ data[1] );
        }
    );
    $('#chart3').bind('jqplotDataClick',
    	function (ev, seriesIndex, pointIndex, data) {
        	$('#info2').php(tickslabel[seriesIndex] + ' - '+ data[1]);
		}
	);
      
    $('#chart3').bind('jqplotDataUnhighlight',
        function (ev) {
            $('#info1').php('');
        }
    );
Below charts depend on the following files:
- &lt;script type=&quot;text/javascript&quot; src=&quot;../jqplot.barRenderer.min.js&quot;&gt;&lt;/script&gt;
- &lt;script type=&quot;text/javascript&quot; src=&quot;../jqplot.categoryAxisRenderer.min.js&quot;&gt;&lt;/script&gt;
- &lt;script type=&quot;text/javascript&quot; src=&quot;../jqplot.pointLabels.min.js&quot;&gt;&lt;/script&gt; 
</pre>    			
    			<p><b>Mouse Over:</b> <span id="info1"></span></p>
    			<p><b>Clicked: </b><span id="info2"></span></p>
    			<div class="jqPlot" id="chart3" style="width:100%;height:200px;"></div>
    		</div>
    		<div class="leading">
    			<p>To create stack bar chart, set the 'stackSeries' option to true like below chart. </p>
    			<div class="grid_4">
    				<p><b>You clicked:</b> <span id="info3"></span></p>
    				<div class="jqPlot" id="chart4" style="width:100%;height:400px;"></div>
    				<p></p>
    			</div>
    			<div class="grid_8">
<pre class="code">
var plot3 = $.jqplot('chart4', [profits,expenses,sales],{
	title:"Stacked Bar Chart",
	stackSeries: true, // Tell the plot to stack the bars.
	captureRightClick: true,
	seriesDefaults:{
		renderer:$.jqplot.BarRenderer,
		rendererOptions: { barMargin:10, highlightMouseDown: true },
		pointLabels: {show: true}
	},
	axes: {
		xaxis: {
			renderer: $.jqplot.CategoryAxisRenderer,
			ticks: tickslabel
		},
		yaxis: { padMin: 0,
			tickOptions:{ formatString:'$%.0f'}
		}
	},
	legend: { show: true, location: 'ne' }  
});
$('#chart4').bind('jqplotDataClick', 
	function (ev, seriesIndex, pointIndex, data) {
		$('#info3').php(tickslabel[pointIndex] + ' ' + 
			ylabel[seriesIndex] + ' : ' + data[1]); }
);
</pre>    			
    			</div>
    		</div>
    		
    		<div class="clearfix"></div>
    		<h4>Let's check on some other samples:</h4>
    		<b>Pie Chart</b>
    		<p>Pie Chart depend on: <br/>
    		- &lt;script type=&quot;text/javascript&quot; src=&quot;../jqplot.pieRenderer.min.js&quot;&gt;&lt;/script&gt; </p>
    		<div class="leading">
    			<p>jqPlot bakes up the best pie and donut charts you've ever tasted! Like bar and filled line plots, pie and donut slices highlight when you mouse over.</p>
    			<div class="grid_8">
<pre class="code">
var total = [['Profit', 480],['Expenses', 445], ['Sales', 447]];
	var chart5 = jQuery.jqplot ('chart5', [total], {
		seriesDefaults: {
     		renderer: jQuery.jqplot.PieRenderer, 
     		rendererOptions: { showDataLabels: true }
   		}, 
   		legend: { 
   			show:true, 
   			location: 'e' 
   		}
 	});
</pre>
    			</div>
    			<div class="grid_4">
    				<div class="jqPlot" id="chart5" style="width:100%;height:210px;"></div>
    			</div>
    		</div>
    		
    		<div class="clearfix"></div>
    		<div class="leading">
    			<p>Too many calories in that pie? Get all the taste without the filling! Highlighting and data labels are still supported. You can even cut out the slices!</p>
    			<div class="grid_4">
    				<div class="jqPlot" id="chart6" style="width:100%;height:220px;"></div>
    			</div>
    			<div class="grid_8">
<pre class="code">
var chart6 = jQuery.jqplot ('chart6', [total], {
  seriesDefaults: {
	renderer: jQuery.jqplot.PieRenderer, 
	rendererOptions: {
		fill: false, // Turn off filling of slices.
	    showDataLabels: true, 
	    sliceMargin: 4, // Add a margin to seperate the slices. 
	    lineWidth: 5 // stroke the slices with a little thicker line.
	}
  }, 
  legend: { show:true, location: 'ne' }
});
</pre>    			
    			</div>
    		</div>
    		
    		<div class="clearfix"></div>
    		<b>Donut Chart</b>
    		<p>Donut Chart depend on: <br/>
    		- &lt;script type=&quot;text/javascript&quot; src=&quot;../jqplot.donutRenderer.min.js&quot;&gt;&lt;/script&gt; </p>
    		<div class="leading">
    			<p>Coming straight from the same bakery, donut plots have nearly identical options as pie charts.</p>
    			<div class="grid_4">
    				<div class="jqPlot" id="chart7" style="width:100%;height:240px;"></div>
    			</div>
    			<div class="grid_8">
<pre class="code">
var chart7 = $.jqplot('chart7', [profits,expenses,sales], {
    seriesDefaults: {
      renderer:$.jqplot.DonutRenderer, //make this a donut chart.
      rendererOptions:{
        sliceMargin: 3, //Donut's can be cut into slices like pies.
        startAngle: -90, //Pies and donuts can start at any arbitrary angle
        showDataLabels: true,
        // By default, data labels show the percentage of the donut/pie.
        // You can show the data 'value' or data 'label' instead.
        dataLabels: 'value'
      }
    }
  });
</pre>    			
    			</div>
    		</div>
    		
    		<div class="clearfix"></div>
    		<b>Bubble Chart</b>
    		<p>Bubble Chart depend on: <br/>
    		- &lt;script type=&quot;text/javascript&quot; src=&quot;../jqplot.bubbleRenderer.min.js&quot;&gt;&lt;/script&gt;</p>
    		<div class="leading">
    			<p>Bubble charts represent 3 dimensional data. First, a basic bubble chart with the "bubbleGradients: true" option to specify gradient fills. Radial gradients are not supported in IE version before IE 9 and will be automatically disabled.</p>
    			<div class="grid_6">
<pre class="code">
var arr = [[100, 82, 29, "January"], 
  [120, 46, 50, "February"], 
  [59, 51, 110, "March"], [93, 130, 115, "April"], 
  [46, 88, 89, "May"], [62, 48, 54, "June"]];
   
var chart8 = $.jqplot('chart8',[arr],{
      title: 'Bubble Chart with Gradient Fills',
      seriesDefaults:{
          renderer: $.jqplot.BubbleRenderer,
          rendererOptions: {
              bubbleGradients: true
          },
          shadow: true
      }
});
</pre>    			
    			</div>
    			<div class="grid_6">
    				<div class="jqPlot" id="chart8" style="width:100%;height:270px;"></div>
    			</div>
    		</div>
    			
    		<div class="clearfix"></div>
    		<p>Also don't forget to include the following:</p>
			<ul class="nostyle">
				<li>javascript 1.4.3 and above</li>
				<li>jquery.jqplot.min.js</li>
				<li>excanvas.js - optionally the excanvas script for IE support (for IE9 and below)</li>
				<li>jquery.jqplot.min.css</li>
			</ul>
    		
    		<p>* Check on more examples <a href="http://www.jqplot.com/tests/">here</a> or <a href="http://www.jqplot.com/deploy/dist/examples/">here</a>.</p>
    		<p>* jqPlot has been tested on IE 6, IE 7, IE 8, Firefox, Safari, and Opera.</p>
		</section>
	</section>
</div>