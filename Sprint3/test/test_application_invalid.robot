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
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Deadline Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    ${EMPTY}    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser
 
#Doesn't Input Vacancies
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Vacancies Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    ${EMPTY}    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser

#Doesn't Input Required Documents
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Required Documents Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    5    ${EMPTY}    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser

#Doesn't Input Salary
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Salary Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    5    • CV/Resume\n• Cover Letter\n• Research Statement    ${EMPTY}    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser

#Doesn't Input Required Qualifications
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Required Qualifications Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    ${EMPTY}    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser

#Doesn't Input Work Location
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Work Location Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    ${EMPTY}    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser

#Doesn't Input Contact Name
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Contact Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    ${EMPTY}    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser

#Doesn't Input Contact Email
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Contact Email Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    ${EMPTY}    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser

# Input Invalid Contact Email
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Contact Email Invalid
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser

#Doesn't Input Start Date
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Start Date Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    $${EMPTY}     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser

#Doesn't Input Process
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Process Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    ${EMPTY}    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    ${EMPTY}    This is an exciting opportunity for this position.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser

#Doesn't Input Detail
Open Website
    Open Web
    Sleep    1s

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Detail Empty
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-03-10    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    ${EMPTY}  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Sleep    5s
    [Teardown]    Close Browser












