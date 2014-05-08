<html>
	<head>
		
		<script type="text/javascript">
	
			var myLayout;
			$(document).ready(function () {
				myLayout = $('body').layout({
					west__showOverflowOnHover: true
				});
			});

		</script>	
		<style type="text/css">
			html, body {
			margin: 0; /* Remove body margin/padding */
			padding: 0;
			/* overflow: hidden; Remove scroll bars on browser window */
			font-family: "Trebuchet MS", "Helvetica", "Arial", "Verdana", "sans-serif";
			font-size: 12px;
			}
			table.ui-jqgrid-htable, table.ui-jqgrid-btable tr td, table.ui-jqgrid-ftable tr td {
			font-family: "Trebuchet MS", "Helvetica", "Arial", "Verdana", "sans-serif";
			font-size: 12px;
			}
			.ui-pg-table{ font-size:11px;}
		</style>
		<style type="text/css">
		/**
		 *	Basic Layout Theme
		 * 
		 *	This theme uses the default layout class-names for all classes
		 *	Add any 'custom class-names', from options: paneClass, resizerClass, togglerClass
		 */

		.ui-layout-pane { /* all 'panes' */ 
			background: #FFF; 
			border: 1px solid #BBB; 
			padding: 10px; 
			overflow: auto;
		} 

		.ui-layout-resizer { /* all 'resizer-bars' */ 
			background: #DDD; 
		} 

		.ui-layout-toggler { /* all 'toggler-buttons' */ 
			background: #AAA; 
		} 


		</style>


		<style type="text/css">
		/**
		 *	ALL CSS below is only for cosmetic and demo purposes
		 *	Nothing here affects the appearance of the layout
		 */

		body {
			font-family: Arial, sans-serif;
			font-size: 0.85em;
		}
		p {
			margin: 1em 0;
		}

		/*
		 *	Rules below are for simulated drop-down/pop-up lists
		 */

		ul {
			/* rules common to BOTH inner and outer UL */
			z-index:	100000;
			margin:		1ex 0;
			padding:	0;
			list-style:	none;
			cursor:		pointer;
			border:		1px solid Black;
			/* rules for outer UL only */
			width:		15ex;
			position:	relative;
		}
		ul li {
			background-color: #EEE;
			padding: 0.15em 1em 0.3em 5px;
		}
		ul ul {
			display:	none;
			position:	absolute;
			width:		100%;
			left:		-1px;
			/* Pop-Up */
			bottom:		0;
			margin:		0;
			margin-bottom: 1.55em;
		}
		.ui-layout-north ul ul {
			/* Drop-Down */
			bottom:		auto;
			margin:		0;
			margin-top:	1.45em;
		}
		ul ul li		{ padding: 3px 1em 3px 5px; }
		ul ul li:hover	{ background-color: #FF9; }
		ul li:hover ul	{ display:	block; background-color: #EEE; }

		</style>
		<title>Reports</title>
	</head>	
	
	<body>
		<div class="ui-layout-north" >
			<div id="logindetail" >
				<span class = "signinSpan">Welcome <?php echo $userdata;?> , <a class = "signinSpan" href="<?php echo base_url(); ?>index.php/login/signout/">Sign Out</a></span>
			</div>			
		</div>
		<div class="ui-layout-north" >
			<div id="logindetail" class = "northPane">
				<span class = "signinSpan">Welcome <?php echo $userdata;?> , <a class = "signinSpan" href="<?php echo base_url(); ?>index.php/login/signout/">Sign Out</a></span>
			</div>			
		</div>
		<div class="ui-layout-west">
			<div id="paramselector" class = "westPane">
				<form id="paramselectorFrom" name = "paramselectorFrom" action="" method="POST">
					<div id = "datepicker" class = "datepicker">
						<label for="from">From</label>
						<input type="text" id="from" name="from">
						<label for="to">To</label>
						<input type="text" id="to" name="to">
						
						<span class="mar3"> ISP : </span>
						<select id="ispOptins" name="ispOptins">
							<option value="All">ALL</option>
							<option value="aol">AOL</option>
							<option value="att">ATT</option>
							<option value="bellsouth">Bellsouth</option>
							<option value="comcast">Comcast</option>
							<option value="cox">Cox</option>
							<option value="charter">CTR</option>
							<option value="earthlink">ETH</option>
							<option value="facebook">Facebook</option>
							<option value="gm">Gmail</option>
							<option value="hot">Hotmail</option>
							<option value="juno">Juno</option>
							<option value="others">Others</option>
							<option value="roadrunner">RoadRunner</option>
							<option value="sbc">SBC</option>
							<option value="verizon">Verizon</option>
							<option value="yah">Yahoo</option>
						</select>
						<span class="mar3"> Offer Id : </span>
						<input id="offerid" type="text" name="offerid">
						<span class="mar3">
							<input id="submitParams" type="submit" value="Submit" name="submitParams">
						</span>
						
					</div>
				</form>
			</div>
		</div>
		<div class="ui-layout-center">
			<div id= "paramsSelected" class = "paramsSelected">
					From : <?php echo $sdate;?> To : <?php echo $edate;?> , ISP :  <?php  echo $ispOptins; ?>, OFFER ID :  <?php echo $offerid; ?>
			</div>
			<div id= "graphIcon" class = "graphIcon">
				<a href="javscript:void(0)">
					<img title="GlobalCharts" alt="global Chart" src ="<?php echo base_url(); ?>html/images/canstock.png">
				</a>
			</div>
			<div id = "gridReport" class = "gridReport">				
				<table style="margin-bottom: 16px;">
					<tr>
						<td width='200px' valign='top' style='padding-left:20px;'><br/><br/>
							<div align="right" style="padding-right:5px">
							</div>
							<table id="Grid"></table> <div id="Pager"></div>
						</td>
					</tr>
				</table>
			</div>
			<div id="graphReport" class = "graphReport">
				<div id= "chart_div"></div>
			</div>
		</div>		
	</body>
</html>