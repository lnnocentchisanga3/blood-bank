<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / Donors / Add a Donor</h4>
</div>
</div>
<div class="card-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="my-4 text-uppercase">Entering The Details of The Blood Donor</h3>
                
            </div>
            <div class="col-lg-12 my-4">
                <?php
                if ($userdata['user_role'] == 'admin') {
                    ?>
                <a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">
                    <button class="btn btn-primary submit-btn"><i class="fa fa-home"></i> Go To Home</button>
                </a>
                    <?php

                } elseif ($userdata['user_role'] == 'donor_data_clerk') {
                    ?>
                <a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">
                    <button class="btn btn-primary submit-btn"><i class="fa fa-home"></i> Go To Home</button>
                </a>
                    <?php
                }else{
                    ?>
                <a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">
                    <button class="btn btn-primary submit-btn"><i class="fa fa-home"></i> Go To Home</button>
                </a>
                    <?php
                }
                
                ?>

                 <a class="btn btn-success submit-btn" href="<?=base_url()?>/listdonors/<?=$userdata['hospital_id']?>"><i class="fa fa-plus"></i> List Donors</a>

            </div>

            <?php if (session()->getTempdata('Success')): ?>
                <div class="alert alert-success col-md-12">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>Success!</strong> <?=session()->getTempdata('Success');?>
                </div>
              <?php endif ?>

            

        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-5">
                <form method="POST" action="<?=base_url()?>/adddonors/oneAdddonor/<?=$userdata['hospital_id']?>">

                    <input type="text" name="province" value="<?=$userdata['province_id']?>" hidden>
                    <input type="text" name="district" value="<?=$userdata['district_id']?>" hidden>

                    <div class="row">
                        <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donor's Information</h4>

                        <?php if ($site_id == null || $site_id == " "): ?>
                            <div class="col-sm-6">
                            <div class="form-group">
                            <label>Donation Site of a Donor</label>
                            <?php if ($sites == null): ?>
                                    <li><a href="#!"><i class="fa fa-map"></i> -No Donation Sites Found</a></li>
                            <?php else: ?>
                            <select class="form-control" name="site" <?=set_value('sod')?>>
                                <option value="0">None</option>
                                <?php foreach ($sites as $row): ?>
                                   <option value="<?=$row['site_id']?>"><?=$row['donation_site_name']?></option>
                                <?php endforeach ?>
                            </select>
                           <?php endif ?>
                        </div>
                        </div>
                            <?php else: ?>
                            <input type="text" name="site" value="<?=$site_id?>" class="form-control" hidden>
                        <?php endif ?>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" class="form-control" placeholder="Firstname" name="fname" <?=set_value('fnames')?>required >
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>MiddleName [Optional]</label>
                            <input type="text" class="form-control" placeholder="Middle name (Optional)" name="mname" <?=set_value('mnames')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>LastName</label>
                            <input type="text" class="form-control" placeholder="Lastname" name="lname" <?=set_value('lnames')?>required >
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Marital Status</label>
                            <select class="form-control" name="marital" required>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            </select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Nationality</label>
                             <select id="country" name="nation" class="form-control" <?=set_value('nation')?>>
                             <option>Select your country of origin</option>
                             <option value="Afganistan">Afghanistan</option>
                             <option value="Albania">Albania</option>
                             <option value="Algeria">Algeria</option>
                             <option value="American Samoa">American Samoa</option>
                             <option value="Andorra">Andorra</option>
                             <option value="Angola">Angola</option>
                             <option value="Anguilla">Anguilla</option>
                             <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                             <option value="Argentina">Argentina</option>
                             <option value="Armenia">Armenia</option>
                             <option value="Aruba">Aruba</option>
                             <option value="Australia">Australia</option>
                             <option value="Austria">Austria</option>
                             <option value="Azerbaijan">Azerbaijan</option>
                             <option value="Bahamas">Bahamas</option>
                             <option value="Bahrain">Bahrain</option>
                             <option value="Bangladesh">Bangladesh</option>
                             <option value="Barbados">Barbados</option>
                             <option value="Belarus">Belarus</option>
                             <option value="Belgium">Belgium</option>
                             <option value="Belize">Belize</option>
                             <option value="Benin">Benin</option>
                             <option value="Bermuda">Bermuda</option>
                             <option value="Bhutan">Bhutan</option>
                             <option value="Bolivia">Bolivia</option>
                             <option value="Bonaire">Bonaire</option>
                             <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                             <option value="Botswana">Botswana</option>
                             <option value="Brazil">Brazil</option>
                             <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                             <option value="Brunei">Brunei</option>
                             <option value="Bulgaria">Bulgaria</option>
                             <option value="Burkina Faso">Burkina Faso</option>
                             <option value="Burundi">Burundi</option>
                             <option value="Cambodia">Cambodia</option>
                             <option value="Cameroon">Cameroon</option>
                             <option value="Canada">Canada</option>
                             <option value="Canary Islands">Canary Islands</option>
                             <option value="Cape Verde">Cape Verde</option>
                             <option value="Cayman Islands">Cayman Islands</option>
                             <option value="Central African Republic">Central African Republic</option>
                             <option value="Chad">Chad</option>
                             <option value="Channel Islands">Channel Islands</option>
                             <option value="Chile">Chile</option>
                             <option value="China">China</option>
                             <option value="Christmas Island">Christmas Island</option>
                             <option value="Cocos Island">Cocos Island</option>
                             <option value="Colombia">Colombia</option>
                             <option value="Comoros">Comoros</option>
                             <option value="Congo">Congo</option>
                             <option value="Congo DRC">Congo DRC</option>
                             <option value="Cook Islands">Cook Islands</option>
                             <option value="Costa Rica">Costa Rica</option>
                             <option value="Cote DIvoire">Cote DIvoire</option>
                             <option value="Croatia">Croatia</option>
                             <option value="Cuba">Cuba</option>
                             <option value="Curaco">Curacao</option>
                             <option value="Cyprus">Cyprus</option>
                             <option value="Czech Republic">Czech Republic</option>
                             <option value="Denmark">Denmark</option>
                             <option value="Djibouti">Djibouti</option>
                             <option value="Dominica">Dominica</option>
                             <option value="Dominican Republic">Dominican Republic</option>
                             <option value="East Timor">East Timor</option>
                             <option value="Ecuador">Ecuador</option>
                             <option value="Egypt">Egypt</option>
                             <option value="El Salvador">El Salvador</option>
                             <option value="Equatorial Guinea">Equatorial Guinea</option>
                             <option value="Eritrea">Eritrea</option>
                             <option value="Estonia">Estonia</option>
                             <option value="Ethiopia">Ethiopia</option>
                             <option value="Falkland Islands">Falkland Islands</option>
                             <option value="Faroe Islands">Faroe Islands</option>
                             <option value="Fiji">Fiji</option>
                             <option value="Finland">Finland</option>
                             <option value="France">France</option>
                             <option value="French Guiana">French Guiana</option>
                             <option value="French Polynesia">French Polynesia</option>
                             <option value="French Southern Ter">French Southern Ter</option>
                             <option value="Gabon">Gabon</option>
                             <option value="Gambia">Gambia</option>
                             <option value="Georgia">Georgia</option>
                             <option value="Germany">Germany</option>
                             <option value="Ghana">Ghana</option>
                             <option value="Gibraltar">Gibraltar</option>
                             <option value="Great Britain">Great Britain</option>
                             <option value="Greece">Greece</option>
                             <option value="Greenland">Greenland</option>
                             <option value="Grenada">Grenada</option>
                             <option value="Guadeloupe">Guadeloupe</option>
                             <option value="Guam">Guam</option>
                             <option value="Guatemala">Guatemala</option>
                             <option value="Guinea">Guinea</option>
                             <option value="Guyana">Guyana</option>
                             <option value="Haiti">Haiti</option>
                             <option value="Hawaii">Hawaii</option>
                             <option value="Honduras">Honduras</option>
                             <option value="Hong Kong">Hong Kong</option>
                             <option value="Hungary">Hungary</option>
                             <option value="Iceland">Iceland</option>
                             <option value="Indonesia">Indonesia</option>
                             <option value="India">India</option>
                             <option value="Iran">Iran</option>
                             <option value="Iraq">Iraq</option>
                             <option value="Ireland">Ireland</option>
                             <option value="Isle of Man">Isle of Man</option>
                             <option value="Israel">Israel</option>
                             <option value="Italy">Italy</option>
                             <option value="Jamaica">Jamaica</option>
                             <option value="Japan">Japan</option>
                             <option value="Jordan">Jordan</option>
                             <option value="Kazakhstan">Kazakhstan</option>
                             <option value="Kenya">Kenya</option>
                             <option value="Kiribati">Kiribati</option>
                             <option value="Korea North">Korea North</option>
                             <option value="Korea Sout">Korea South</option>
                             <option value="Kuwait">Kuwait</option>
                             <option value="Kyrgyzstan">Kyrgyzstan</option>
                             <option value="Laos">Laos</option>
                             <option value="Latvia">Latvia</option>
                             <option value="Lebanon">Lebanon</option>
                             <option value="Lesotho">Lesotho</option>
                             <option value="Liberia">Liberia</option>
                             <option value="Libya">Libya</option>
                             <option value="Liechtenstein">Liechtenstein</option>
                             <option value="Lithuania">Lithuania</option>
                             <option value="Luxembourg">Luxembourg</option>
                             <option value="Macau">Macau</option>
                             <option value="Macedonia">Macedonia</option>
                             <option value="Madagascar">Madagascar</option>
                             <option value="Malaysia">Malaysia</option>
                             <option value="Malawi">Malawi</option>
                             <option value="Maldives">Maldives</option>
                             <option value="Mali">Mali</option>
                             <option value="Malta">Malta</option>
                             <option value="Marshall Islands">Marshall Islands</option>
                             <option value="Martinique">Martinique</option>
                             <option value="Mauritania">Mauritania</option>
                             <option value="Mauritius">Mauritius</option>
                             <option value="Mayotte">Mayotte</option>
                             <option value="Mexico">Mexico</option>
                             <option value="Midway Islands">Midway Islands</option>
                             <option value="Moldova">Moldova</option>
                             <option value="Monaco">Monaco</option>
                             <option value="Mongolia">Mongolia</option>
                             <option value="Montserrat">Montserrat</option>
                             <option value="Morocco">Morocco</option>
                             <option value="Mozambique">Mozambique</option>
                             <option value="Myanmar">Myanmar</option>
                             <option value="Nambia">Nambia</option>
                             <option value="Nauru">Nauru</option>
                             <option value="Nepal">Nepal</option>
                             <option value="Netherland Antilles">Netherland Antilles</option>
                             <option value="Netherlands">Netherlands (Holland, Europe)</option>
                             <option value="Nevis">Nevis</option>
                             <option value="New Caledonia">New Caledonia</option>
                             <option value="New Zealand">New Zealand</option>
                             <option value="Nicaragua">Nicaragua</option>
                             <option value="Niger">Niger</option>
                             <option value="Nigeria">Nigeria</option>
                             <option value="Niue">Niue</option>
                             <option value="Norfolk Island">Norfolk Island</option>
                             <option value="Norway">Norway</option>
                             <option value="Oman">Oman</option>
                             <option value="Pakistan">Pakistan</option>
                             <option value="Palau Island">Palau Island</option>
                             <option value="Palestine">Palestine</option>
                             <option value="Panama">Panama</option>
                             <option value="Papua New Guinea">Papua New Guinea</option>
                             <option value="Paraguay">Paraguay</option>
                             <option value="Peru">Peru</option>
                             <option value="Phillipines">Philippines</option>
                             <option value="Pitcairn Island">Pitcairn Island</option>
                             <option value="Poland">Poland</option>
                             <option value="Portugal">Portugal</option>
                             <option value="Puerto Rico">Puerto Rico</option>
                             <option value="Qatar">Qatar</option>
                             <option value="Republic of Montenegro">Republic of Montenegro</option>
                             <option value="Republic of Serbia">Republic of Serbia</option>
                             <option value="Reunion">Reunion</option>
                             <option value="Romania">Romania</option>
                             <option value="Russia">Russia</option>
                             <option value="Rwanda">Rwanda</option>
                             <option value="St Barthelemy">St Barthelemy</option>
                             <option value="St Eustatius">St Eustatius</option>
                             <option value="St Helena">St Helena</option>
                             <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                             <option value="St Lucia">St Lucia</option>
                             <option value="St Maarten">St Maarten</option>
                             <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                             <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                             <option value="Saipan">Saipan</option>
                             <option value="Samoa">Samoa</option>
                             <option value="Samoa American">Samoa American</option>
                             <option value="San Marino">San Marino</option>
                             <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                             <option value="Saudi Arabia">Saudi Arabia</option>
                             <option value="Senegal">Senegal</option>
                             <option value="Seychelles">Seychelles</option>
                             <option value="Sierra Leone">Sierra Leone</option>
                             <option value="Singapore">Singapore</option>
                             <option value="Slovakia">Slovakia</option>
                             <option value="Slovenia">Slovenia</option>
                             <option value="Solomon Islands">Solomon Islands</option>
                             <option value="Somalia">Somalia</option>
                             <option value="South Africa">South Africa</option>
                             <option value="Spain">Spain</option>
                             <option value="Sri Lanka">Sri Lanka</option>
                             <option value="Sudan">Sudan</option>
                             <option value="Suriname">Suriname</option>
                             <option value="Swaziland">Swaziland</option>
                             <option value="Sweden">Sweden</option>
                             <option value="Switzerland">Switzerland</option>
                             <option value="Syria">Syria</option>
                             <option value="Tahiti">Tahiti</option>
                             <option value="Taiwan">Taiwan</option>
                             <option value="Tajikistan">Tajikistan</option>
                             <option value="Tanzania">Tanzania</option>
                             <option value="Thailand">Thailand</option>
                             <option value="Togo">Togo</option>
                             <option value="Tokelau">Tokelau</option>
                             <option value="Tonga">Tonga</option>
                             <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                             <option value="Tunisia">Tunisia</option>
                             <option value="Turkey">Turkey</option>
                             <option value="Turkmenistan">Turkmenistan</option>
                             <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                             <option value="Tuvalu">Tuvalu</option>
                             <option value="Uganda">Uganda</option>
                             <option value="United Kingdom">United Kingdom</option>
                             <option value="Ukraine">Ukraine</option>
                             <option value="United Arab Erimates">United Arab Emirates</option>
                             <option value="United States of America">United States of America</option>
                             <option value="Uraguay">Uruguay</option>
                             <option value="Uzbekistan">Uzbekistan</option>
                             <option value="Vanuatu">Vanuatu</option>
                             <option value="Vatican City State">Vatican City State</option>
                             <option value="Venezuela">Venezuela</option>
                             <option value="Vietnam">Vietnam</option>
                             <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                             <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                             <option value="Wake Island">Wake Island</option>
                             <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                             <option value="Yemen">Yemen</option>
                             <option value="Zambia" selected>Zambia</option>
                             <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>NRC(National Identity Card) [Optional]</label>
                            <input type="text" class="form-control"  name="nrc" placeholder="NRC(National Identity Card)" <?=set_value('nrc')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control"  name="gender" <?=set_value('gender')?>>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        </div>

                        <div class="alert alert-danger col-md-12" style="display: none;" id="displayJsErrorsBlock">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning !</strong> <span id="displayJsErrors"> working </span>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Date Of Birth</label>
                            <div class="row">

                                <select name="day" class="form-control col-md-4">
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                </select>
                                <select name="month" class="form-control col-md-4">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select name="year" class="form-control col-md-4" onchange="getYearCal(this.value)">
                                    <?php
                                        $x = date('Y');
                                        $y = "1952";
                                        while($x >= $y) {
                                          echo "<option value='$x'>$x</option>";
                                          $x--;
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Occupation</label>
                            <select class="form-control" name="occupation" <?=set_value('occupation')?>>
                                <option>Farmer</option>
                                <option>Civil Servant</option>
                                <option>Self Employed</option>
                                <option>Student</option>
                                <option>Pupil</option>
                            </select>
                        </div>
                        </div>


                        <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donor's Blood Donation Status</h4>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Date Of Last Donation</label>
                            <input type="date" class="form-control" name="doldon" <?=set_value('doldon')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Site Of Donation</label>
                            <?php if ($sites == null): ?>
                                    <li><a href="#!"><i class="fa fa-map"></i> -No Donation Sites Found</a></li>
                            <?php else: ?>
                            <select class="form-control" name="sod" <?=set_value('sod')?>>
                                <option value="0">None</option>
                                <?php foreach ($sites as $row): ?>
                                   <option value="<?=$row['site_id']?>"><?=$row['donation_site_name']?></option>
                                <?php endforeach ?>
                            </select>
                           <?php endif ?>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control" name="group" <?=set_value('group')?>>
                                <option value="0">0</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Number Of Donations</label>
                            <select class="form-control" required name="numofdonation" <?=set_value('numofdonation')?>>
                                <option value="0">0</option>
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
                            </select>
                        </div>
                        </div>

                        <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donor's Contact / Residential Information</h4>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Residential Address</label>
                            <input type="text" class="form-control" required placeholder="Residential Address" name="postaladdress" <?=set_value('ResidentialAddress')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" <?=set_value('email')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" required placeholder="Phone Number" name="phone" <?=set_value('phone')?>>
                        </div>
                        </div>

                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Save Donor Details</button>
                    </div>

                    <p id="demo"></p>

                    <script>
                        function getYearCal(value){
                            var d = new Date();
                            var def = d.getFullYear() - value;

                            if (def <= 12){
                                document.getElementById('displayJsErrorsBlock').style.display = "block";
                                document.getElementById('displayJsErrors').innerHTML = "Years are too low to Donate Blood";
                            }else{
                                document.getElementById('displayJsErrorsBlock').style.display = "none";
                                // document.getElementById('displayJsErrors').innerHTML = "Years are too low to Donate Blood";
                            }
                            
                        }
                    </script>
                </form>
            </div>
        </div>
</div>
</div>
</div>

<?=$this->endSection('content')?>

