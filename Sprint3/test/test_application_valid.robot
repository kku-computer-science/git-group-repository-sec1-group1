***Settings***
Resource    resource.robot
Library    XML
Library    String

*** Variables ***
${FORM_RESEARCHASSISTANT_PATH}    (//h4[contains(text(),'Research Assistant Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PhD_PATH}    (//h4[contains(text(),'PhD Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PostdocPATH}    (//h4[contains(text(),'Postdoc Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])



***Test Cases***
# # Create Application for Research Assistant Success
# Open Website
#     Open Web

# Go To Login
#     Click Login

# Login
#     Input Email    wongsar@kku.ac.th
#     Input Password    id:password    123456789
#     Click Button    Log In
#     Title Should Be    Dashboard

# Go To Application Management Page
#     Click Element    xpath=//a[contains(@href, 'researchGroups')]
#     Click Element    xpath=(//a[@title="Application"])[1]

# Create Application for ResearchAssistant 
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Click Element    xpath=//label[@for='researchAssistant']
#     Sleep    1s
#     Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
#     Open Custom Field
#     Create Custom Field    Required Skills    textarea    java, python
#     Close Custom Field
#     Input Custom Field    0    java, python
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Submit Application
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[1]
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[1]
#     ${Created_Time_Text} =    Get Text    xpath=(//span[contains(@class, 'me-3')])[1]
#     ${Deadline_Text} =    Get Text    xpath=(//div[@class='deadline-info']/span[contains(text(), 'Deadline:')])[1]
#     Should Be Equal As Strings    ${Role_Text}    Research Assistant
#     Should Be Equal As Strings    ${Created_Time_Text}    Created: Mar 09, 2025
#     Should Be Equal As Strings    ${Deadline_Text}    Deadline: Feb 28, 2025
#     Sleep    1s

# Check Research Assistant Application Detail
#     Click Element    xpath=(//a[contains(., 'View Details')])[1]
#     ${Detail_Role_Text}=    Get Text    xpath=//h3[contains(@class,'text-primary')]
#     ${Detail_Group_Text}=    Get Text    xpath=//p[contains(@class,'text-muted')]   
#     Should Be Equal As Strings    ${Detail_Role_Text}    Research Assistant Position
#     Should Be Equal As Strings    ${Detail_Group_Text}    Research Group: Laboratory, Machine Learning and Intelligent Systems (MLIS)
#     Verify Input Deadline    Feb 28, 2025
#     Verify Input Vacancies    5
#     Verify Input Salary    $65,000    per project
#     Verify Input Location    USA
#     Verify Input Job Detail    This is an exciting opportunity for this position.
#     Scroll Element Into View    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Required Qualifications']]/div[@class='detail-content']
#     Sleep    1s
#     Verify Input Required Documents    • CV/Resume\n• Cover Letter\n• Research Statement
#     Verify Input Required Qualifications    • Ph.D. in relevant field\n• Research experience\n• Strong publication record
#     Verify Input Preferred Qualifications    • Teaching experience\n• Industry collaboration experience
#     Scroll Element Into View    xpath=//div[@class='timeline-content'][.//h6[text()='Expected End']]/p 
#     Sleep    1s
#     Verify Input Timeline    Feb 28, 2025    Mar 10, 2025    
#     Verify Input End Date    Jul 07, 2025
#     Verify Input Process    • Submit application through the online portal\n• Initial screening\n• Interviews
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Sleep    1s
#     Verify Input Contact    Dew    few8855@gmail.com    
#     Verify Input Phone    0902386892
#     Verify Input Custom Field    Required Skills    java, python
#     [Teardown]    Close Browser

# # Create Application for Ph.D Success
# Open Website
#     Open Web

# Go To Login
#     Click Login

# Login
#     Input Email    wongsar@kku.ac.th
#     Input Password    id:password    123456789
#     Click Button    Log In
#     Title Should Be    Dashboard

# Go To Application Management Page
#     Click Element    xpath=//a[contains(@href, 'researchGroups')]
#     Click Element    xpath=(//a[@title="Application"])[1]

# Create Application for Ph.D
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Click Element    xpath=//label[@for='phd']
#     Sleep    1s
#     Input Application    ${FORM_PhD_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    ${EMPTY}    USA    Dew    few8855@gmail.com    ${EMPTY}    2025-03-10     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
#     Open Custom Field
#     Create Custom Field    Required Skills    textarea    java, python
#     Close Custom Field
#     Input Custom Field    0    java, python
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Submit Application
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[2]
#     Should Be Equal As Strings    ${Role_Text}    PhD
#     Sleep    1s

# Check Ph.D. Application Detail
#     Click Element    xpath=(//a[contains(., 'View Details')])[2]
#     ${Detail_Role_Text}=    Get Text    xpath=//h3[contains(@class,'text-primary')]
#     ${Detail_Group_Text}=    Get Text    xpath=//p[contains(@class,'text-muted')]   
#     Should Be Equal As Strings    ${Detail_Role_Text}    PhD Position
#     Should Be Equal As Strings    ${Detail_Group_Text}    Research Group: Laboratory, Machine Learning and Intelligent Systems (MLIS)
#     Verify Input Deadline    Feb 28, 2025
#     Verify Input Vacancies    5
#     Verify Input Salary    $65,000    per project
#     Verify Input Location    USA
#     Verify Input Job Detail    This is an exciting opportunity for this position.
#     Scroll Element Into View    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Required Qualifications']]/div[@class='detail-content']
#     Sleep    1s
#     Verify Input Required Documents    • CV/Resume\n• Cover Letter\n• Research Statement
#     Verify Input Required Qualifications    • Ph.D. in relevant field\n• Research experience\n• Strong publication record
#     Verify Input Preferred Qualifications    No preferred qualifications specified.
#     Scroll Element Into View    xpath=//div[contains(@class, 'col-md-4')][contains(., 'Contact Person:')]
#     Sleep    1s
#     Verify Input Timeline    Feb 28, 2025    Mar 10, 2025
#     Verify Input Process    • Submit application through the online portal\n• Initial screening\n• Interviews
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Sleep    1s
#     Verify Input Contact    Dew    few8855@gmail.com    
#     Verify Input Custom Field    Required Skills    java, python
#     [Teardown]    Close Browser

# # Create Application for Postdoc Success
# Open Website
#     Open Web

# Go To Login
#     Click Login

# Login
#     Input Email    wongsar@kku.ac.th
#     Input Password    id:password    123456789
#     Click Button    Log In
#     Title Should Be    Dashboard

# Go To Application Management Page
#     Click Element    xpath=//a[contains(@href, 'researchGroups')]
#     Click Element    xpath=(//a[@title="Application"])[1]

# Create Application for Postdoc
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Click Element    xpath=//label[@for='postdoc']
#     Sleep    1s
#     Input Application    ${FORM_PostDoc_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
#     Open Custom Field
#     Create Custom Field    Required Skills    textarea    java, python
#     Close Custom Field
#     Input Custom Field    0    java, python
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Submit Application
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[3]
#     Should Be Equal As Strings    ${Role_Text}    Postdoc
# #     ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
# #     Should Be Equal As Strings  ${Detail_Role}  Postdoc Position  #Check if show the right one
#     Sleep    1s

# Check Postdoc Application Detail
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[3]
#     Click Element    xpath=(//a[contains(., 'View Details')])[3]
#     ${Detail_Role_Text}=    Get Text    xpath=//h3[contains(@class,'text-primary')]
#     ${Detail_Group_Text}=    Get Text    xpath=//p[contains(@class,'text-muted')]   
#     Should Be Equal As Strings    ${Detail_Role_Text}    Postdoc Position
#     Should Be Equal As Strings    ${Detail_Group_Text}    Research Group: Laboratory, Machine Learning and Intelligent Systems (MLIS)
#     Verify Input Deadline    Feb 28, 2025
#     Verify Input Vacancies    5
#     Verify Input Salary    $65,000    per project
#     Verify Input Location    USA
#     Verify Input Job Detail    This is an exciting opportunity for this position.
#     Scroll Element Into View    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Required Qualifications']]/div[@class='detail-content']
#     Sleep    1s
#     Verify Input Required Documents    • CV/Resume\n• Cover Letter\n• Research Statement
#     Verify Input Required Qualifications    • Ph.D. in relevant field\n• Research experience\n• Strong publication record
#     Verify Input Preferred Qualifications    • Teaching experience\n• Industry collaboration experience
#     Scroll Element Into View    xpath=//div[@class='timeline-content'][.//h6[text()='Expected End']]/p 
#     Sleep    1s
#     Verify Input Timeline    Feb 28, 2025    Mar 10, 2025    
#     Verify Input End Date    Jul 07, 2025
#     Verify Input Process    • Submit application through the online portal\n• Initial screening\n• Interviews
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Sleep    1s
#     Verify Input Contact    Dew    few8855@gmail.com
#     Verify Input Phone    0902386892    
#     Verify Input Custom Field    Required Skills    java, python
#     [Teardown]    Close Browser

# Edit Application
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Edit Application
    Click Element    xpath=(//a[contains(., 'View Details')])[1]
    Click Element    xpath=//a[@class='btn btn-warning mt-3 ct-btn me-2']
    Input Date Type    ${FORM_RESEARCHASSISTANT_PATH}    app_deadline    2025-05-13
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Update Application
    Sleep    1s

Verify Change Detail
    Verify Input Deadline    May 13, 2025
    [Teardown]    Close Browser
# Delete Application
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Delete Application
    Click Element    xpath=(//a[contains(., 'View Details')])[1]
    Click Button    xpath=//button[@class='btn btn-danger mt-3 ct-btn']
    Handle Alert    accept

Verify Deleted Application
    Element Should Not Be Visible    xpath=(//div[contains(@class, 'application-card')])[1]
    [Teardown]    Close Browser

