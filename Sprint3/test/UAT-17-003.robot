**Settings***
Resource    resource.robot
Library    XML
Library    String

*** Variables ***
${FORM_RESEARCHASSISTANT_PATH}    (//h4[contains(text(),'Research Assistant Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])

***Test Cases***
#Doesn't Input Deadline
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Deadline Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    ${EMPTY}    3    • CV    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser
 
#Doesn't Input Vacancies
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Vacancies Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    ${EMPTY}    • CV    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser

#Doesn't Input Required Documents
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Required Documents Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    ${EMPTY}    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser

#Doesn't Input Salary
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Salary Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    • CV    ${EMPTY}    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser

#Doesn't Input Required Qualifications
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Required Qualifications Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    • CV    30    per hour    ${EMPTY}    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser

#Doesn't Input Work Location
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Work Location Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    • CV    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    ${EMPTY}    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser

#Doesn't Input Contact Name
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Contact Name Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    • CV    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    ${EMPTY}    ngamnij@kku.ac.th      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser

#Doesn't Input Contact Email
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Contact Email Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    • CV    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ${EMPTY}      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser

# Input Invalid Contact Email
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Contact Email Invalid
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    • CV    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ngamnij      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser

#Doesn't Input Start Date
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Start Date Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    • CV    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th      ${EMPTY}    ${EMPTY}     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser

#Doesn't Input Process
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Process Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    • CV    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th      ${EMPTY}    2025-07-21     ${EMPTY}    ${EMPTY}    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser

#Doesn't Input Detail
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Detail Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    • CV    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    ${EMPTY}    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    3s
    [Teardown]    Close Browser












