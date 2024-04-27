<!DOCTYPE html>
<html>
<!-- <link rel="stylesheet" 
href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <head>
    <title>Survey</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri&family=Kanit:wght@300;400&family=Oswald:wght@300;400&family=PT+Serif&family=Playfair:wght@400;500&display=swap');

      html,
      body {
        height: 100%;
        background-color: #bcbcb2;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'PT Serif', serif;
      }

      .page {
        display: none;
        height: 100%;
      }

      .container {
        background-color: #eeeeeb;
        padding: 20px 30px;
        border-radius: 15px;
        min-height: 80vh;
        width: 700px;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
      }

      h2#pageTitle {
        font-family: 'PT Serif', serif;
        text-align: center;
      }

      .center{
        padding: 15px;

        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
      }

      .button-container {
        position: relative;
        bottom: 10px;
        text-align: center;
      }

      #studyTimeValue,
      #money{
        text-align: center;
        width: 90%;
      }

      button {
        background-color: #336699;
        color: #ffffff;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
        font-family: 'PT Serif', serif;
      }

      button:hover {
        background-color: #234567;
      }

      input[type="text"],
      select,
      input[type="date"],
      input[type="range"] {
        padding: 6px;
        font-size: 16px;
        border: 1px solid #cccccc;
        color: #5c5b5b;
        border-radius: 5px;
        font-family: 'PT Serif', serif;
        width: 250px;
      }

      input[type="text"]:focus,
      select:focus,
      input[type="date"]:focus {
        outline: none;
        border-color: #336699;
        font-family: 'PT Serif', serif;
      }

      p {
        font-family: 'PT Serif', serif;
      }

      table {
    border-collapse: collapse;
  }

  table td, table th {
    padding: 8px;
    border: 4px solid white;
  }

    </style>
    <script>
      // global variable
      var surveyData = {}; 
      function generateRandomDescription() {
        // console.log("work")
        var descriptions = [
            "Jason is a street performer magician. During his senior year in high school, Jason's father was diagnosed with cancer, and the family suddenly lost their financial support. As the only child, he made up his mind to support his family by showcasing his magic skills on the streets. He would travel to different places, braving the wind and rain, just to earn tips to support his family. Now, Jason has gained a loyal audience and continues to bring countless smiles to everyone.",
            "Jason is a street performer magician with a solid foundation in magic. With his passion for magic, he used to practice late into the night, often staying up until 1 or 2 a.m. He would travel to different places, undeterred by wind and rain, in pursuit of his dreams. The support and feedback from the audience are the greatest encouragement for him. Now, Jason has accumulated a loyal following and continues to bring numerous smiles to everyone."
            ];
        var randomIndex = Math.floor(Math.random() * descriptions.length);
        var randomDescription = descriptions[randomIndex];
        var descriptionElement = document.getElementById("description");
        if (descriptionElement) {
            descriptionElement.textContent = randomDescription;
        }
        }

      // page 1 to page 2
      function goToPage2() {
        var currentPage = document.querySelector('.page:not([style*="display: none"])');
        var nextPage = currentPage.nextElementSibling;
        function submitserver(){
        $.ajax({
          url: "uploadinfo.php",
          type: "POST",
          data: {"name":surveyData.name,"id":surveyData.id,"gender": surveyData.gender,"dob":surveyData.dob},
          dataType: "html",
          success: function(html) {
          // Continue to next page
        //   alert("007");
              }
            })
      }
        
        // save value
        surveyData.name = document.getElementById('name').value;
        surveyData.id = document.getElementById('ID').value;
        surveyData.gender = document.getElementById('gender').value;
        surveyData.dob = document.getElementById('dob').value;
        

        // CheckData
        if (surveyData.name === "" || surveyData.id === "" || surveyData.gender === "" || surveyData.dob === "") {
          alert("Please fill in all the required fields.");
        return; // stop page next
        }
       
        // change to page 2
        generateRandomDescription();
        currentPage.style.display = 'none';
        nextPage.style.display = 'block'; 
        document.getElementById('pageTitle').innerHTML = 'The Story of Jason';

        
        // change onClick event
        var buttonContainer = document.querySelector('.button-container');
        buttonContainer.innerHTML = '<button onclick="goToPage3()">Next</button>';

        // go to test
        submitserver()
      }
    
      // page 2 to 3      
      function goToPage3() {
        var currentPage = document.querySelector('.page:not([style*="display: none"])');
        var nextPage = currentPage.nextElementSibling;


        // store money
        surveyData.money = document.getElementById('money').value;

        // change to page 3
        currentPage.style.display = 'none';
        nextPage.style.display = 'block'; 
        document.getElementById('pageTitle').innerHTML = 'Survey Page';
        generateRandomDescription();
        

        // change onClick event
        var buttonContainer = document.querySelector('.button-container');
        buttonContainer.innerHTML = '<button onclick="goToPage4()">Next</button>';

      }  
      
      // page 3 to 4
      function goToPage4() {
        var currentPage = document.querySelector('.page:not([style*="display: none"])');
        var nextPage = currentPage.nextElementSibling;

        function submitserver(){
        $.ajax({
          url: "uploadanswer.php",
          type: "POST",
          data: {"money":surveyData.money,"income":surveyData.income,"habit":surveyData.habit,"donationUse": surveyData.donationUse,"education":surveyData.education},
          dataType: "html",
          success: function(html) {
          // Continue to next page
        //   alert("okok");
              }
            })
        }
        

        function showinfo(){
        $.ajax({
          url: "downloadinfo.php",
          type: "POST",
          data: {},
          dataType: "html",
          success: function(html) {
          // Continue to next page
          // console.log(html);
          document.querySelector('.tableinfo').innerHTML = html;
              }
            })
        }

        function showanswer(){
        $.ajax({
          url: "downloadanswer.php",
          type: "POST",
          data: {},
          dataType: "html",
          success: function(html) {
          // Continue to next page
          // console.log(html);
          document.querySelector('.tableanswer').innerHTML = html;
              }
            })
        }

        
        var income = document.getElementById('income').value;
        var habit = document.querySelector('input[name="habit"]:checked');
        var donationUse = document.querySelector('input[name="donationUse"]:checked');
        var education = document.getElementById('education').value;
       

        // CheckData
        if (income === "" || !habit || !donationUse || education === "") {
          alert("Please fill in all the required fields.");
          return; // stop page
            }

        // Check if income is a number
        if (isNaN(income)) {
          alert("Please enter a valid number for income.");
          return; // stop page
          }
        
        // save data to survey list
        surveyData.income = income;
        surveyData.habit = habit.value;
        if (donationUse.value === "Other") {
            var otherReason = document.getElementById('otherDonateReason').value;

            if (donationUse.value === "Other" && otherReason.trim() === "") {
            alert("Please specify the other donation aspect.");
            return; // stop page
        }
          surveyData.donationUse = otherReason;
        } else {
          surveyData.donationUse = donationUse.value;
        }
        surveyData.education = education;


        submitserver()

        // change to page final
        currentPage.style.display = 'none';
        nextPage.style.display = 'block';
        document.getElementById('pageTitle').innerHTML = 'Answer Record'; // 修改大標題字
        var buttonContainer = document.querySelector('.button-container');
        buttonContainer.innerHTML = '';

        // document.getElementById('summaryName').innerHTML = 'Name: ' + surveyData.name;
        // document.getElementById('summaryGender').innerHTML = 'Gender: ' + surveyData.gender;
        // document.getElementById('summaryDOB').innerHTML = 'Date of Birth: ' + surveyData.dob;
        // document.getElementById('summaryID').innerHTML = 'id: ' + surveyData.id;

        // document.getElementById('summaryMoney').innerHTML = 'money: ' + surveyData.money;
        // document.getElementById('summaryIncome').innerHTML = 'income: ' + surveyData.income;
        // document.getElementById('summaryHabit').innerHTML = 'habit: ' + surveyData.habit;
        // document.getElementById('summaryDonationUse').innerHTML = 'donation use: ' + surveyData.donationUse;
        // document.getElementById('summaryEducation').innerHTML = 'education: ' + surveyData.education;

        
        // see data

        showinfo();
        showanswer();
        
      }
      

      function updateSliderValue() {
      var money = document.getElementById('money');
      var studyTimeValue = document.getElementById('moneyValue');
      moneyValue.innerHTML = money.value;
      }

    // function submitserver(){
    //     $.ajax({
    //       url: "test.php",
    //       type: "POST",
    //       data: {"gender": ""},
    //       dataType: "html",
    //       success: function(html) {
    //       // Continue to next page
    //       alert("worked!");
    //           }
    //         })
    //   }
      
    </script>
  </head>
  <body>
    <div class="container">
      <h2 id="pageTitle">Log In Page</h2>
      <!-- Page 1 -->
      <div id="page1" class="page" style="display: block;">
        <label for="name">Name:&emsp;</label>
        <input type="text" id="name" required placeholder="Please type your name">
        <br>
        <br>
        <label for="school">ID:&emsp;</label>
        <input type="text" id="ID" required placeholder="1A2345678">
        <br>
        <br>
        <label for="gender">Gender:&emsp;</label>
        <select id="gender" required>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Transgender Female">Transgender Female</option>
          <option value="Transgender Male">Transgender Male</option>
          <option value="Not Listed">Not Listed</option>
          <option value="Prefer Not to Answer">Prefer Not to Answer</option>
        </select>
        <br>
        <br>
        <label for="dob">Date of Birth:&emsp;</label>
        <input type="date" id="dob" required>
        <br>
        <br>
      </div>
      <!-- Page 2 -->
      <div id="page2" class="page" >
        <div class = "center" >
          <label style="font-weight: bold; text-align: center;">Please read the story below.</label>
          <br>
            <div id="description"></div>
            <br>
            <br>
            <div class = "center" >
            <label for="money" style="font-weight: bold; text-align: center;"
            >Now you have 1,000 yen.<br>How much of this 1,000 yen would you like to donate to the street performer?</label>
            <input type="range" id="money" min="0" max="1000" step="10" oninput="updateSliderValue()">
            <p id="moneyValue">500</p>
          </div>
        </div>
      </div>
      <!-- Page 3 -->
      <div id="page3" class="page">
        <div class = "center" >
        <label style="font-weight: bold; text-align: center;">Please fill all the question below</label>
      </div>
        <!-- Q1 Income-->
        <label for="income">1. Please indicate your monthly income (yen):&emsp;</label>
        <input type="text" id="income" required placeholder="Ex: 150000">
        <br>
        <br>
        <!-- Q2 Habit-->
        <label for="habit">2. Do you have a habit of sponsoring street performers? </label>
        <br>
        <input type="radio" id="habitYes" name="habit" value="Yes">
        <label for="living">Yes</label>
        <br>
        <input type="radio" id="habitNo" name="habit" value="No">
        <label for="developing">No</label>
        <br>
        <br>
        <!-- Q3 DonationUse-->
        <label for="donationUse">3. Which aspect would you prefer the street performer to use your donation for?</label>
        <br>
        <input type="radio" id="living" name="donationUse" value="Supporting their daily living expenses">
        <label for="living">Supporting their daily living expenses</label>
        <br>
        <input type="radio" id="developing" name="donationUse" value="Nurturing street performers' dreams (e.g., talent enhancement)">
        <label for="developing">Nurturing street performers' dreams (e.g., talent enhancement)</label>
        <br>
        <input type="radio" id="nodonation" name="donationUse" value=" I haven't made any donations">
        <label for="developing"> I haven't made any donations</label>
        <br>
        <input type="radio" id="othere" name="donationUse" value="Other">
        <label for="otherPlace">Other</label>
        <input type="text" id="otherDonateReason" placeholder="Please specify">
        <br>
        <br>
        <!-- Q4 Education-->
        <label for="education">4. What is your highest level of education?&emsp;</label>
        <select id="education" required>
          <option value=" Elementary school (incomplete/graduated)"> Elementary school (incomplete/graduated)</option>
          <option value="Junior high school (incomplete/graduated)">Junior high school (incomplete/graduated)</option>
          <option value="High school or vocational school (incomplete/graduated)">High school or vocational school (incomplete/graduated)</option>
          <option value="College or university (incomplete/graduated)">College or university (incomplete/graduated)</option>
          <option value="Master's degree (incomplete/graduated)">Master's degree (incomplete/graduated)</option>
          <option value="Doctorate degree (incomplete/graduated)">Doctorate degree (incomplete/graduated)</option>
        </select>
        <br>
        <br>
      </div>
      <!-- Page 4 -->
      <div id="page4" class="page">
      <div class = "center" >
        <label style="font-weight: bold; text-align: center;  font-size: 20px;">Log In Information</label>
        <div class = "tableinfo"></div>
        <br>
        <label style="font-weight: bold; text-align: center;  font-size: 20px;">Pass Answer</label>
        <div class = "tableanswer"></div>
      </div>
      </div>
      <div class="button-container">
        <button onclick="goToPage2()">Log In</button>
      </div>
    </div>
  </body>
</html>