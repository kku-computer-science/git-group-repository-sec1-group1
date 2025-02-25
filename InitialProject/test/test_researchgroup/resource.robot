*** Settings ***
Library           SeleniumLibrary

*** Variables ***
${BROWSER}    custom_chrome
${BASE_URL}    http://localhost:8000   #https://cs0167.cpkkuhost.com/
${CHROME_BROWSER_PATH}    C:\\Users\\few66\\Downloads\\chrome-win64\\chrome-win64\\chrome.exe  #${EXECDIR}${/}..${/}ChromeForTesting${/}chrome${/}chrome.exe
${CHROME_DRIVER_PATH}    C:\\Users\\few66\\Downloads\\chrome-win64\\chrome-win64\\chromedriver.exe  #${EXECDIR}${/}..${/}ChromeForTesting${/}chromedriver${/}chromedriver.exe
${DELAY}    1

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

Click Login
    Click Element    xpath= //a[@href='/login']
    ${handles}=    Get Window Handles 
    Switch Window    ${handles}[1]
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

Input Application
    [Arguments]    ${DEADLINE}    ${AMOUNT}    ${DETAIL}    ${CONDITION}
    Execute JavaScript    document.querySelector("input[name='app_deadline[]']").value = '${DEADLINE}';
    Input Text    xpath=(//input[@name="amount[]"])[1]    ${AMOUNT}
    Input Text    xpath=(//textarea[@name="app_detail[]"])[1]    ${DETAIL}
    Input Text    xpath=(//input[@name="app_condition[]"])[1]    ${CONDITION}
    Click Button    Submit All Applications
