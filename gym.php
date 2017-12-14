<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<!--css样式-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/bootstrap-editable.css" rel="stylesheet">
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


<div class="bootstrap-table"><div class="fixed-table-toolbar"><div class="bs-bars pull-left"></div></div><div class="fixed-table-container" style="padding-bottom: 0px;"><div class="fixed-table-header" style="display: none;"><table></table></div><div class="fixed-table-body"><div class="fixed-table-loading" style="top: 83px; display: none;">正在努力地加载数据中，请稍候……</div><table id="tradeList" data-classes="table table-hover table-bordered" class="table table-hover table-bordered table-striped">

<thead><tr><th style="text-align: center; " colspan="6" tabindex="0"><div class="th-inner ">timetables</div><div class="fht-cell"></div></th></tr><tr><th style="" data-field="time" tabindex="0"><div class="th-inner "> </div><div class="fht-cell"></div></th><th style="text-align: center; " data-field="mon" tabindex="0"><div class="th-inner ">Monday</div><div class="fht-cell"></div></th><th style="text-align: center; " data-field="tue" tabindex="0"><div class="th-inner ">Tuesday</div><div class="fht-cell"></div></th><th style="text-align: center; " data-field="wed" tabindex="0"><div class="th-inner ">Wednesday</div><div class="fht-cell"></div></th><th style="text-align: center; " data-field="thu" tabindex="0"><div class="th-inner ">Thursday</div><div class="fht-cell"></div></th><th style="text-align: center; " data-field="fri" tabindex="0"><div class="th-inner ">Friday</div><div class="fht-cell"></div></th></tr></thead><tbody><tr data-index="0"><td style="">9:00</td><td style="text-align: center; ">Boot Camp(2)</td><td style="text-align: center; ">Boot Camp(2)</td><td style="text-align: center; ">Boot Camp(2)</td><td style="text-align: center; "> </td><td style="text-align: center; "> </td></tr><tr data-index="1"><td style="">10:00</td><td style="text-align: center; "> </td><td style="text-align: center; "> </td><td style="text-align: center; "> </td><td style="text-align: center; ">Boxercise(4)</td><td style="text-align: center; ">Boxercise(4)</td></tr><tr data-index="2"><td style="">11:00</td><td style="text-align: center; ">Pilates(3)</td><td style="text-align: center; "> </td><td style="text-align: center; ">Pilates(3)</td><td style="text-align: center; "> </td><td style="text-align: center; "> </td></tr><tr data-index="3"><td style="">13:00</td><td style="text-align: center; "> </td><td style="text-align: center; ">Yoga(2)</td><td style="text-align: center; ">Yoga(2)</td><td style="text-align: center; "> </td><td style="text-align: center; "> </td></tr><tr data-index="4"><td style="">14:00</td><td style="text-align: center; "> </td><td style="text-align: center; "> </td><td style="text-align: center; "> </td><td style="text-align: center; "> </td><td style="text-align: center; ">Zumba(2)</td></tr></tbody></table></div><div class="fixed-table-footer" style="display: none;"><table><tbody><tr></tr></tbody></table></div><div class="fixed-table-pagination" style="display: none;"></div></div></div>
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
