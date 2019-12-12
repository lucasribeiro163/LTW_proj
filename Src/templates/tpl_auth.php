<?php 
include_once('../database/db_user.php');

function draw_login() { 

/**
 * Draws the login section.
 */ ?>
  <section id="login">
    
  <header>
      <h1>Welcome to our website</h1>
      <h2>Please log in using your credentials</h2>
  </header>

  <form method="post" action="../actions/action_login.php">
    <input type="text" name="username" placeholder="username" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="submit" value="login">   
  </form>
  <p>Don't have an account?<a href="signup.php">Signup!</a></p>
  </section>

  <section id="someImage">
    <img src ="https://airbnb.design/wp-content/uploads/2018/08/Plus-living.jpg" alt="house">
  </section>
  
<?php } ?>

<?php function draw_signup() { 
/**
 * Draws the signup section.
 */ ?>
  <section id="signup">

    <header>
      <h1>Get ready to start.</h1>
      <h2>Please register so you can start.</h2>
    </header>

    <form method="post" action="../actions/action_signup.php">     
      <input type="email" name="email" placeholder="email" required>
      <input type="text" name="username" placeholder="username" required> 
      <input type="text" name="name" placeholder="name" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="password" name="password1" placeholder="password" required>  
      <select name="country">
        <option value="Other" selected disabled>Home Contry</option>     
        <option value="2">United States of America</option>
        <option value="3">Spain</option>
        <option value="4">France</option>
        <option value="5">United Kingdom</option>
        <option value="6">Italy</option>
        <option value="7">Japan</option>
        <option value="9">Australia</option>
        <option value="10">Finland</option>
        <option value="11">Mali</option>
        <option value="12">Peru</option>
        <option value="13">Chile</option>
        <option value="14">China</option>
        <option value="15">New Zealand</option>
        <option value="16">Turkey</option>
        <option value="17">Brazil</option>
        <option value="18">Argentina</option>
        <option value="19">Afghanistan</option>
        <option value="20">Albania</option>
        <option value="21">Algeria</option>
        <option value="22">American Samoa</option>
        <option value="23">Andorra</option>
        <option value="8">Angola</option>
        <option value="24">Anguilla</option>
        <option value="25">Antarctica</option>
        <option value="26">Antigua and Barbuda</option>
        <option value="27">Armenia</option>
        <option value="28">Aruba</option>
        <option value="29">Austria</option>
        <option value="30">Azerbaijan</option>
        <option value="31">Bahamas</option>
        <option value="32">Bahrain</option>
        <option value="33">Bangladesh</option>
        <option value="34">Barbados</option>
        <option value="35">Belarus</option>
        <option value="36">Belgium</option>
        <option value="37">Belize</option>
        <option value="38">Benin</option>
        <option value="39">Bermuda</option>
        <option value="40">Bhutan</option>
        <option value="41">Bolivia</option>
        <option value="42">Bosnia and Herzegovina</option>
        <option value="43">Botswana</option>
        <option value="44">Bouvet Island</option>
        <option value="45">British Indian Ocean Territory</option>
        <option value="46">Brunei Darussalam</option>
        <option value="47">Bulgaria</option>
        <option value="48">Burkina Faso</option>
        <option value="49">Burundi</option>
        <option value="50">Cambodia</option>
        <option value="52">Cameroon</option>
        <option value="53">Canada</option>
        <option value="54">Cape Verde</option>
        <option value="55">Cayman Islands</option>
        <option value="56">Central African Republic</option>
        <option value="57">Chad</option>
        <option value="58">Christmas Island</option>
        <option value="59">Cocos (Keeling) Islands</option>
        <option value="60">Colombia</option>
        <option value="61">Comoros</option>
        <option value="62">Democratic Republic of the Congo</option>
        <option value="63">Republic of Congo</option>
        <option value="64">Cook Islands</option>
        <option value="65">Costa Rica</option>
        <option value="66">Croatia (Hrvatska)</option>
        <option value="67">Cuba</option>
        <option value="68">Cyprus</option>
        <option value="69">Czech Republic</option>
        <option value="70">Denmark</option>
        <option value="71">Djibouti</option>
        <option value="72">Dominica</option>
        <option value="73">Dominican Republic</option>
        <option value="74">East Timor</option>
        <option value="75">Ecuador</option>
        <option value="76">Egypt</option>
        <option value="77">El Salvador</option>
        <option value="78">Equatorial Guinea</option>
        <option value="79">Eritrea</option>
        <option value="80">Estonia</option>
        <option value="81">Ethiopia</option>
        <option value="82">Falkland Islands (Malvinas)</option>
        <option value="83">Faroe Islands</option>
        <option value="84">Fiji</option>
        <option value="85">France">etropolitan</option>
        <option value="86">French Guiana</option>
        <option value="87">French Polynesia</option>
        <option value="88">French Southern Territories</option>
        <option value="89">Gabon</option>
        <option value="90">Gambia</option>
        <option value="91">Georgia</option>
        <option value="92">Germany</option>
        <option value="93">Ghana</option>
        <option value="94">Gibraltar</option>
        <option value="95">Guernsey</option>
        <option value="96">Greece</option>
        <option value="97">Greenland</option>
        <option value="98">Grenada</option>
        <option value="99">Guadeloupe</option>
        <option value="110">Guam</option>
        <option value="111">Guatemala</option>
        <option value="112">Guinea</option>
        <option value="113">Guinea-Bissau</option>
        <option value="114">Guyana</option>
        <option value="115">Haiti</option>
        <option value="116">Heard and Mc Donald Islands</option>
        <option value="117">Honduras</option>
        <option value="118">Hong Kong</option>
        <option value="119">Hungary</option>
        <option value="120">Iceland</option>
        <option value="121">India</option>
        <option value="122">Isle of Man</option>
        <option value="123">Indonesia</option>
        <option value="124">Iran (Islamic Republic of)</option>
        <option value="125">Iraq</option>
        <option value="126">Ireland</option>
        <option value="127">Israel</option>
        <option value="128">Ivory Coast</option>
        <option value="129">Jersey</option>
        <option value="130">Jamaica</option>
        <option value="131">Jordan</option>
        <option value="132">Kazakhstan</option>
        <option value="133">Kenya</option>
        <option value="134">Kiribati</option>
        <option value="135">Korea, Democratic People''s Republic of</option>
        <option value="136">Korea, Republic of</option>
        <option value="137">Kosovo</option>
        <option value="138">Kuwait</option>
        <option value="139">Kyrgyzstan</option>
        <option value="140">Lao People''s Democratic Republic</option>
        <option value="141">Latvia</option>
        <option value="142">Lebanon</option>
        <option value="143">Lesotho</option>
        <option value="144">Liberia</option>
        <option value="145">Libyan Arab Jamahiriya</option>
        <option value="146">Liechtenstein</option>
        <option value="147">Lithuania</option>
        <option value="148">Luxembourg</option>
        <option value="149">Macau</option>
        <option value="150">North Macedonia</option>
        <option value="151">Madagascar</option>
        <option value="152">Malawi</option>
        <option value="153">Malaysia</option>
        <option value="154">Maldives</option>
        <option value="155">Malta</option>
        <option value="156">Marshall Islands</option>
        <option value="157">Martinique</option>
        <option value="158">Mauritania</option>
        <option value="159">Mauritius</option>
        <option value="160">Mayotte</option>
        <option value="161">Mexico</option>
        <option value="162">Micronesia, Federated States of</option>
        <option value="163">Moldova, Republic of</option>
        <option value="164">Monaco</option>
        <option value="165">Mongolia</option>
        <option value="166">Montenegro</option>
        <option value="167">Montserrat</option>
        <option value="168">Morocco</option>
        <option value="169">Mozambique</option>
        <option value="170">Myanmar</option>
        <option value="171">Namibia</option>
        <option value="172">Nauru</option>
        <option value="173">Nepal</option>
        <option value="174">Netherlands</option>
        <option value="175">Netherlands Antilles</option>
        <option value="176">New Caledonia</option>
        <option value="177">Nicaragua</option>
        <option value="178">Niger</option>
        <option value="179">Nigeria</option>
        <option value="180">Niue</option>
        <option value="181">Norfolk Island</option>
        <option value="182">Northern Mariana Islands</option>
        <option value="183">Norway</option>
        <option value="184">Oman</option>
        <option value="185">Pakistan</option>
        <option value="186">Palau</option>
        <option value="187">Palestine</option>
        <option value="188">Panama</option>
        <option value="189">Papua New Guinea</option>
        <option value="190">Paraguay</option>
        <option value="191">Philippines</option>
        <option value="192">Pitcairn</option>
        <option value="193">Poland</option>
        <option value="1">Portugal</option>
        <option value="194">Puerto Rico</option>
        <option value="195">Qatar</option>
        <option value="196">Reunion</option>
        <option value="197">Romania</option>
        <option value="198">Russian Federation</option>
        <option value="199">Rwanda</option>
        <option value="201">Saint Kitts and Nevis</option>
        <option value="202">Saint Lucia</option>
        <option value="203">Saint Vincent and the Grenadines</option>
        <option value="204">Samoa</option>
        <option value="205">San Marino</option>
        <option value="206">Sao Tome and Principe</option>
        <option value="207">Saudi Arabia</option>
        <option value="208">Senegal</option>
        <option value="209">Serbia</option>
        <option value="210">Seychelles</option>
          <option value="211">Sierra Leone</option>
          <option value="212">Singapore</option>
          <option value="213">Slovakia</option>
          <option value="214">Slovenia</option>
          <option value="215">Solomon Islands</option>
          <option value="216">Somalia</option>
          <option value="217">South Africa</option>
          <option value="218">South Georgia South Sandwich Islands</option>
          <option value="219">South Sudan</option>
          <option value="220">Sri Lanka</option>
          <option value="221">St. Helena</option>
          <option value="222">St. Pierre and Miquelon</option>
          <option value="223">Sudan</option>
          <option value="224">Suriname</option>
          <option value="225">Svalbard and Jan Mayen Islands</option>
          <option value="226">Swaziland</option>
          <option value="227">Sweden</option>
          <option value="228">Switzerland</option>
          <option value="229">Syrian Arab Republic</option>
          <option value="230">Taiwan</option>
          <option value="231">Tajikistan</option>
          <option value="232">Tanzania, United Republic of</option>
          <option value="233">Thailand</option>
          <option value="234">Togo</option>
          <option value="235">Tokelau</option>
          <option value="236">Tonga</option>
          <option value="237">Trinidad and Tobago</option>
          <option value="238">Tunisia</option>
          <option value="239">Turkmenistan</option>
          <option value="240">Turks and Caicos Islands</option>
          <option value="241">Tuvalu</option>
          <option value="242">Uganda</option>
          <option value="243">Ukraine</option>
          <option value="244">United Arab Emirates</option>
          <option value="245">Uruguay</option>
          <option value="246">Uzbekistan</option>
          <option value="247">Vanuatu</option>
          <option value="248">Vatican City State</option>
          <option value="249">Venezuela</option>
          <option value="250">Vietnam</option>
          <option value="251">Virgin Islands (British)</option>
          <option value="252">Virgin Islands (U.S.)</option>
          <option value="253">Wallis and Futuna Islands</option>
          <option value="254">Western Sahara</option>
          <option value="255">Yemen</option>
          <option value="256">Zambia</option>
          <option value="257">Zimbabwe</option>
        </select>    
        <textarea name="description" rows="2" cols="50">Enter a short description of yourself.</textarea>
      <input type="submit" value="signup">
    </form>
    <p>Already have an account? So just <a href="login.php">Login!</a></p>
  </section>

  <section id="someImage">
    <img src ="http://projectus.pt/wp-content/uploads/2018/10/007.jpg" alt="house">
  </section>

<?php }

function draw_listing() { 
/**
 * Draws the newHouse/listing section.
 */ ?>
  <section id="listing">
    <header><h1>Create your home's listing.</h1></header>
    <h2>By filling the following requeriments.</h2>

    <form method="post" action="../actions/action_newHouse.php">
      <input type="text" name="listingTitle" placeholder="Enter a title for the listing" required>  
      <input type="number" name="price" placeholder="Enter the house price" min="1" required>  
      <textarea name="location" rows="4" cols="50">Enter the address of the house.</textarea>
      <select name="Country" required>
        <option value="Other" selected disabled>Home Contry</option>     
        <option value="2">United States of America</option>
        <option value="3">Spain</option>
        <option value="4">France</option>
        <option value="5">United Kingdom</option>
        <option value="6">Italy</option>
        <option value="7">Japan</option>
        <option value="9">Australia</option>
        <option value="10">Finland</option>
        <option value="11">Mali</option>
        <option value="12">Peru</option>
        <option value="13">Chile</option>
        <option value="14">China</option>
        <option value="15">New Zealand</option>
        <option value="16">Turkey</option>
        <option value="17">Brazil</option>
        <option value="18">Argentina</option>
        <option value="19">Afghanistan</option>
        <option value="20">Albania</option>
        <option value="21">Algeria</option>
        <option value="22">American Samoa</option>
        <option value="23">Andorra</option>
        <option value="8">Angola</option>
        <option value="24">Anguilla</option>
        <option value="25">Antarctica</option>
        <option value="26">Antigua and Barbuda</option>
        <option value="27">Armenia</option>
        <option value="28">Aruba</option>
        <option value="29">Austria</option>
        <option value="30">Azerbaijan</option>
        <option value="31">Bahamas</option>
        <option value="32">Bahrain</option>
        <option value="33">Bangladesh</option>
        <option value="34">Barbados</option>
        <option value="35">Belarus</option>
        <option value="36">Belgium</option>
        <option value="37">Belize</option>
        <option value="38">Benin</option>
        <option value="39">Bermuda</option>
        <option value="40">Bhutan</option>
        <option value="41">Bolivia</option>
        <option value="42">Bosnia and Herzegovina</option>
        <option value="43">Botswana</option>
        <option value="44">Bouvet Island</option>
        <option value="45">British Indian Ocean Territory</option>
        <option value="46">Brunei Darussalam</option>
        <option value="47">Bulgaria</option>
        <option value="48">Burkina Faso</option>
        <option value="49">Burundi</option>
        <option value="50">Cambodia</option>
        <option value="52">Cameroon</option>
        <option value="53">Canada</option>
        <option value="54">Cape Verde</option>
        <option value="55">Cayman Islands</option>
        <option value="56">Central African Republic</option>
        <option value="57">Chad</option>
        <option value="58">Christmas Island</option>
        <option value="59">Cocos (Keeling) Islands</option>
        <option value="60">Colombia</option>
        <option value="61">Comoros</option>
        <option value="62">Democratic Republic of the Congo</option>
        <option value="63">Republic of Congo</option>
        <option value="64">Cook Islands</option>
        <option value="65">Costa Rica</option>
        <option value="66">Croatia (Hrvatska)</option>
        <option value="67">Cuba</option>
        <option value="68">Cyprus</option>
        <option value="69">Czech Republic</option>
        <option value="70">Denmark</option>
        <option value="71">Djibouti</option>
        <option value="72">Dominica</option>
        <option value="73">Dominican Republic</option>
        <option value="74">East Timor</option>
        <option value="75">Ecuador</option>
        <option value="76">Egypt</option>
        <option value="77">El Salvador</option>
        <option value="78">Equatorial Guinea</option>
        <option value="79">Eritrea</option>
        <option value="80">Estonia</option>
        <option value="81">Ethiopia</option>
        <option value="82">Falkland Islands (Malvinas)</option>
        <option value="83">Faroe Islands</option>
        <option value="84">Fiji</option>
        <option value="85">France Metropolitan</option>
        <option value="86">French Guiana</option>
        <option value="87">French Polynesia</option>
        <option value="88">French Southern Territories</option>
        <option value="89">Gabon</option>
        <option value="90">Gambia</option>
        <option value="91">Georgia</option>
        <option value="92">Germany</option>
        <option value="93">Ghana</option>
        <option value="94">Gibraltar</option>
        <option value="95">Guernsey</option>
        <option value="96">Greece</option>
        <option value="97">Greenland</option>
        <option value="98">Grenada</option>
        <option value="99">Guadeloupe</option>
        <option value="110">Guam</option>
        <option value="111">Guatemala</option>
        <option value="112">Guinea</option>
        <option value="113">Guinea-Bissau</option>
        <option value="114">Guyana</option>
        <option value="115">Haiti</option>
        <option value="116">Heard and Mc Donald Islands</option>
        <option value="117">Honduras</option>
        <option value="118">Hong Kong</option>
        <option value="119">Hungary</option>
        <option value="120">Iceland</option>
        <option value="121">India</option>
        <option value="122">Isle of Man</option>
        <option value="123">Indonesia</option>
        <option value="124">Iran (Islamic Republic of)</option>
        <option value="125">Iraq</option>
        <option value="126">Ireland</option>
        <option value="127">Israel</option>
        <option value="128">Ivory Coast</option>
        <option value="129">Jersey</option>
        <option value="130">Jamaica</option>
        <option value="131">Jordan</option>
        <option value="132">Kazakhstan</option>
        <option value="133">Kenya</option>
        <option value="134">Kiribati</option>
        <option value="135">Korea, Democratic People''s Republic of</option>
        <option value="136">Korea, Republic of</option>
        <option value="137">Kosovo</option>
        <option value="138">Kuwait</option>
        <option value="139">Kyrgyzstan</option>
        <option value="140">Lao People''s Democratic Republic</option>
        <option value="141">Latvia</option>
        <option value="142">Lebanon</option>
        <option value="143">Lesotho</option>
        <option value="144">Liberia</option>
        <option value="145">Libyan Arab Jamahiriya</option>
        <option value="146">Liechtenstein</option>
        <option value="147">Lithuania</option>
        <option value="148">Luxembourg</option>
        <option value="149">Macau</option>
        <option value="150">North Macedonia</option>
        <option value="151">Madagascar</option>
        <option value="152">Malawi</option>
        <option value="153">Malaysia</option>
        <option value="154">Maldives</option>
        <option value="155">Malta</option>
        <option value="156">Marshall Islands</option>
        <option value="157">Martinique</option>
        <option value="158">Mauritania</option>
        <option value="159">Mauritius</option>
        <option value="160">Mayotte</option>
        <option value="161">Mexico</option>
        <option value="162">Micronesia, Federated States of</option>
        <option value="163">Moldova, Republic of</option>
        <option value="164">Monaco</option>
        <option value="165">Mongolia</option>
        <option value="166">Montenegro</option>
        <option value="167">Montserrat</option>
        <option value="168">Morocco</option>
        <option value="169">Mozambique</option>
        <option value="170">Myanmar</option>
        <option value="171">Namibia</option>
        <option value="172">Nauru</option>
        <option value="173">Nepal</option>
        <option value="174">Netherlands</option>
        <option value="175">Netherlands Antilles</option>
        <option value="176">New Caledonia</option>
        <option value="177">Nicaragua</option>
        <option value="178">Niger</option>
        <option value="179">Nigeria</option>
        <option value="180">Niue</option>
        <option value="181">Norfolk Island</option>
        <option value="182">Northern Mariana Islands</option>
        <option value="183">Norway</option>
        <option value="184">Oman</option>
        <option value="185">Pakistan</option>
        <option value="186">Palau</option>
        <option value="187">Palestine</option>
        <option value="188">Panama</option>
        <option value="189">Papua New Guinea</option>
        <option value="190">Paraguay</option>
        <option value="191">Philippines</option>
        <option value="192">Pitcairn</option>
        <option value="193">Poland</option>
        <option value="1">Portugal</option>
        <option value="194">Puerto Rico</option>
        <option value="195">Qatar</option>
        <option value="196">Reunion</option>
        <option value="197">Romania</option>
        <option value="198">Russian Federation</option>
        <option value="199">Rwanda</option>
        <option value="201">Saint Kitts and Nevis</option>
        <option value="202">Saint Lucia</option>
        <option value="203">Saint Vincent and the Grenadines</option>
        <option value="204">Samoa</option>
        <option value="205">San Marino</option>
        <option value="206">Sao Tome and Principe</option>
        <option value="207">Saudi Arabia</option>
        <option value="208">Senegal</option>
        <option value="209">Serbia</option>
        <option value="210">Seychelles</option>
        <option value="211">Sierra Leone</option>
        <option value="212">Singapore</option>
        <option value="213">Slovakia</option>
        <option value="214">Slovenia</option>
        <option value="215">Solomon Islands</option>
        <option value="216">Somalia</option>
        <option value="217">South Africa</option>
        <option value="218">South Georgia South Sandwich Islands</option>
        <option value="219">South Sudan</option>
        <option value="220">Sri Lanka</option>
        <option value="221">St. Helena</option>
        <option value="222">St. Pierre and Miquelon</option>
        <option value="223">Sudan</option>
        <option value="224">Suriname</option>
        <option value="225">Svalbard and Jan Mayen Islands</option>
        <option value="226">Swaziland</option>
        <option value="227">Sweden</option>
        <option value="228">Switzerland</option>
        <option value="229">Syrian Arab Republic</option>
        <option value="230">Taiwan</option>
        <option value="231">Tajikistan</option>
        <option value="232">Tanzania, United Republic of</option>
        <option value="233">Thailand</option>
        <option value="234">Togo</option>
        <option value="235">Tokelau</option>
        <option value="236">Tonga</option>
        <option value="237">Trinidad and Tobago</option>
        <option value="238">Tunisia</option>
        <option value="239">Turkmenistan</option>
        <option value="240">Turks and Caicos Islands</option>
        <option value="241">Tuvalu</option>
        <option value="242">Uganda</option>
        <option value="243">Ukraine</option>
        <option value="244">United Arab Emirates</option>
        <option value="245">Uruguay</option>
        <option value="246">Uzbekistan</option>
        <option value="247">Vanuatu</option>
        <option value="248">Vatican City State</option>
        <option value="249">Venezuela</option>
        <option value="250">Vietnam</option>
        <option value="251">Virgin Islands (British)</option>
        <option value="252">Virgin Islands (U.S.)</option>
        <option value="253">Wallis and Futuna Islands</option>
        <option value="254">Western Sahara</option>
        <option value="255">Yemen</option>
        <option value="256">Zambia</option>
        <option value="257">Zimbabwe</option>
      </select> 

      <select name="Type" required>
        <option value="1" selected disabled>Type...</option>     
        <option value="1">Housebarn</option>
        <option value="2">flat</option>
        <option value="3">Apartment</option>
        <option value="4">Ranch-Style</option>
        <option value="5">Cabin</option>
        <option value="6">basement suite</option>
        <option value="7">Tiny home</option>
      </select> 

      <select name="Nrbedrooms" required>
        <option value="1" selected disabled>Nr of bedrooms</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
      </select>

      <select name="Nrbathrooms" required>
        <option value="1" selected disabled>Nr of bathrooms</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
      </select>

      <select name="maxGuests" required>
        <option value="1" selected disabled>max number of guests</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>

      <textarea name="description" rows="4" cols="50">Enter a short description of the home.</textarea>
      <input type="submit" value="Submit">
    </form>

  </section>

  <section id="houseImg">
    <img src="../images/houses/thumbs_small/default0.jpg" alt="your house picture">
    <form action="../actions/upload_house.php?house=<?=$idHabitacao?>" method="post" enctype="multipart/form-data">
      <input type="file" name="image">
    </form>
  </section>
<?php } 

function draw_editProfile($username) { 
  /**
   * Draws the editProfile section.
   */ ?>
    <section id="editProfile">
  
      <header>
        <h1>Looking for a change.</h1>
        <h2>Edit your credentials below.</h2>
      </header>

      <form method="post" action="../actions/action_change_email.php">  
        <input type="text" name="email" placeholder="email" required>
        <input type="submit" value="edit">  
      </form>

      <form method="post" action="../actions/action_change_name.php"> 
        <input type="text" name="name" placeholder="name" required>
        <input type="submit" value="edit">
      </form>

      <form method="post" action="../actions/action_change_username.php"> 
        <input type="text" name="username" placeholder="username" required>
        <input type="submit" value="edit">
      </form>

      <form method="post" action="../actions/action_change_password.php">   
        <input type="password" name="password" placeholder="new password" required>
        <input type="password" name="password1" placeholder="confirm new password" required>   
        <input type="submit" value="edit">        
      </form>

      <form method="post" action="../actions/action_change_country.php"> 
        <select name="country" required>
          <option value="Other" selected disabled>Home Contry</option>     
          <option value="3">Spain</option>
          <option value="4">France</option>
          <option value="5">United Kingdom</option>
          <option value="6">Italy</option>
          <option value="7">Japan</option>
          <option value="9">Australia</option>
          <option value="10">Finland</option>
          <option value="11">Mali</option>
          <option value="12">Peru</option>
          <option value="13">Chile</option>
          <option value="14">China</option>
          <option value="15">New Zealand</option>
          <option value="16">Turkey</option>
          <option value="17">Brazil</option>
          <option value="18">Argentina</option>
          <option value="19">Afghanistan</option>
          <option value="20">Albania</option>
          <option value="21">Algeria</option>
          <option value="22">American Samoa</option>
          <option value="23">Andorra</option>
          <option value="8">Angola</option>
          <option value="24">Anguilla</option>
          <option value="25">Antarctica</option>
          <option value="26">Antigua and Barbuda</option>
          <option value="27">Armenia</option>
          <option value="28">Aruba</option>
          <option value="29">Austria</option>
          <option value="30">Azerbaijan</option>
          <option value="31">Bahamas</option>
          <option value="32">Bahrain</option>
          <option value="33">Bangladesh</option>
          <option value="34">Barbados</option>
          <option value="35">Belarus</option>
          <option value="36">Belgium</option>
          <option value="37">Belize</option>
          <option value="38">Benin</option>
          <option value="39">Bermuda</option>
          <option value="40">Bhutan</option>
          <option value="41">Bolivia</option>
          <option value="42">Bosnia and Herzegovina</option>
          <option value="43">Botswana</option>
          <option value="44">Bouvet Island</option>
          <option value="45">British Indian Ocean Territory</option>
          <option value="46">Brunei Darussalam</option>
          <option value="47">Bulgaria</option>
          <option value="48">Burkina Faso</option>
          <option value="49">Burundi</option>
          <option value="50">Cambodia</option>
          <option value="52">Cameroon</option>
          <option value="53">Canada</option>
          <option value="54">Cape Verde</option>
          <option value="55">Cayman Islands</option>
          <option value="56">Central African Republic</option>
          <option value="57">Chad</option>
          <option value="58">Christmas Island</option>
          <option value="59">Cocos (Keeling) Islands</option>
          <option value="60">Colombia</option>
          <option value="61">Comoros</option>
          <option value="62">Democratic Republic of the Congo</option>
          <option value="63">Republic of Congo</option>
          <option value="64">Cook Islands</option>
          <option value="65">Costa Rica</option>
          <option value="66">Croatia (Hrvatska)</option>
          <option value="67">Cuba</option>
          <option value="68">Cyprus</option>
          <option value="69">Czech Republic</option>
          <option value="70">Denmark</option>
          <option value="71">Djibouti</option>
          <option value="72">Dominica</option>
          <option value="73">Dominican Republic</option>
          <option value="74">East Timor</option>
          <option value="75">Ecuador</option>
          <option value="76">Egypt</option>
          <option value="77">El Salvador</option>
          <option value="78">Equatorial Guinea</option>
          <option value="79">Eritrea</option>
          <option value="80">Estonia</option>
          <option value="81">Ethiopia</option>
          <option value="82">Falkland Islands (Malvinas)</option>
          <option value="83">Faroe Islands</option>
          <option value="84">Fiji</option>
          <option value="85">France Metropolitan</option>
          <option value="86">French Guiana</option>
          <option value="87">French Polynesia</option>
          <option value="88">French Southern Territories</option>
          <option value="89">Gabon</option>
          <option value="90">Gambia</option>
          <option value="91">Georgia</option>
          <option value="92">Germany</option>
          <option value="93">Ghana</option>
          <option value="94">Gibraltar</option>
          <option value="95">Guernsey</option>
          <option value="96">Greece</option>
          <option value="97">Greenland</option>
          <option value="98">Grenada</option>
          <option value="99">Guadeloupe</option>
          <option value="110">Guam</option>
          <option value="111">Guatemala</option>
          <option value="112">Guinea</option>
          <option value="113">Guinea-Bissau</option>
          <option value="114">Guyana</option>
          <option value="115">Haiti</option>
          <option value="116">Heard and Mc Donald Islands</option>
          <option value="117">Honduras</option>
          <option value="118">Hong Kong</option>
          <option value="119">Hungary</option>
          <option value="120">Iceland</option>
          <option value="121">India</option>
          <option value="122">Isle of Man</option>
          <option value="123">Indonesia</option>
          <option value="124">Iran (Islamic Republic of)</option>
          <option value="125">Iraq</option>
          <option value="126">Ireland</option>
          <option value="127">Israel</option>
          <option value="128">Ivory Coast</option>
          <option value="129">Jersey</option>
          <option value="130">Jamaica</option>
          <option value="131">Jordan</option>
          <option value="132">Kazakhstan</option>
          <option value="133">Kenya</option>
          <option value="134">Kiribati</option>
          <option value="135">Korea, Democratic People''s Republic of</option>
          <option value="136">Korea, Republic of</option>
          <option value="137">Kosovo</option>
          <option value="138">Kuwait</option>
          <option value="139">Kyrgyzstan</option>
          <option value="140">Lao People''s Democratic Republic</option>
          <option value="141">Latvia</option>
          <option value="142">Lebanon</option>
          <option value="143">Lesotho</option>
          <option value="144">Liberia</option>
          <option value="145">Libyan Arab Jamahiriya</option>
          <option value="146">Liechtenstein</option>
          <option value="147">Lithuania</option>
          <option value="148">Luxembourg</option>
          <option value="149">Macau</option>
          <option value="150">North Macedonia</option>
          <option value="151">Madagascar</option>
          <option value="152">Malawi</option>
          <option value="153">Malaysia</option>
          <option value="154">Maldives</option>
          <option value="155">Malta</option>
          <option value="156">Marshall Islands</option>
          <option value="157">Martinique</option>
          <option value="158">Mauritania</option>
          <option value="159">Mauritius</option>
          <option value="160">Mayotte</option>
          <option value="161">Mexico</option>
          <option value="162">Micronesia, Federated States of</option>
          <option value="163">Moldova, Republic of</option>
          <option value="164">Monaco</option>
          <option value="165">Mongolia</option>
          <option value="166">Montenegro</option>
          <option value="167">Montserrat</option>
          <option value="168">Morocco</option>
          <option value="169">Mozambique</option>
          <option value="170">Myanmar</option>
          <option value="171">Namibia</option>
          <option value="172">Nauru</option>
          <option value="173">Nepal</option>
          <option value="174">Netherlands</option>
          <option value="175">Netherlands Antilles</option>
          <option value="176">New Caledonia</option>
          <option value="177">Nicaragua</option>
          <option value="178">Niger</option>
          <option value="179">Nigeria</option>
          <option value="180">Niue</option>
          <option value="181">Norfolk Island</option>
          <option value="182">Northern Mariana Islands</option>
          <option value="183">Norway</option>
          <option value="184">Oman</option>
          <option value="185">Pakistan</option>
          <option value="186">Palau</option>
          <option value="187">Palestine</option>
          <option value="188">Panama</option>
          <option value="189">Papua New Guinea</option>
          <option value="190">Paraguay</option>
          <option value="191">Philippines</option>
          <option value="192">Pitcairn</option>
          <option value="193">Poland</option>
          <option value="1">Portugal</option>
          <option value="194">Puerto Rico</option>
          <option value="195">Qatar</option>
          <option value="196">Reunion</option>
          <option value="197">Romania</option>
          <option value="198">Russian Federation</option>
          <option value="199">Rwanda</option>
          <option value="201">Saint Kitts and Nevis</option>
          <option value="202">Saint Lucia</option>
          <option value="203">Saint Vincent and the Grenadines</option>
          <option value="204">Samoa</option>
          <option value="205">San Marino</option>
          <option value="206">Sao Tome and Principe</option>
          <option value="207">Saudi Arabia</option>
          <option value="208">Senegal</option>
          <option value="209">Serbia</option>
          <option value="210">Seychelles</option>
          <option value="211">Sierra Leone</option>
          <option value="212">Singapore</option>
          <option value="213">Slovakia</option>
          <option value="214">Slovenia</option>
          <option value="215">Solomon Islands</option>
          <option value="216">Somalia</option>
          <option value="217">South Africa</option>
          <option value="218">South Georgia South Sandwich Islands</option>
          <option value="219">South Sudan</option>
          <option value="220">Sri Lanka</option>
          <option value="221">St. Helena</option>
          <option value="222">St. Pierre and Miquelon</option>
          <option value="223">Sudan</option>
          <option value="224">Suriname</option>
          <option value="225">Svalbard and Jan Mayen Islands</option>
          <option value="226">Swaziland</option>
          <option value="227">Sweden</option>
          <option value="228">Switzerland</option>
          <option value="229">Syrian Arab Republic</option>
          <option value="230">Taiwan</option>
          <option value="231">Tajikistan</option>
          <option value="232">Tanzania, United Republic of</option>
          <option value="233">Thailand</option>
          <option value="234">Togo</option>
          <option value="235">Tokelau</option>
          <option value="236">Tonga</option>
          <option value="237">Trinidad and Tobago</option>
          <option value="238">Tunisia</option>
          <option value="239">Turkmenistan</option>
          <option value="240">Turks and Caicos Islands</option>
          <option value="241">Tuvalu</option>
          <option value="242">Uganda</option>
          <option value="243">Ukraine</option>
          <option value="244">United Arab Emirates</option>
          <option value="2">United States of America</option>
          <option value="245">Uruguay</option>
          <option value="246">Uzbekistan</option>
          <option value="247">Vanuatu</option>
          <option value="248">Vatican City State</option>
          <option value="249">Venezuela</option>
          <option value="250">Vietnam</option>
          <option value="251">Virgin Islands (British)</option>
          <option value="252">Virgin Islands (U.S.)</option>
          <option value="253">Wallis and Futuna Islands</option>
          <option value="254">Western Sahara</option>
          <option value="255">Yemen</option>
          <option value="256">Zambia</option>
          <option value="257">Zimbabwe</option>
        </select> 
        <input type="submit" value="edit">
      </form>
    </section>

  <?php

    $id = getId($username);  
    
    if(getPersonImage($id) == 0)
      $image = "../images/person/thumbs_small/default.jpg";
    else $image = "../images/person/thumbs_small/$id.jpg";
    ?>

    <section id="personImg">
      <img src="<?=$image?>" alt="person pic">
      <form action="../actions/upload_image.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="Change picture">
      </form>
    </section>
  
  <?php }

function draw_aboutUs(){
  /**
   * Draws the about us section.
   */ ?>
  <section id="aboutUs">
      <h1>About Us</h1>
  </section>

  <section id="descriptionAbout">
      <h2><p>This company started with the sole purpose of helping you find the home of your dreams.
         We quickly noticed a big hole in the market for an easy way to rent houses without dealing with the tedious process of it all.</p>
       <p> With Rent A House, it is as easy as clicking a button. All the houses available on this website are verified for your safety. 
         Feel free to add your home or to look around at our great range of selection and enjoy!</p></h2>
  </section>

<?php 
}

function draw_contacts(){
  /**
   * Draws the about us section.
   */ ?>
  <section id="contacts">
    <img src="https://www.thebighousemuseum.com/wp-content/uploads/2013/07/about-the-big-house-1.jpg"></img>
    <h1>Get in touch</h1>
  </section>

  <section id="rectangles">
    <div id="contactRectangle1">
    <i class="fas fa-phone-volume"></i>
      <p>Call us</p>
      <h3 id="subText">+351 256 789 154</h3>
    </div>

    <div id="contactRectangle2">
    <i class="far fa-paper-plane"></i>
      <p>Email us</p>
      <h3 id="subText">rentaAhouse@gmail.com</h3>
    </div>
  </section>

<?php } 

function draw_profile($username) {
  
/**
   * Draws the profile section.
   */ ?>
  <section id="profile">
  
  <header>
    <h1>Your Profile</h1>
  </header>

  <?php 
  $id = getId($username);  
  if(getPersonImage($id) == 0)
    $image = "../images/person/thumbs_small/default.jpg";
  else $image = "../images/person/thumbs_small/$id.jpg";
  ?>
  
  <img src="<?=$image?>" alt="person pic">

  <div id="userInfo">
    <p>Username: <?=$username?> </p>
    <p>Email: <?=getPersonEmail($username)?> </p>
  </div>
  
  
  <div id="userWall">
    <p>Name:  <?=getPersonName($username)?> </p>
    <p>Description:  <?=getPersonDescription($username)?> </p>
    <p>Country:  <?=getPersonCountry($username)?> </p>
  </div>
  
  </section>

<?php }

function draw_security() { 
  /**
   * Draws the security section.
   */ ?>
  <section id="security">
      <h1>Security</h1>
  </section>

  <section id="descriptionSecurity">
      <h2><p>Yor security is you priority! If you don't feel secure in this site contact us immediately. </p>
      <p>All image and data introduce in this site won't be taken from you. </p></h2>
      <p>All cookies follow the web protocol. All cookies are random and generated in running time.</p>
      <p>If you like us to have a more secure site, contact us by phone or email available, saying want we can do for you.</p>
  </section>
<?php
} 

function draw_privacy() { 
  /**
   * Draws the security section.
   */ ?>
  <section id="privacy">
      <h1>Privacy</h1>
  </section>

  <section id="descriptionPrivacy">
      <h2><p>Yor privacy is you priority! If you don't feel privite in this site contact us immediately. </p>
      <p>All image and data introduce in this site won't be taken from you in any situation. </p></h2>
      <p>If you don't like to share all you data you don't have to, keep it privity.</p>
      <p>If you like us to have a more secure site, contact us by phone or email available, saying want we can do for you.</p>
      <p>Privity is a relation between two parties that is recognized by law, such as that of blood, lease, or service. So both you as us have to keep in contact to follow the privacy rules</p>
  </section>
  
<?php
} 
?>