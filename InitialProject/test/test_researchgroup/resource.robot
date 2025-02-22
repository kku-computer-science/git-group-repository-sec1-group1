*** Settings ***
Library           SeleniumLibrary

*** Variables ***
${BROWSER}        Chrome
${BASE_URL}    https://cs0167.cpkkuhost.com/
${CHROME_BROWSER_PATH}    ${EXECDIR}${/}..${/}ChromeForTesting${/}chrome${/}chrome.exe
${CHROME_DRIVER_PATH}     ${EXECDIR}${/}..${/}ChromeForTesting${/}chromedriver${/}chromedriver.exe
${DELAY}          1

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

Go To Researcher
    Click Element    id=navbarDropdown   
    Click Element    xpath=//ul[@aria-labelledby='navbarDropdown']/li[1]/a
Go To Researcher Group
    Click Element    xpath=//a[@href='/researchgroup']
    Page Should Contain Element    xpath=//p[contains(text(), 'Research Group')]

Change Language
    [Arguments]      ${LANGUAGE}
    Click Element    id=navbarDropdownMenuLink
    Click Element    xpath=//a[contains(text(), '${LANGUAGE}')]

Verify Page Text
    [Arguments]    ${EXPECTED_TEXT}
    Element Should Contain    xpath=//h6[@class='card-title'][contains(text(), '${EXPECTED_TEXT}')]    ${EXPECTED_TEXT}

