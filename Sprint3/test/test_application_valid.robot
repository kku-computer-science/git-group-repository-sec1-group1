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
    ${Created_Time_Text} =    Get Text    xpath=(//i[contains(@class,'fa-calendar-plus')])[1]
    Should Be Equal As Strings    ${Role_Text}    Research Assistant
    Should Be Equal As Strings    ${Created_Time_Text}    Created: Mar 09, 2025
    Click Element    xpath=(//a[contains(., 'View Details')])[1]  #Click View details
    # ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
    # Should Be Equal As Strings  ${Detail_Role}  Research Assistant Position  #Check if show the right one
    Sleep    1s
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

