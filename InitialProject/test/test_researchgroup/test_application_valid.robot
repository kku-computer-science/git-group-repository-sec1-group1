***Settings***
Resource    resource.robot
Library    XML
Library    String

*** Variables ***
${FORM_RESEARCHASSISTANT_PATH}    (//h4[contains(text(),'Research Assistant Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PhD_PATH}    (//h4[contains(text(),'PhD Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PostdocPATH}    (//h4[contains(text(),'Postdoc Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])


***Test Cases***
Open Website
    Open Web

Go To ResearchGroup Page
    Go To Researcher Group

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

Create Project
    Click Element    css:button.create-project-btn
    Input Project    Project    Description    111-1111-111
    
Go To Project Detail
    Click Element    xpath=//h5[contains(text(),'Project')]/ancestor::a

# Create Application for ResearchAssistant
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Click Element    xpath=//label[@for='researchAssistant']
#     Sleep    1s
#     Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
#     #Scroll down to the lowest position
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Submit All Applications
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[1]
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[1]
#     Should Be Equal As Strings    ${Role_Text}    Research Assistant
#     Click Element    xpath=(//a[contains(., 'View Details')])[1]  #Click View details
#     ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
#     Should Be Equal As Strings  ${Detail_Role}  Research Assistant Position  #Check if show the right one
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Sleep    1s
#     Execute Javascript    window.scrollTo(0, 0);
#     Sleep    1s

# Back to Application Detail
#     Click Element    css:.btn.btn-secondary.mt-3.ct-btn

# Create Application for Ph.D
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Click Element    xpath=//label[@for='phd']
#     Sleep    1s
#     Input Application    ${FORM_PhD_PATH}    2025-02-28    3    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-04-20     2025-07-10    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Submit All Applications
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[2]
#     Should Be Equal As Strings    ${Role_Text}    PhD
#     Click Element    xpath=(//a[contains(., 'View Details')])[2]  #Click View details
#     ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
#     Should Be Equal As Strings  ${Detail_Role}  PhD Position  #Check if show the right one
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Sleep    1s
#     Execute Javascript    window.scrollTo(0, 0);
#     Sleep    1s

# Back to Application Detail
#     Click Element    css:.btn.btn-secondary.mt-3.ct-btn

# Create Application for Postdoc
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Click Element    xpath=//label[@for='postdoc']
#     Sleep    1s
#     Input Application    ${FORM_PostDoc_PATH}    2025-02-28    2    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    \n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-06-20     2025-12-14    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Submit All Applications
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[3]
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[3]
#     Should Be Equal As Strings    ${Role_Text}    Postdoc
#     Click Element    xpath=(//a[contains(., 'View Details')])[3]  #Click View details
#     ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
#     Should Be Equal As Strings  ${Detail_Role}  Postdoc Position  #Check if show the right one
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Sleep    1s
#     Execute Javascript    window.scrollTo(0, 0);
#     Sleep    1s

# Back to Application Detail
#     Click Element    css:.btn.btn-secondary.mt-3.ct-btn

# Delete Project
#     # Click the delete button
#     Click Button    xpath=//button[contains(@class, 'btn-danger')]
#     Handle Alert    action=ACCEPT

# Create Project
#     Click Element    css:button.create-project-btn
#     Input Project    Project    Description    111-1111-111

# Go To Project Detail
#     Click Element    xpath=//h5[contains(text(),'Project')]/ancestor::a

# Create Two Application
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Click Element    xpath=//label[@for='researchAssistant']
#     Click Element    xpath=//label[@for='postdoc']
#     Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.
#     Sleep    1s
#     Input Application    ${FORM_Postdoc_PATH}    2025-03-10    3    • CV/Resume\n• Cover Letter\n• Research Statement    85,000 - 100,000 per month    • Teaching experience\n• Strong publication record    • Research experience\n• Industry collaboration experience    Part-time    USA    2025-04-20    2025-07-10    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Submit All Applications
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Sleep    1s

# Delete Project
#     Execute JavaScript    window.scrollTo(0, 0)
#     # Click the delete button
#     Click Button    xpath=//button[contains(@class, 'btn-danger')]
#     Handle Alert    action=ACCEPT

# Create Project
#     Click Element    css:button.create-project-btn
#     Input Project    Project    Description    111-1111-111
    
# Go To Project Detail
#     Click Element    xpath=//h5[contains(text(),'Project')]/ancestor::a

Create Three Application
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Click Element    xpath=//label[@for='phd']
    Click Element    xpath=//label[@for='postdoc']
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-08-20    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.
    Sleep    1s
    Input Application    ${FORM_PhD_PATH}    2025-12-28    3    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Office    2025-05-02     2025-11-10    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    Sleep    1s
    Input Application    ${FORM_Postdoc_PATH}    2025-12-10    3    • CV/Resume\n• Cover Letter\n• Research Statement    85,000 - 100,000 per month    • Teaching experience\n• Strong publication record    • Research experience\n• Industry collaboration experience    Part-time    USA    2025-04-20    2025-07-10    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Sleep    1s

Check Application Detail In Group Page
    Switch Tab    0
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[8]
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[8]
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);

Check Application Detail
    Click Element    xpath=(//a[contains(text(),'รายละเอียด')])[1]
    Execute JavaScript    
    ...    let scrollInterval = setInterval(() => { window.scrollBy(0, 250); }, 500);
    Sleep    2.5s
    Go Back

Update ResearchAssistant Application
    Switch Tab    1
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[1]
    Sleep    1s
    Click Element    xpath=(//a[contains(., 'View Details')])[1]
    Click Element    css:.btn.btn-warning.mt-3.ct-btn.me-2
    #เปลี่ยน Deadline กับ จำนวน
    Edit Application    2025-10-10    2    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Save Changes
    Sleep   3s

Back to Application Detail
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn

Delete Ph.D Application
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
    Click Element    xpath=(//a[contains(., 'View Details')])[2]
    Click Button    xpath=//button[contains(@class, 'btn-danger')]
    Handle Alert    action=ACCEPT
    Sleep    1s

Postdoc Application Pass Deadline
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
    Click Element    xpath=(//a[contains(., 'View Details')])[2]
    Click Element    css:.btn.btn-warning.mt-3.ct-btn.me-2
    Input Date Type    ${EMPTY}    app_deadline    2025-01-10
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Save Changes
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn
    Sleep    1s

Project Closed
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[1]
    Click Element    xpath=(//a[contains(., 'View Details')])[1]
    Click Element    css:.btn.btn-warning.mt-3.ct-btn.me-2
    Input Date Type    ${EMPTY}    app_deadline    2025-02-10
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Save Changes
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn
    Sleep    2s

Go To Project Detail
    Click Element    xpath=//h5[contains(text(),'Project')]/ancestor::a

Update Project 
    #Click Edit Button
    Click Element    xpath=//button[@data-bs-target='#editProjectModal']
    Edit Project    EditedProject    EditedDescription    222-2222-222
    ${Name_Text}    Get Text    xpath=//h3[contains(@class, 'text-primary')]
    Should Be Equal As Strings    ${Name_Text}    EditedProject
    ${Detail_Text} =    Get Text    xpath=//p[@class='text-muted']
    Should Be Equal As Strings    ${Detail_Text}    EditedDescription
    ${Contact_Text} =    Get Text    xpath=//p[strong[text()='Contact:']]
    Should Be Equal As Strings    ${Contact_Text}    Contact: 222-2222-222
    Sleep    1s

Delete Project
    # Click the delete button
    Click Button    xpath=//button[contains(@class, 'btn-danger')]
    Handle Alert    action=ACCEPT
    Sleep    2s