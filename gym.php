<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<!--css样式-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/bootstrap-editable.css" rel="stylesheet">
<!--js-->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
<script src="js/bootstrap-table-zh-CN.js"></script>
<script src="js/bootstrap-editable.js"></script>
<script src="js/bootstrap-table-editable.js"></script>
<style>
.table-bordered th,  
  .table-bordered td {  
    border: 1px solid #000 !important;  
  }  

body,form,div,label{margin:0;padding:0;}
label{width:160px;}
#container{width:60%;height:auto;background-color:#00FF7F;
margin:0 auto;
}

</style>
</head>
<body>

<table id="tradeList" data-classes="table table-hover table-bordered">

</table>

<div id="container">
<form>


<fieldset>
    <legend align="center">book class</legend>
	<label for="course">Class</label>
		<select style="width:300px;" id="course" name="course">
		<option>Boot Camp</option>
		<option>Boxercise</option>
		<option>Pilates</option>
		<option>Yoga</option>
		<option>Zumba</option>
		</select>
		<br />
		<label for="time_">Times</label>
		<select id="time_" style="width:300px;">
		<option>Monday, 9:00; Tuesday, 9:00; Wednesday, 9:00</option>
		<option>Thursday, 10:00; Friday, 10:00</option>
		<option>Monday, 11:00; Wednesday, 11:00; Friday, 11:00</option>
		<option>Tuesday, 13:00; Wednesday, 13:00</option>
		<option>Friday, 14:00</option>
			</select><br />
    <label for="yourname">Your name</label>
	<input id="yourname" style="width:300px;" type="text" placeholder="Your name" /><br />
	<label for="phone">phone/mobile number</label>
	<input id="phone" style="width:300px;" type="text" placeholder="phone/mobile number" /><br />
	<input id="submit_" type="submit" style="width:100px;height:35px;" placeholder="phone/mobile number" value="submit" />

</fieldset>


</form>
</div>


</body>
</html>
<script>

$('#tradeList').bootstrapTable({
	url: 'course.json',		//后台文件
	contentType: "application/x-www-form-urlencoded",   //前端发送到后台时采用编码类型
	dataType: "json",     //预期返回的文件格式
	striped: true,    //表格隔行变色
	method: 'post',			//请求方式（*）
	toolbar: '#toolbar',	//工具按钮用哪个容器
	striped: true,	//是否显示行间隔色
	cache: false,	//是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
	pagination: false,	//是否显示分页（*）
	sortable: true,	//是否启用排序
	sortOrder: "desc",	//排序方式
	//queryParams:{"fang":"chao","qu":"ni"},//传递参数（*）
	sidePagination: "client",	//分页方式：client客户端分页，server服务端分页（*）
	pageNumber: 1,	//初始化加载第一页，默认第一页
	//pageSize: 25,	//每页的记录行数（*）
	//pageList: [10, 25, 50, 100],
	//可供选择的每页的行数（*）
	search: false,	//是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
	strictSearch: false,//false 模糊搜索  true全匹配
	showColumns: false,	//是否显示所有的列
	showRefresh: false,	//是否显示刷新按钮
	//minimumCountColumns: 2,	//最少允许的列数
	clickToSelect: true,	//是否启用点击选中行
	//height: 900,	//行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
	uniqueId: "t_id",	//每一行的唯一标识，一般为主键列
	showToggle: false,	//是否显示详细视图和列表视图的切换按钮
	cardView: false,	//是否显示详细视图
	detailView: false,	//是否显示父子表
	undefinedText:'',
	//sortName:"t_name",  //返回的数据该列排序,排序方式由sortOrder决定
	//editable:true,//开启编辑模式 
	//silentSort:false,
	onEditableSave: function(field, row, oldValue, $el) {
	//console.log(row);return false;
	//Fired when an editable cell is saved.
		$('#tradeList').bootstrapTable("resetView");
		//console.log(row);return false;
 		$.ajax({
			type: "post",
			url: "",
			data: row,
			dataType: 'text',
			success: function (data, status) {
				//console.log(data);
				alert(data);
				$('#tradeList').bootstrapTable('refresh',{silent: true});
			}//success
			,error: function () {
				alert('编辑失败');
				$('#tradeList').bootstrapTable('refresh',{silent: true});
			}
			,complete: function (XMLHttpRequest, textStatus){
				//console.log(textStatus);
				//if(textStatus == 'success' )
			}
		});
	},//onEditableSave
	onEditableShown:function(field, row, $el, editable){
	//Fired when an editable cell is opened for edits.
		return false;
	},//onEditableShown
	onEditableHidden: function(field, row, $el, reason) {
	//Fired when an editable cell is hidden / closed.
		return false;
    },//onEditableHidden
	onEditableInit: function() {
	//Fired when all columns was initialized by $().editable() method.
		return false;
    },//onEditableInit
 	columns:[
	[
	{
		"title":'timetables',
		"colspan":6,
		"align":'center'
	}
	],
	[
	{
			field: 'time',
			title: ' ',
			//sortable:true       //排序
			//align:"center"
		
	},

	
		{
			field: 'mon',
			title: 'Monday',
			align:'center'
		},
		{
			field: 'tue',
			title: 'Tuesday',
			//class: 'pf',
			sortable:false,
			align:'center'
		},
		{
			field: 'wed',
			title: 'Wednesday',
			//class: 'pf',
			sortable:false,
			align:'center'
		},
		{
			field: 'thu',
			title: 'Thursday',
			//class: 'pf',
			sortable:false,
			align:'center'
		},
		{
			field: 'fri',
			title: 'Friday',
			//class: 'pf',
			sortable:false,
			align:'center'
		}
		]
		]
	
});

</script>
