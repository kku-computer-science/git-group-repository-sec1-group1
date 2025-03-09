***Settings***
Resource    resource.robot
Library    XML
Library    String

*** Variables ***
${FORM_RESEARCHASSISTANT_PATH}    (//h4[contains(text(),'Research Assistant Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PhD_PATH}    (//h4[contains(text(),'PhD Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PostdocPATH}    (//h4[contains(text(),'Postdoc Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])



***Test Cases***
# Create Application for Research Assistant Success
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

Create Application for ResearchAssistant 
    # Click Element    xpath=//a[contains(text(), 'Create Application')]
    # Click Element    xpath=//label[@for='researchAssistant']
    # Sleep    1s
    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    # Open Custom Field
    # Create Custom Field    Required Skills    textarea    java, python
    # Close Custom Field
    # Input Custom Field    0    java, python
    # Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    # Click Button    Submit Application
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[1]
    ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[1]
    ${Created_Time_Text} =    Get Text    xpath=(//span[contains(@class, 'me-3')])[1]
    ${Deadline_Text} =    Get Text    xpath=(//div[@class='deadline-info']/span[contains(text(), 'Deadline:')])[1]
    # ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[1]
    # ${Created_Time_Text} =    Get Text    xpath=(//span[contains(@class, 'me-3')])[1]
    # ${Deadline_Text} =    Get Text    xpath=(//div[@class='deadline-info']/span[contains(text(), 'Deadline:')])[1]
    Should Be Equal As Strings    ${Role_Text}    Research Assistant
    Should Be Equal As Strings    ${Created_Time_Text}    Created: Mar 09, 2025
    Should Be Equal As Strings    ${Deadline_Text}    Deadline: Feb 28, 2025
     
    
    Sleep    1s

Check Application Detail
    Click Element    xpath=(//a[contains(., 'View Details')])[1]
    ${Detail_Role_Text}=    Get Text    xpath=//h3[contains(@class,'text-primary')]
    ${Detail_Group_Text}=    Get Text    xpath=//p[contains(@class,'text-muted')]   
    ${Detail_Vacancies_Text}=    Get Text    xpath=//div[contains(@class, 'info-card')][.//h6[text()='Vacancies']]/div[@class='info-content']/p
    ${Detail_Deadline_Text}=    Get Text    xpath=//div[contains(@class, 'info-card')][.//h6[text()='Deadline']]/div[@class='info-content']/p
    ${Detail_Salary_Text}=    Get Text    xpath=//div[contains(@class, 'info-card')][.//h6[text()='Salary']]/div[@class='info-content']/p
    ${Detail_Location_Text}=    Get Text    xpath=//div[contains(@class, 'info-card')][.//h6[text()='Location']]/div[@class='info-content']/p
    ${Detail_Application_Detail_Text}=    Get Text    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Application Details']]/div[@class='detail-content']
    ${Required_Documents_Detail_Text}=    Get Text    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Required Documents']]/div[@class='detail-content']
    ${Required_Qualifications_Detail_Text}=    Get Text    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Required Qualifications']]/div[@class='detail-content']
    ${Preferred_Qualifications_Detail_Text}=    Get Text    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Preferred Qualifications']]/div[@class='detail-content']
    ${Timeline_Deadline_Text}=    Get Text    xpath=//div[@class='timeline-content'][.//h6[text()='Application Deadline']]/p
    ${Timeline_Start_Text}=    Get Text    xpath=//div[@class='timeline-content'][.//h6[text()='Expected Start']]/p
    ${Timeline_End_Text}=    Get Text    xpath=//div[@class='timeline-content'][.//h6[text()='Expected End']]/p
    ${Detail_Process_Text}=    Get Text    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Application Process']]/div[@class='detail-content']
    ${Detail_Contact_Name_Text}=    Get Text    xpath=//div[contains(@class, 'col-md-4')][contains(., 'Contact Person:')]
    ${Detail_Contact_Email_Text}=    Get Text    xpath=//div[contains(@class, 'col-md-4')][contains(., 'Email:')]
    ${Detail_Contact_Phone_Text}=    Get Text    xpath=//div[contains(@class, 'col-md-4')][contains(., 'Phone:')]
    ${Detail_Custom_Field_Text}=    Get Text    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Required Skills']]/div[@class='detail-content']
    Should Be Equal As Strings  ${Detail_Role_Text}  Research Assistant Position  #Check if show the right one
    Should Be Equal As Strings    ${Detail_Group_Text}    Research Group: Laboratory, Machine Learning and Intelligent Systems (MLIS)
    Should Be Equal As Strings    ${Detail_Vacancies_Text}    5
    Should Be Equal As Strings    ${Detail_Deadline_Text}    Feb 28, 2025
    Should Be Equal As Strings    ${Detail_Salary_Text}    $65,000 per project
    Should Be Equal As Strings    ${Detail_Location_Text}    Washington D.C.(Hybrid)
    Should Be Equal As Strings    ${Detail_Application_Detail_Text}    This is an exciting opportunity for this position.
    Scroll Element Into View    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Required Qualifications']]/div[@class='detail-content']
    Sleep    1s
    Should Be Equal As Strings    ${Required_Documents_Detail_Text}    • CV/Resume\n• Cover Letter\n• Research Statement
    Should Be Equal As Strings    ${Required_Qualifications_Detail_Text}    • Ph.D. in relevant field\n• Research experience\n• Strong publication record
    Should Be Equal As Strings    ${Preferred_Qualifications_Detail_Text}    • Teaching experience\n• Industry collaboration experience
    Scroll Element Into View    xpath=//div[@class='timeline-content'][.//h6[text()='Expected End']]/p 
    Sleep    1s
    Should Be Equal As Strings    ${Timeline_Deadline_Text}    Feb 28, 2025
    Should Be Equal As Strings    ${Timeline_Start_Text}    Mar 10, 2025
    Should Be Equal As Strings    ${Timeline_End_Text}    Jul 07, 2025
    Should Be Equal As Strings    ${Detail_Process_Text}    • Submit application through the online portal\n• Initial screening\n• Interviews
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Sleep    1s
    Should Be Equal As Strings    ${Detail_Contact_Name_Text}    Contact Person: Dew
    Should Be Equal As Strings    ${Detail_Contact_Email_Text}    Email: few8855@gmail.com
    Should Be Equal As Strings    ${Detail_Contact_Phone_Text}    Phone: 0902386892
    Should Be Equal As Strings    ${Detail_Custom_Field_Text}    java, python
    [Teardown]    Close Browser

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
#     Input Application    ${FORM_PhD_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
#     Open Custom Field
#     Create Custom Field    Required Skills    textarea    java, python
#     Close Custom Field
#     Input Custom Field    0    java, python
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Submit Application
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
# #     Sleep    0.5s
# #     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[2]
# #     Should Be Equal As Strings    ${Role_Text}    PhD
#     Click Element    xpath=(//a[contains(., 'View Details')])[2]  #Click View details
# #     ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
# #     Should Be Equal As Strings  ${Detail_Role}  PhD Position  #Check if show the right one
#     Sleep    1s
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
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[3]
# #     Sleep    0.5
# #     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[3]
# #     Should Be Equal As Strings    ${Role_Text}    Postdoc
#     Click Element    xpath=(//a[contains(., 'View Details')])[3]  #Click View details
# #     ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
# #     Should Be Equal As Strings  ${Detail_Role}  Postdoc Position  #Check if show the right one
#     Sleep    1s
#     [Teardown]    Close Browser

# # Edit Application
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

# Edit Application
#     Click Element    xpath=(//a[contains(., 'View Details')])[1]
#     Click Element    xpath=//a[@class='btn btn-warning mt-3 ct-btn me-2']
#     Input Date Type    ${FORM_RESEARCHASSISTANT_PATH}    app_deadline    2025-05-13
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Update Application
#     Sleep    1s
#     [Teardown]    Close Browser
 
# # Delete Application
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

# Delete Application
#     Click Element    xpath=(//a[contains(., 'View Details')])[2]
#     Click Button    xpath=//button[@class='btn btn-danger mt-3 ct-btn']
#     Handle Alert    accept
#     [Teardown]    Close Browser

