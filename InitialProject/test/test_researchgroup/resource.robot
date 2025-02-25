*** Settings ***
Library           SeleniumLibrary

*** Variables ***
${BROWSER}    custom_chrome
${BASE_URL}    http://localhost:8000   #https://cs0167.cpkkuhost.com/
${CHROME_BROWSER_PATH}    C:\\Users\\few66\\Downloads\\chrome-win64\\chrome-win64\\chrome.exe  #${EXECDIR}${/}..${/}ChromeForTesting${/}chrome${/}chrome.exe
${CHROME_DRIVER_PATH}    C:\\Users\\few66\\Downloads\\chrome-win64\\chrome-win64\\chromedriver.exe  #${EXECDIR}${/}..${/}ChromeForTesting${/}chromedriver${/}chromedriver.exe
${DELAY}    0.8

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

Input Project
    [Arguments]    ${NAME}    ${DESCRIPTION}    ${CONTACT}
    Input Text    id:projectName    ${NAME}
    Input Text    id:projectDescription    ${DESCRIPTION}
    Input Text    id:projectContact    ${CONTACT}
    Click Button    Create

Edit Project
    [Arguments]    ${EDITED_NAME}    ${EDITED_DESCRIPTION}    ${EDITED_CONTACT}
    Input Text    id:project_title   ${EDITED_NAME}
    Input Text    id:project_details    ${EDITED_DESCRIPTION}
    Input Text    id:contact   ${EDITED_CONTACT}
    Click Button    Save Changes

Input Application
    [Arguments]    ${FORM_XPATH}    ${DEADLINE}    ${VACANCIES}    ${DOCUMENTS}    ${SALARY}    ${QUALIFICATION}    ${PREFERRED_QUALIFICATIONS}    ${WORKING_TIME}    ${WORK_LOCATION}    ${START_DATE}    ${END_DATE}    ${PROCESS}    ${DETAIL}      
    # Fill fields
    Scroll Element Into View    xpath=${FORM_XPATH}//input[@name='app_deadline[]']
    Input Date Type    ${FORM_XPATH}    app_deadline[]    ${DEADLINE}
    Input Text  xpath=${FORM_XPATH}//input[@name='amount[]']    ${VACANCIES}
    Input Text  xpath=${FORM_XPATH}//textarea[@name='required_documents[]']    ${DOCUMENTS}  # • CV/Resume\n• Cover Letter\n• Research Statement  
    Input Text  xpath=${FORM_XPATH}//input[@name='salary_range[]']    ${SALARY}  #65,000 - 80,000 per month
    Input Text  xpath=${FORM_XPATH}//textarea[@name='qualifications[]']    ${QUALIFICATION}  #• Ph.D. in relevant field\n• Research experience\n• Strong publication record
    Input Text  xpath=${FORM_XPATH}//textarea[@name='preferred_qualifications[]']    ${PREFERRED_QUALIFICATIONS}  #• Teaching experience\n• Industry collaboration experience
    Input Text  xpath=${FORM_XPATH}//input[@name='working_time[]']    ${WORKING_TIME}  #Full-time, 40 hours per week
    Input Text  xpath=${FORM_XPATH}//input[@name='work_location[]']    ${WORK_LOCATION}  #Cambridge, MA (Hybrid)
    Scroll Element Into View    ${FORM_XPATH}//input[@name='start_date[]']
    Sleep    1s
    Input Date Type    ${FORM_XPATH}    start_date[]    ${START_DATE}
    Input Date Type    ${FORM_XPATH}    end_date[]    ${END_DATE}
    Input Text  xpath=${FORM_XPATH}//textarea[@name='application_process[]']    ${PROCESS}  #• Submit application through the online portal\n• Initial screening\n• Interviews
    Input Text  xpath=${FORM_XPATH}//textarea[@name='app_detail[]']    ${DETAIL}  #This is an exciting opportunity for this position.

Input Date Type
    [Arguments]    ${FORM_XPATH}    ${FIELD_NAME}    ${DATE}
    Execute JavaScript  
    ...  var el = document.evaluate("${FORM_XPATH}//input[@name='${FIELD_NAME}']", document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
    ...  if(el) el.value = '${DATE}';

Edit Application
    [Arguments]    ${DEADLINE}    ${VACANCIES}    ${DOCUMENTS}    ${SALARY}    ${QUALIFICATION}    ${PREFERRED_QUALIFICATIONS}    ${WORKING_TIME}    ${WORK_LOCATION}    ${START_DATE}    ${END_DATE}    ${PROCESS}    ${DETAIL}      
    # Fill fields
    Scroll Element Into View    xpath=//input[@name='app_deadline']
    Input Date Type    ${EMPTY}    app_deadline    ${DEADLINE}
    Input Text  xpath=//input[@name='amount']    ${VACANCIES}
    Input Text  xpath=//textarea[@name='required_documents']    ${DOCUMENTS}  # • CV/Resume\n• Cover Letter\n• Research Statement  
    Input Text  xpath=//input[@name='salary_range']    ${SALARY}  #65,000 - 80,000 per month
    Input Text  xpath=//textarea[@name='qualifications']    ${QUALIFICATION}  #• Ph.D. in relevant field\n• Research experience\n• Strong publication record
    Input Text  xpath=//textarea[@name='preferred_qualifications']    ${PREFERRED_QUALIFICATIONS}  #• Teaching experience\n• Industry collaboration experience
    Input Text  xpath=//input[@name='working_time']    ${WORKING_TIME}  #Full-time, 40 hours per week
    Input Text  xpath=//input[@name='work_location']    ${WORK_LOCATION}  #Cambridge, MA (Hybrid)
    Scroll Element Into View    //input[@name='start_date']
    Sleep    1s
    Input Date Type    ${EMPTY}    start_date    ${START_DATE}
    Input Date Type    ${EMPTY}    end_date    ${END_DATE}
    Input Text  xpath=//textarea[@name='application_process']    ${PROCESS}  #• Submit application through the online portal\n• Initial screening\n• Interviews
    Input Text  xpath=//textarea[@name='app_detail']    ${DETAIL}  #This is an exciting opportunity for this position.
