<?php 
    include ('./header_admin.php');
    include ('./backend/manage_setting.php');
?>
<style>
    
    /************************************************** select option style ****************************************************/
    select#soflow, select#soflow-color {
        -webkit-appearance: button;
        -webkit-border-radius: 2px;
        -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
        -webkit-padding-end: 20px;
        -webkit-padding-start: 2px;
        -webkit-user-select: none;
        background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
        background-position: 97% center;
        background-repeat: no-repeat;
        border: 1px solid #AAA;
        color: #555;
        font-size: inherit;
        overflow: hidden;
        padding: 5px 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 340px;
    }
    /*************************************************** select option style ****************************************************/
    
    /**************************************************** input text style ****************************************************/
    .login {
	background: #eceeee;
	border: 1px solid #42464b;
	border-radius: 6px;
	height: 500px;
	margin: 20px auto 0;
	width: 700px;
    }
    
    input[type="text"] {
	background: url('http://i.minus.com/ibhqW9Buanohx2.png') center left no-repeat, linear-gradient(top, #d6d7d7, #dee0e0);
	border: 1px solid #a1a3a3;
	border-radius: 4px;
	box-shadow: 0 1px #fff;
	box-sizing: border-box;
	color: #696969;
	height: 35px;
	margin: 31px 36px 0 29px;
	padding-left: 37px;
        transition: box-shadow 0.3s;
        width: 340px;
    }
    
    
    /**************************************************** input text style ****************************************************/
    
    
    /***************************************************** paragraph style ******************************************************/
    .alignleft {
	float: left;
    }
    .alignright {
        float: right;
    }
    /***************************************************** paragraph style ******************************************************/
    
    /******************************************************* date style ********************************************************/
    
    ::-webkit-inner-spin-button { 
        display:none;
    }
    ::-webkit-calendar-picker-indicator { background-color:white}
    input[type=date]{
        font-size:20px;
    }
    ::-webkit-datetime-edit-text { color:#555555}
    ::-webkit-datetime-edit-month-field { color:#555555 }
    ::-webkit-datetime-edit-day-field { color: #555555; }
    ::-webkit-datetime-edit-year-field { color:#555555; }
    ::-webkit-calendar-picker-indicator{ 
        background-image: url(http://icons.iconarchive.com/icons/dakirby309/simply-styled/256/Calendar-icon.png);
        background-position:center;
        background-size:20px 20px;
        background-repeat:no-repeat;
        color:rgba(204,204,204,0);
    }
    
    /******************************************************* date style ********************************************************/
    
    /*************************************************** submit button style ****************************************************/
    input[type="submit"] {
	width:340px;
	height:45px;
	display:block;
	font-family:Arial, "Helvetica", sans-serif;
	font-size:16px;
	font-weight:bold;
	color:#fff;
	text-decoration:none;
	text-transform:uppercase;
	text-align:center;
	text-shadow:1px 1px 0px #37a69b;
	padding-top:6px;
	margin: 40px 35px 0 29px;
	position:relative;
	cursor:pointer;
	border: none;  
	background-color: #37a69b;
	background-image: linear-gradient(top,#3db0a6,#3111);
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius:5px;
	box-shadow: inset 0px 1px 0px #2ab7ec, 0px 5px 0px 0px #497a78, 0px 10px 5px #999;
    }

    .shadow {
	background: #000;
	border-radius: 12px 12px 4px 4px;
	box-shadow: 0 0 20px 10px #000;
	height: 12px;
	margin: 30px auto;
	opacity: 0.2;
	width: 270px;
    }

    input[type="submit"]:active {
	top:3px;
	box-shadow: inset 0px 1px 0px #2ab7ec, 0px 2px 0px 0px #31524d, 0px 5px 3px #999;
    }
    /*************************************************** submit button style ****************************************************/
    
</style>
<body>
    <br>
    <center>       
        <div class="login">
            <br>
            <form action="manage_setting.php" method="post">
                <p style="font-size:40px; color:#a7a7a9;"><strong>Manage Settings</strong></p>                    
                <select name="open" id="soflow" style="margin-top:30px;" required="true">
                    <option hidden="true" value="">Open Time</option>
                    <option value="06:00:00">6.00 am</option>
                    <option value="07:00:00">7.00 am</option>
                    <option value="08:00:00">8.00 am</option>
                    <option value="09:00:00">9.00 am</option>
                    <option value="10:00:00">10.00 am</option>
                    <option value="11:00:00">11.00 am</option>
                    <option value="12:00:00">12.00 pm</option>
                    <option value="13:00:00">1.00 pm</option>
                    <option value="14:00:00">2.00 pm</option>
                    <option value="15:00:00">3.00 pm</option>
                    <option value="16:00:00">4.00 pm</option>
                    <option value="17:00:00">5.00 pm</option>
                    <option value="18:00:00">6.00 pm</option>
                </select>
                <br>
                <br>
                <br>
                <select name="close" id="soflow" required="true">
                    <option hidden="true" value="">Close Time</option>
                    <option value="06:00:00">6.00 am</option>
                    <option value="07:00:00">7.00 am</option>
                    <option value="08:00:00">8.00 am</option>
                    <option value="09:00:00">9.00 am</option>
                    <option value="10:00:00">10.00 am</option>
                    <option value="11:00:00">11.00 am</option>
                    <option value="12:00:00">12.00 pm</option>
                    <option value="13:00:00">1.00 pm</option>
                    <option value="14:00:00">2.00 pm</option>
                    <option value="15:00:00">3.00 pm</option>
                    <option value="16:00:00">4.00 pm</option>
                    <option value="17:00:00">5.00 pm</option>
                    <option value="18:00:00">6.00 pm</option>
                </select>
                <br>
                <br>
                <br>
                <p>Close Date : 
                <input type="date" id="meeting" name="close_date" required></p>
                <input type="text" placeholder="Number of Respondents" name="num" id="num" required="">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </center>
</body> 
