<h2><span style="
    text-align: center;
    color: white;
    text-shadow: 0 0 10px #ac00ff;
    margin-left: 235px;
">Change Euro</span></h2>
<div class="login-passes">
<span><i class="fa fa-warning"></i><b>Select the amount and click exchange.</b></span>
										</div>
                                                                    <div class="the-form">
	<form action="webcash.php" method="POST">
<table class="mcenter" style="
    margin-left: 34px;
">
                            <tr>
<th colspan="2" style="
    color: white;
">
                                <div class="clear10"></div>
                                Exchange EUR
                                <div class="clear10"></div>
                                </th>
                            </tr>
                            <tr>
								<center><div class="text1"></div></center>
								<td colspan="2">
                                <center><div class="text1" style="
    color: aliceblue;
">Select Amount to Change.</div></center>                                  
                                </td>
                            </tr>
                            <tr>
                                <td>
                                 
                                </td>
                                <td>
									<select name="WebCash" class="select-opt">									
					<option class="select-opt" value="10">10000 Point - €10,00 EUR</option>
					<option class="select-opt" value="20">25000 Point - €20,00 EUR</option>
					<option class="select-opt" value="40">80000 Point - €40,00 EUR</option>
					<option class="select-opt" value="60">120000 Point - €60,00 EUR</option>
					<option class="select-opt" value="80">210000 Point - €80,00 EUR</option>
					<option class="select-opt" value="100">300000 Point - €100,00 EUR</option>						
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><div class="clear10"></div></td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                <div class="clear10"><input type="hidden" name="url" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" /></div>
<input type="submit" value="Exchange" style="
    margin-left: 64px;
">
								
                                </th>
                            </tr>
                        </table>
                        </form>                                                              
								</div>
<a href="#my_acinfo" class="defbutton disabled red" onclick="char_edit()"><i class="fa fa-times"></i>Exit</a>