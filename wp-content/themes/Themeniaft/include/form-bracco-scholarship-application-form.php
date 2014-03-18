
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#regform').validate({
            rules: {
                question1: {required: true},
                firstName: {required: true},
                lastName: {required: true},
                gender: {required: true},
                address: {required: true},
                city: {required: true},
                state: {required: true},
                zipCode: {required: true},
                phoneNumber: {required: true},
                email: {required: true},
                confirmEmail: {required: true},
                month1: {required: true},
                day1: {required: true},
                year1: {required: true},
                placeBirth: {required: true},
                parentGuardanName: {required: true},
                parentAddress: {required: true},
                parentCity: {required: true},
                parentState: {required: true},
                parentZipCode: {required: true},
                parentPhone: {required: true},
                fatherItalian: {required: true},
                motherItalian: {required: true},
                'regions[]': {required: true},
                academicNameSchool: {required: true},
                academicState: {required: true},
                major: {required: true},
                degreeQualifications: {required: true},
                yearGraduation: {required: true},
                overall: {required: true},
                participateNiafPrograms: {required: true},
                describeKeyAspects: {required: true}
            }
        });
    });
</script>
<form id="regform" action="" method="post">

    <div class="row-input">
        <div class="biginput">
            <span class="red">*</span> How did you hear about the NIAF/Bracco Foundation Scholarship? 
            <input type="text" name="question1" >
        </div>
        <a href="form-golf_reg.php"></a>
    </div> 
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span> First Name:<br>
            <input type="text" name="firstName">
        </div>
        <div class="midinput">
            Middle Name:<br>
            <input type="text" name="middleName">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>Last Name:<br>
            <input type="text" name="lastName">
        </div>
        <div class="midinput">
            <span class="red">*</span>Gender:<br>
            <select name="gender">
                <option value="">SELECT</option>	
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>Address:<br>
            <input type="text" name="address">
        </div>
        <div class="midinput">   
            <br>
            <input type="text" name="address1">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>City:<br>
            <input type="text" name="city">
        </div>
        <div class="midinput">            
            <span class="red">*</span>State Abbreviation:<br>
            <input maxlength="2" size="2" name="state">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>Zip Code:<br>
            <input type="text" name="zipCode">
        </div>
        <div class="midinput">            
            <span class="red">*</span>Phone Number:<br>
            <input value="" name="phoneNumber">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span> E-mail Address:<br>
            <input type="text" name="email">
        </div>
        <div class="midinput">            
            <span class="red">*</span>Confirm E-mail Address:<br>
            <input type="text" name="confirmEmail">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <span class="red">*</span>Date of Birth:
            <select name="month1">
                <option value="">MONTH</option>	
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>																																								
            </select>
            <select name="day1">
                <option value="">DAY</option>	
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>																																																								
            </select>
            <select name="year1">
                <option value="">YEAR</option>			
                <option value="1994">1996</option>		
                <option value="1994">1995</option>		
                <option value="1994">1994</option>		
                <option value="1993">1993</option>						
                <option value="1992">1992</option>										
                <option value="1991">1991</option>																
                <option value="1990">1990</option>		
                <option value="1989">1989</option>		
                <option value="1988">1988</option>		
                <option value="1987">1987</option>		
                <option value="1986">1986</option>		
                <option value="1985">1985</option>		
                <option value="1984">1984</option>		
                <option value="1983">1983</option>		
                <option value="1982">1982</option>		
                <option value="1981">1981</option>		
                <option value="1980">1980</option>		
                <option value="1979">1979</option>		
                <option value="1978">1978</option>		                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                						
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>Place of Birth:<br>
            <input type="text" name="placeBirth">
        </div>    
    </div>
    <div class="row-input">
        <div class="biginput">
            Parent/Guardian Information:<br>             
        </div>    
    </div>
    <div class="row-input">
        <div class="bigbiginput">
            <span class="red">*</span>Parent/Guardian Name:<br>
            <input type="text" name="parentGuardanName">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>Address:<br>
            <input type="text" name="parentAddress">
        </div>      
        <div class="midinput"> 
            <br>
            <input type="text" name="parentAddress1">
        </div>      
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>City:<br>
            <input type="text" name="parentCity">
        </div>
        <div class="midinput">            
            <span class="red">*</span>State Abbreviation:<br>
            <input maxlength="2" size="2" name="parentState">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>Zip Code:<br>
            <input type="text" name="parentZipCode">
        </div>
        <div class="midinput">            
            <span class="red">*</span>Phone:<br>
            <input value="" name="parentPhone">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span> Father of Italian Descent?<br>
            <select size="1" name="fatherItalian">
                <option value="">SELECT</option>	
                <option value="Yes">Yes</option>
                <option value="No">No</option>																																								
            </select>
        </div>
        <div class="midinput">   
            <span class="red">*</span> Mother of Italian Descent?<br>
            <select size="1" value="Select" name="motherItalian">
                <option value="">SELECT</option>	
                <option value="Yes">Yes</option>
                <option value="No">No</option>																																								
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span> Select the region(s) where your ancestors are from. (To select multiple regions, press the Cntrl key as you click the regions)<br>
            <select size="10" name="regions[]" multiple="">	
                <option value="Abruzzo">Abruzzo</option>
                <option value="Aosta Valley">Aosta Valley</option>
                <option value="Basilicata">Basilicata</option>
                <option value="Calabria">Calabria</option>
                <option value="Campania">Campania</option>
                <option value="Emilia-Romagna">Emilia-Romagna</option>
                <option value="Friuli-Venezia Giulia">Friuli-Venezia Giulia</option>
                <option value="Lazio">Lazio</option>
                <option value="Liguria">Liguria</option>
                <option value="Lombardy">Lombardy</option>
                <option value="Marche">Marche</option>
                <option value="Molise">Molise</option>
                <option value="Piedmont">Piedmont</option>
                <option value="Puglia">Puglia</option>								
                <option value="Sardinia">Sardinia</option>
                <option value="Sicily">Sicily</option>
                <option value="Trentino-South Tyrol">Trentino-South Tyrol</option>
                <option value="Tuscany">Tuscany</option>
                <option value="Umbria">Umbria</option>
                <option value="Veneto">Veneto</option>
                <option value="Unknown">Unknown</option>																																																																																																																								
            </select>
        </div>
        <div class="midinput">   
            (Optional) Enter more specific information (cities, etc...)<br>
            <input value="" name="specificInformation">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            Academic Information:<br>             
        </div>    
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>Name of school:<br>
            <input type="" name="academicNameSchool">
        </div>
        <div class="midinput">   
            <span class="red">*</span>State abbreviation of school:<br>
            <input value="" maxlength="2" size="2" name="academicState">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>Major:<br>
            <input type="" name="major">
        </div>
        <div class="midinput">   
            <span class="red">*</span>Degree/Qualifications (PhD/MD/MSc):<br>
            <input type="text" name="degreeQualifications">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>Year of Graduation:<br>
            <input value="" maxlength="4" size="4" name="yearGraduation">
        </div>
        <div class="midinput">   
            <span class="red">*</span>Overall GPA:<br>
            <input type="text" maxlength="5" size="5" name="overall">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="red">*</span>Have you participated in any NIAF programs or activities in the past, including winning a NIAF scholarship?<br>
            <select size="1" value="Select" name="participateNiafPrograms">
                <option value="">SELECT</option>	
                <option value="Yes">Yes</option>
                <option value="No">No</option>																																								
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">   
            If yes, list the program(s) and year(s).<br>
            <input type="text" name="participateNiafProgramsWhen">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            Essay Question:<br>             
        </div>    
    </div>
    <div class="row-input">
        <div class="biginput">
            <span class="red">*</span>Describe key aspects of your original scientific research. (No less than 650 words) <br>
            <textarea  name="describeKeyAspects"></textarea>
        </div>     
    </div>
    <div class="row-input">
        <input type="submit" value="SUBMIT" name="submit">
        <button id="reset">RESET</button>
    </div>

</form>