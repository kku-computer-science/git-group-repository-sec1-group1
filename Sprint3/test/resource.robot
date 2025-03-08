*** Settings ***
Library           SeleniumLibrary

*** Variables ***
${BROWSER}    custom_chrome
${BASE_URL}    http://localhost:8000   #https://cs0167.cpkkuhost.com/
${CHROME_BROWSER_PATH}    C:\\Users\\few66\\Downloads\\chrome-win64\\chrome-win64\\chrome.exe  #${EXECDIR}${/}..${/}ChromeForTesting${/}chrome${/}chrome.exe
${CHROME_DRIVER_PATH}    C:\\Users\\few66\\Downloads\\chrome-win64\\chrome-win64\\chromedriver.exe  #${EXECDIR}${/}..${/}ChromeForTesting${/}chromedriver${/}chromedriver.exe
${DELAY}    0.5

***Keywords***
Open Custom Chrome Browser
    [Arguments]    ${url}
    ${options}=    Evaluate    sys.modules['selenium.webdriver'].ChromeOptions()    sys
    Set Variable    ${options}    binary_location    ${CHROME_BROWSER_PATH}
    ${service}=    Evaluate    sys.modules["selenium.webdriver.chrome.service"].Service(executable_path=r"${CHROME_DRIVER_PATH}")    sys
    Create Webdriver    Chrome    options=${options}    service=${service}
    Go To    ${url}

Open Web
    Open Custom Chrome Browser    ${BASE_URL}
    Maximize Browser Window
    Set Selenium Speed    ${DELAY}
    Home Should Be Open

Home Should Be Open
    Title Should Be    ระบบข้อมูลงานวิจัย วิทยาลัยการคอมพิวเตอร์

Go To Researcher Group
    Click Element    xpath=//a[@href='/researchgroup']
    Page Should Contain Element    xpath=//p[contains(text(), 'Research Group')]

Switch Tab
    [Arguments]    ${INDEX}
    ${handles}=    Get Window Handles 
    Switch Window    ${handles}[${INDEX}]
Click Login
    Click Element    xpath= //a[@href='/login']
    Switch Tab    1
    Title Should Be    Login

Input Email
    [Arguments]    ${EMAIL}
    Input Text    id:username    ${EMAIL}

Input Application
    [Arguments]    ${FORM_XPATH}    ${DEADLINE}    ${VACANCIES}    ${DOCUMENTS}    ${SALARY}    ${SALARY_PERIOD}    ${QUALIFICATION}    ${PREFERRED_QUALIFICATIONS}    ${WORK_LOCATION}    ${CONTACT_NAME}    ${CONTACT_EMAIL}    ${CONTACT_PHONE}    ${START_DATE}    ${END_DATE}    ${PROCESS}    ${DETAIL}      
    # Fill fields
    Scroll Element Into View    xpath=${FORM_XPATH}//input[@name='app_deadline']
    Input Date Type    ${FORM_XPATH}    app_deadline    ${DEADLINE}
    Input Text  xpath=${FORM_XPATH}//input[@name='amount']    ${VACANCIES}
    Input Text  xpath=${FORM_XPATH}//textarea[@name='required_documents']    ${DOCUMENTS}  # • CV/Resume\n• Cover Letter\n• Research Statement  
    Input Text  xpath=${FORM_XPATH}//input[@name='salary_amount']    ${SALARY}  #65,000 - 80,000 
    Select From List By Value  xpath=${FORM_XPATH}//select[@name='salary_period']    ${SALARY_PERIOD} 
    Input Text  xpath=${FORM_XPATH}//textarea[@name='qualifications']    ${QUALIFICATION}  #• Ph.D. in relevant field\n• Research experience\n• Strong publication record
    Input Text  xpath=${FORM_XPATH}//textarea[@name='preferred_qualifications']    ${PREFERRED_QUALIFICATIONS}  #• Teaching experience\n• Industry collaboration experience
    Input Text  xpath=${FORM_XPATH}//input[@name='work_location']    ${WORK_LOCATION}  #Cambridge, MA (Hybrid)
    Input Text  xpath=${FORM_XPATH}//input[@name='contact_name']    ${CONTACT_NAME}
    Input Text  xpath=${FORM_XPATH}//input[@name='contact_email']    ${CONTACT_EMAIL}
    Input Text  xpath=${FORM_XPATH}//input[@name='contact_phone']    ${CONTACT_PHONE}
    Input Date Type    ${FORM_XPATH}    start_date    ${START_DATE}
    Input Date Type    ${FORM_XPATH}    end_date    ${END_DATE}
    Input Text  xpath=${FORM_XPATH}//textarea[@name='application_process']    ${PROCESS}  #• Submit application through the online portal\n• Initial screening\n• Interviews
    Input Text  xpath=${FORM_XPATH}//textarea[@name='app_detail']    ${DETAIL}  #This is an exciting opportunity for this position.

Input Date Type
    [Arguments]    ${FORM_XPATH}    ${FIELD_NAME}    ${DATE}
    Execute JavaScript  
    ...  var el = document.evaluate("${FORM_XPATH}//input[@name='${FIELD_NAME}']", document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
    ...  if(el) el.value = '${DATE}';

Open Custom Field
    Scroll Element Into View    xpath=//button[@id="add-custom-field"] 
    Click Element    xpath=//button[@data-bs-target='#customFieldModal'] 

Create Custom Field   
    [Arguments]    ${FIELD_LABEL}    ${FIELD_TYPE}    ${PLACEHOLDER}
    Input Text    id=modal-field-label    ${FIELD_LABEL}
    Select From List By Value    id=modal-field-type    ${FIELD_TYPE}
    Click Element    id=modal-field-required
    Input Text    id=modal-field-placeholder    ${PLACEHOLDER}
    Click Button    Add Field

Close Custom Field
    Click Button    Cancel

Input Custom Field
    [Arguments]    ${INDEX}    ${INPUT}
    Input Text    xpath=//*[@id="app_field_${INDEX}"]    ${INPUT}