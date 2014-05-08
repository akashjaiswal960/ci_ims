function getFilterParams(Grid){

	return $("#gview_"+Grid+" .ui-search-toolbar input, #gview_"+Grid+" .ui-search-toolbar select").map(function(){
		val = $(this).val();
		if(val != '' && val !== 'All'){
			id = $(this).attr('id');
			id = id.replace('gs_','');
			return id+'='+val
		}
	}).get().join('&');
}

function ExportDataToExcel(grid,redirect){
	filterParameters = getFilterParams(grid);
	var params = filterParameters;
	//var url=redirect+'getData=excel&'+params;
	var url=redirect;
	window.location = url;
}

$(function() {
	var d = $.trim($("#date3").val()+'');
	$( "#from" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#to" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#to" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#from" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	//data="";
	//getGridData(data);
});

$( document ).ready(function(){
	$('#graphReport').hide();
	getGridData();
	$('#graphIcon').click(function(e){
		e.preventDefault();
		$('#gridReport').hide();
		$('#graphReport').show();
	});
})

function getGridData(data){
	var	grid = $("#Grid");	
	
	grid.jqGrid({
		url: base_url+'/application/libraries/reportTest.php',
		datatype: "json",
		colNames:['Mailer','Offer id','List','ISP','Total','Delivered','Bounce','HBounce','SBounce','Deferred','Opens','Clicks','Revenue','ECPM','EPC'],
		colModel:[
			{name:'username',index:'username', width:200,sorttype:'string', align:"center",searchoptions:{sopt:['eq']}},
			{name:'offerid',index:'offerid', width:200,sorttype:'integer', align:"center",searchoptions:{sopt:['eq']}},
			{name:'list',index:'list', width:100,sorttype:'integer', align:"center",searchoptions:{sopt:['eq']}},
			{name:'isp',index:'isp', width:75,sorttype:'string', align:"center",searchoptions:{sopt:['eq']}},
			{name:'total',index:'total',width:75,sorttype:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
			{name:'del',index:'del',width:75,sorttype:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
			{name:'bounce',index:'bounce',width:75,sorttype:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
			{name:'hb',index:'hb',width:75,sorttype:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
			{name:'sb',index:'sb',width:75,sortable:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
			{name:'def',index:'def',width:75,sorttype:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
			{name:'imps',index:'imps',width:75,sorttype:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
			{name:'clk',index:'clk',width:75,sortable:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
			{name:'rev',index:'rev',width:75,sorttype:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
			{name:'ecpm',index:'ecpm',width:75,sorttype:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
			{name:'epc',index:'epc',width:75,sorttype:'integer',search:false,align:"center",searchoptions:{sopt:['eq']}},
		],
		rowNum:20,
		rowList:[20,50,100,200],
		pager:'#Pager',
		scrollerbar:true,
		// sortable: true,
		sortname: 'total',
		sortorder: 'desc',
		height:'459',
		width:'1300',
		// scrollOffset:0,
		viewrecords: true,
		rownumbers:false,
		autoencode :true,
		gridview:true,
		footerrow: true,
		userDataOnFooter: true,
		multiselect: false,
		// loadtext:'',
		emptyrecords: 'Nothing to display',
		/*beforeSelectRow: function() {
		// return false;
		}*/
		/*gridComplete: function() {

		$('.nyroModal').nyroModal();

		}*/
		groupingView : {
		groupField : ['name'],
		groupColumnShow : [true],
		groupText : ['<b>{0}</b>'],
		groupCollapse : false,
		groupOrder: ['asc'],
		groupSummary : [true],
		showSummaryOnHide: true,
		groupDataSorted : true },
	})
	.jqGrid('filterToolbar' ,{searchOnEnter : true})
	.jqGrid('navGrid','#Pager',{
		excel:true,
		edit:false,
		add:false,
		del:false,
		//view:true,
		search:false,
	})
	.jqGrid('navButtonAdd','#Pager',{
		caption: "",
		title: "Export to Excel",
		buttonicon:'ui-icon ui-icon-extlink',
		onClickButton : function () {
			ExportDataToExcel("Grid","global_data.php?getData=excel&dates="+d);
		}
	});
}

