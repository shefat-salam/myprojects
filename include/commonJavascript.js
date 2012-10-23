

// Function to confirm form submission
// Author : Nilesh Dosooye
// pass message to popup to function and it will send true or false depending on user choice
// call it with onSubmit on a form

function userConfirmationAlert(message)
{

	 var whatToReturn = true;
     if (!confirm(message)) 
	 {
	   whatToReturn = false;
	 }
	 return (whatToReturn);
}


// Functions to Check and Uncheck all CheckBoxes
// Author : Nilesh Dosooye
// Usage : <input type=button name="CheckAll"   value="Check All" onClick="checkAll(document.myform.list)">
//         <input type=button name="UnCheckAll" value="Uncheck All" onClick="uncheckAll(document.myform.list)">

function checkAll(field)
{
        for (i = 0; i < field.length; i++)
        field[i].checked = true ;
}

function uncheckAll(field)
{
        for (i = 0; i < field.length; i++)
        field[i].checked = false ;
}

// Function to open a Modal Window
// Author : Nilesh Dosooye
// Users can specify all parameters needed as hidden variables
// e.g
//<input type=hidden name="toolbar" value="0">
//<input type=hidden name="location" value="0">
//<input type=hidden name="directories" value="0">
//<input type=hidden name="status" value="0">
//<input type=hidden name="menubar" value="0">
//<input type=hidden name="scrollbars" value="0">
//<input type=hidden name="resizable" value="0">
//<input type=hidden name="width" value="800">
//<input type=hidden name="height" value="800">
// <input type=hidden name="url" value="http://nilesh.dosooye.com/">

function openNewModalWindow(form1) {    

var address = form1.url.value;   
var option = "toolbar=" + form1.toolbar.value +",location=" + form1.location.value +",directories=" + form1.directories.value +",status=" + form1.status.value +",menubar="+ form1.menubar.value +",scrollbars=" + form1.scrollbars.value  +",resizable=" + form1.resizable.value +",width="+ form1.width.value +",height=" + form1.height.value;
var win4 = window.open(address, form1.windowName.value,option);
}


function openNewModalWindowAndCloseParent(form1,window1) {    

var address = form1.url.value;   
var option = "toolbar=" + form1.toolbar.value +",location=" + form1.location.value +",directories=" + form1.directories.value +",status=" + form1.status.value +",menubar="+ form1.menubar.value +",scrollbars=" + form1.scrollbars.value  +",resizable=" + form1.resizable.value +",width="+ form1.width.value +",height=" + form1.height.value;
var win4 = window.open(address, form1.windowName.value,option);

if (window1.name!="mainWindow")
{
   window1.close();
}
}